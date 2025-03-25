<?php

namespace App\Http\Controllers;

use App\Models\Order;
// use Carbon\Carbon;
use App\Models\Coupon;
use App\Models\Address;
use App\Models\Product;
use App\Models\OrderItem;
// use Surfsidemedia\Shoppingcart\Cart;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Surfsidemedia\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function index()
    {
        $items = Cart::instance('cart')->content();
        return view('app.customer.components.cart.cart', compact('items'));
    }

    public function add_to_cart(Request $request)
    {
        $cart = Cart::instance('cart')->add(
            $request->id,
            $request->name,
            $request->quantity,
            $request->price,
            ['image' => $request->image]
        )->associate('App\Models\Product');
        return redirect()->back()->with('success', 'cart added');
    }

    public function increase_cart_quantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId, $qty);
        return redirect()->back()->with('success', 'cart updated');
    }

    public function decrease_cart_quantity($rowId)
    {
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId, $qty);
        return redirect()->back()->with('success', 'cart updated');
    }

    public function remove_cart_item($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        return redirect()->back()->with('success', 'cart removed');
    }

    public function destroy_cart()
    {
        Cart::instance('cart')->destroy();
        return redirect()->back()->with('success', 'cart destroyed');
    }



    public function apply_coupon_code(Request $request)
    {
        $coupon_code = $request->coupon_code;

        if (empty($coupon_code)) {
            return redirect()->back()->with('error', 'Invalid coupon code');
        }

        $coupon = Coupon::where('code', $coupon_code)
            ->where('expiry_date', '>=', Carbon::today())
            ->where('status', 'active')
            ->where('cart_value', '<=', (float) Cart::instance('cart')->subtotal())
            ->first();

        if (!$coupon) {
            return redirect()->back()->with('error', 'Invalid or expired coupon code');
        }

        session()->put('coupon', [
            'code' => $coupon->code,
            'type' => $coupon->type,
            'value' => $coupon->value,
            'cart_value' => $coupon->cart_value,
        ]);
        $this->calculate_discount();
        return redirect()->back()->with('success', 'Coupon applied successfully');
    }



    public function calculate_discount()
    {
        $discount = 0;

        if (Session::has('coupon')) {
            $discount = Session::get('coupon')['value'];
        } else {
            $discount = (Cart::instance('cart')->subtotal() * Session::get('coupon')['value']) / 100;
        }

        $subtotalAfterDiscount = Cart::instance('cart')->subtotal() - $discount;
        $taxAfterDiscount = ($subtotalAfterDiscount * config('cart.tax')) / 100;
        $totalAfterDiscount = $subtotalAfterDiscount + $taxAfterDiscount;

        Session::put('discounts', [
            'discount' => number_format(floatval($discount), 2, '.', ''),
            'subtotal' => number_format(floatval($subtotalAfterDiscount), 2, '.', ''),
            'tax' => number_format(floatval($taxAfterDiscount), 2, '.', ''),
            'total' => number_format(floatval($totalAfterDiscount), 2, '.', ''),
        ]);
    }

    public function remove_coupon_code()
    {
        Session::forget('coupon');
        Session::forget('discounts');
        return redirect()->back()->with('success', 'Coupon removed successfully');
    }

    public function checkout()
    {
        if (!Auth::check()) {
           return redirect()->route('login');
        }
        $orderirem_seller = OrderItem::with('seller.sellerRequests') 
        ->first();
        // dd($orderirem_seller);
        $address = Address::where('user_id', Auth::user()->id)
            ->where('is_default', 1)->first();
         return view('app.customer.components.cart.checkout', compact('address','orderirem_seller'));
    }


    public function place_an_order(Request $request)
    {

        $user_id = Auth::user()->id;
        $address = Address::where('user_id', $user_id)
            ->where('is_default', true)->first();

        if (!$address) {
            $request->validate([
                'name' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'city' => 'required',

            ]);

            $address = new Address();
            $address->user_id = $user_id;
            $address->name = $request->name;
            $address->phone = $request->phone;
            $address->address = $request->address;
            $address->city = 'Dhaka';
            $address->state = 'Dhaka';
            $address->zip = '1209';
            $address->country = 'Bangladesh';
            $address->type = $request->type;
            $address->is_default = true;
            $address->save();
        }

        $this->setAmountForCheckout();
        // dd(Session::get('checkout'));
        $order = new Order();
        $order->user_id = $user_id;
        // $product_id = $request->product_id;
        // $product = Product::findOrFail($product_id);
        // $seller_id = $product->seller_id;

        // $order->seller_id = $seller_id;
        // $order->product_id = $product_id;

        // $order->subtotal = Session::get('checkout')['subtotal'];
        // $order->discount = Session::get('checkout')['discount'];
        // $order->tax = Session::get('checkout')['tax'];
        // $order->total = Session::get('checkout')['total'];

        $checkout = Session::get('checkout');
        if ($checkout && isset($checkout['subtotal'])) {
            $order->subtotal = str_replace(',', '', $checkout['subtotal']);
            $order->discount = str_replace(',', '', $checkout['discount']);
            $order->tax = str_replace(',', '', $checkout['tax']);
            $order->total = str_replace(',', '', $checkout['total']);
        } else {
            // Handle the case where the checkout session is not available
            // Maybe redirect the user or show an error message
            return redirect()->back()->with('error', 'Checkout session is missing.');
        }

        // $order->subtotal = str_replace(',', '', Session::get('checkout')['subtotal']);
        // $order->discount = str_replace(',', '', Session::get('checkout')['discount']);
        // $order->tax = str_replace(',', '', Session::get('checkout')['tax']);
        // $order->total = str_replace(',', '', Session::get('checkout')['total']);


        $order->name = $address->name;
        $order->phone = $address->phone;
        $order->address = $address->address;
        $order->city = $address->city;
        $order->state = $address->state;
        $order->country = $address->country;
        $order->zip = $address->zip;
        // $order->type = $address->type;
        // $order->status = $address->status;
        // $order->is_shipping_different = $address->is_shipping_different;
        // $order->delivery_date = $address->delivery_date;
        // $order->canceled_date = $address->canceled_date;
        $order->save();

        foreach (Cart::instance('cart')->content() as $item) {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id = $order->id;
            $orderItem->price = $item->price;
            $orderItem->quantity = $item->qty;
            $orderItem->save();
        }

        $product = Product::find($item->id);
        if ($product) {
            $orderItem->seller_id = $product->seller_id;
            $orderItem->save();
        }


        if ($request->mode == 'cod') {
            $transaction = new Transaction();
            $transaction->user_id = $user_id;
            $transaction->order_id = $order->id;
            $transaction->mode = $request->mode;

            $transaction->payment_trxid = $request->payment_trxid;
            $transaction->payment_number = $request->payment_number;

            if ($request->hasFile('payment_screenshot')) {
                $file = $request->file('payment_screenshot');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move('uploads/payment_screenshot', $fileName);
                $transaction->payment_screenshot = $fileName;
            }
            $transaction->status = "pending";
            $transaction->save();
        }
        Cart::instance('cart')->destroy();
        Session::forget('checkout');
        Session::forget('coupon');
        Session::forget('discounts');
        Session::put('order_id', $order->id);
        return redirect('/order/success')->with('success', 'Order placed successfully');
    }

    public function setAmountForCheckout()
    {
        if (!Cart::instance('cart')->content()->count() > 0) {
            Session::forget('checkout');
            return;
        }

        if (Session::has('coupon')) {
            Session::put('checkout', [
                'discount' => Session::get('discounts')['discount'],
                'subtotal' => Session::get('discounts')['subtotal'],
                'tax' => Session::get('discounts')['tax'],
                'total' => Session::get('discounts')['total'],
            ]);
        } else {
            Session::put('checkout', [
                'discount' => 0,
                'subtotal' => Cart::instance('cart')->subtotal(),
                'tax' => Cart::instance('cart')->tax(),
                'total' => Cart::instance('cart')->total(),
            ]);
        }
    }



    public function order_confirmation(){
        if(Session::has('order_id')){
            $order = Order::find(Session::get('order_id'));
            return view('app.customer.components.cart.order_confirmation', compact('order'));
        }
        return redirect()->route('index');
    }

}
