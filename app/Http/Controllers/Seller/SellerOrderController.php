<?php

namespace App\Http\Controllers\Seller;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SellerOrderController extends Controller
{
    public function seller_order()
    {
        $orders = OrderItem::where('seller_id', auth()->id())->get();
        return view('seller.components.order.order', compact('orders'));
    }


    public function updateOrderStatus(Request $request, $orderId)
    {
        $request->validate([
            'order_status' => 'required|in:ordered,delivered,canceled',
        ]);

        $orderItem = OrderItem::where('id', $orderId)->where('seller_id', auth()->id())->first();

        if (!$orderItem) {
            return back()->with('error', 'Order not found or you do not have permission to update this order.');
        }
        $orderItem->order->status = $request->input('order_status');

        $orderItem->order->save();
        return back()->with('success', 'Order status updated successfully!');
    }



    public function updatePaymentStatus(Request $request, $orderId)
    {
        $validated = $request->validate([
           'status' => 'required|in:pending,approved,declined,refunded',
        ]);

        $orderItem = OrderItem::where('id', $orderId)
            ->where('seller_id', auth()->id())
            ->firstOrFail();

        $transaction = $orderItem->order->transaction;
        $transaction->status = $validated['status'];
        $transaction->save();
        return redirect()->route('seller.order')->with('success', 'Payment status updated successfully');
    }

    public function seller_order_details($id)
    {
        $order = OrderItem::find($id);
        return view('seller.components.order.order_details', compact('order'));
    }


    // public function seller_sales_report()
    // {
    //     $orders = OrderItem::where('seller_id', auth()->id())
    //         ->with('order')
    //         ->get();
    //     $total_earnings = $orders->sum(function ($orderItem) {
    //         return $orderItem->order ? $orderItem->order->total : 0;
    //     });

    //     return view('seller.components.sales_report.report', compact('orders', 'total_earnings'));
    // }


    // public function seller_sales_report()
    // {
    //     $orders = OrderItem::where('seller_id', auth()->id())
    //         ->whereHas('order', function ($query) {
    //             $query->where('status', 'delivered');
    //         })
    //         ->with('order')
    //         ->get();
    //     $total_earnings = $orders->sum(function ($orderItem) {
    //         return $orderItem->order ? $orderItem->order->total : 0;
    //     });
    //     return view('seller.components.sales_report.report', compact('orders', 'total_earnings'));
    // }



    public function seller_sales_report()
    {
        $orders = OrderItem::where('seller_id', auth()->id())
            ->whereHas('order', function ($query) {
                $query->where('status', 'delivered') 
                    ->whereHas('transaction', function ($query) {
                        $query->where('status', 'approved');
                    });
            })
            ->with('order.transaction')
            ->get();
        $total_earnings = $orders->sum(function ($orderItem) {
            return $orderItem->order ? $orderItem->order->total : 0;
        });
        return view('seller.components.sales_report.report', compact('orders', 'total_earnings'));
    }
}


