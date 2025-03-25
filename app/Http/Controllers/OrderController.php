<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // public function admin_order_reports(){
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
    //     $total_sales = $orders->sum(function ($orderItem) {
    //     return $orderItem->order ? $orderItem->order->total : 0;
    // });
    //     return view('admin.components.reports.order',compact('orders','total_sales'));
    // }


    public function admin_order_reports() {
        // // Fetching all orders where the order status is 'delivered' and the transaction status is 'approved'
        // $orders = OrderItem::whereHas('order', function ($query) {
        //     $query->where('status', 'delivered') // Filter by delivered status
        //         ->whereHas('transaction', function ($query) {
        //             $query->where('status', 'approved'); // Filter by approved transaction status
        //         });
        // })
        // ->with('order.transaction') // Eager load the related order and transaction
        // ->get();
    
        // // Calculate the total earnings (or sales) from the orders
        // $total_sales = $orders->sum(function ($orderItem) {
        //     return $orderItem->order ? $orderItem->order->total : 0;
        // });


        $orders = OrderItem::latest()
        ->with('order') // Eager load the related 'order' model
        ->get();

        $total_sales = $orders->sum(function ($orderItem) {
            return $orderItem->order ? $orderItem->order->total : 0;
        });
    
        // Return the view with all orders and total sales
        return view('admin.components.reports.order', compact('orders', 'total_sales'));
    }
}
