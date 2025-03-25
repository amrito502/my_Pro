<?php

namespace App\Http\Controllers\Seller;

use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Models\SellerRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class SellerController extends Controller
{

    public function vendor_list()
    {
        return view('app.seller.vendor_list');
      
    }

    public function vendor_store($id)
    {

        $vendor_store = User::where('role', 'seller')
            ->with('sellerRequest')
            ->find($id);

        return view('app.seller.vendor_store', compact('vendor_store'));
    }



    // public function sellerDashboard()
    // {
    //     $orders = OrderItem::where('seller_id', auth()->id())
    //         ->whereHas('order', function ($query) {
    //             $query->where('status', 'delivered')
    //                 ->whereHas('transaction', function ($query) {
    //                     $query->where('status', 'approved');
    //                 });
    //         })
    //         ->with('order.transaction')
    //         ->get();

    //     $total_earnings = $orders->sum(function ($orderItem) {
    //         return $orderItem->order ? $orderItem->order->total : 0;
    //     });


    //     $total_order_delivered = OrderItem::where('seller_id', auth()->id())
    //         ->join('orders', 'orders.id', '=', 'order_items.order_id')
    //         ->where('orders.status', 'delivered')
    //         ->count();

    //     $total_order_ordered = Order::where('status', 'ordered')->count();
    //     $total_order_delivered = Order::where('status', 'delivered')->count();
    //     $total_order_canceled = Order::where('status', 'canceled')->count();
    //     $orders = OrderItem::where('seller_id', auth()->id())->get();
    //     return view('seller.dashboard', compact('orders', 'total_earnings', 'total_order', 'total_order_delivered'));
    // }


    public function sellerDashboard()
    {

        $orders_earn = OrderItem::where('seller_id', auth()->id())
            ->whereHas('order', function ($query) {
                $query->where('status', 'delivered')
                    ->whereHas('transaction', function ($query) {
                        $query->where('status', 'approved');
                    });
            })
            ->with('order.transaction')
            ->get();

        $total_earnings = $orders_earn->sum(function ($orderItem) {
            return $orderItem->order ? $orderItem->order->total : 0;
        });

        $total_order = OrderItem::where('seller_id', auth()->id())
            ->join('orders', 'orders.id', '=', 'order_items.order_id')
            ->count();
        $orders = OrderItem::where('seller_id', auth()->id())
            ->join('orders', 'orders.id', '=', 'order_items.order_id')
            ->get();

        $total_delivered_order = OrderItem::where('seller_id', auth()->id())
            ->join('orders', 'orders.id', '=', 'order_items.order_id')
            ->where('orders.status', 'delivered')
            ->count();
        $total_canceled_order = OrderItem::where('seller_id', auth()->id())
            ->join('orders', 'orders.id', '=', 'order_items.order_id')
            ->where('orders.status', 'canceled')
            ->count();

        return view('seller.dashboard', compact('orders', 'total_earnings', 'total_order','total_delivered_order','total_canceled_order'));
    }


    


    public function sellerupdateRequest_page()
    {
        $sellerRequest = SellerRequest::where('user_id', auth()->id())->first();
        if (!$sellerRequest) {
            return redirect()->route('sellerupdateRequest_page')->with('error', 'Seller request not found!');
        }
        return view('seller.components.vendor_store.store_update', compact('sellerRequest'));
    }




    public function updateSellerRequest(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'store_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string',
            'address' => 'required|string|max:500'
        ]);

        $sellerRequest = SellerRequest::where('user_id', auth()->id())->first();

        if (!$sellerRequest) {
            return redirect()->route('sellerupdateRequest_page')->with('error', 'Seller request not found!');
        }

        if ($request->hasFile('store_image')) {
            $destination = 'uploads/store_image/' . $sellerRequest->store_image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('store_image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/store_image', $fileName);
            $sellerRequest->store_image = $fileName;
        }

        $sellerRequest->update([
            'name' => $request->name,
            'store_name' => $request->store_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'district' => $request->district,
            'sub_district' => $request->sub_district,
            'country' => $request->country,
            'postal_code' => $request->postal_code,
            'nid' => $request->nid,
            'store_description' => $request->store_description,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Store details updated successfully!');
    }


    public function store_details()
    {
        $sellerRequest = Auth::user()->sellerRequest;
        return view('seller.components.vendor_store.store_details', compact('sellerRequest'));
    }


    public function seller_update_profile_page()
    {
        $user = User::with(['district', 'subDistrict'])->where('id', '=', auth()->user()->id)->first();
        return view('seller.components.vendor_profile.profile', compact('user'));
    }

    public function seller_update_profile(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->city = $request->city;
        $user->address = $request->address;
        $user->password = $request->password;

        if ($request->hasFile('image')) {
            $destination = 'uploads/profile/' . $user->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/profile', $fileName);
            $user->image = $fileName;
        }
        $user->save();
        return redirect()->back()->with('success', 'Seller Profile Updated Successfully!');
    }
}
