@extends('seller.master')

@section('seller')

<div class="row">
    <div class="col-md-12">
        <div class="card p-4 mt-4">
            <h3 class="my-3">Order Information</h3>
            <table class="table table-bordered table-responsive">
                <tr>
                    <th>OrderID</th>
                    <th>Customer</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Discount</th>
                    <th>Tax</th>
                    <th>Total</th>
                    <th>Order status</th>
                </tr>
                <tr>
                    <td><a href="" class="text-reset">{{ $order->order->id }}</a></td>
                    <td><a href="" class="text-reset">{{ $order->order->user->name }}</a></td>
                    <td><a href="" class="text-reset">{{ $order->product->name }}</a></td>
                    <td><a href="" class="text-reset">{{ $order->price }}</a></td>
                    <td><a href="" class="text-reset">{{ $order->quantity }}</a></td>
                    <td><a href="" class="text-reset">{{ $order->order->subtotal }}</a></td>
                    <td><a href="" class="text-reset">{{ $order->order->discount }}</a></td>
                    <td><a href="" class="text-reset">{{ $order->order->tax }}</a></td>
                    <td><a href="" class="text-reset">{{ $order->order->total }}</a></td>
                    <td>
                        @if ($order->order->status === 'ordered')
                            <div class="badge badge-sa-success">{{ $order->order->status }}</div>
                        @elseif ($order->order->status === 'delivered')
                            <div class="badge badge-sa-warning">{{ $order->order->status }}</div>
                        @else
                            <div class="badge badge-sa-danger">{{ $order->order->status }}</div>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card p-4 mt-4">
            <h3 class="my-3">Shipping Information</h3>
            <table class="table table-bordered table-responsive">
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Type</th>
                    <th>Order status</th>
                </tr>
                <tr>
                    <td><a href="" class="text-reset">{{ $order->order->name }}</a></td>
                    <td><a href="" class="text-reset">{{ $order->order->phone }}</a></td>
                    <td><a href="" class="text-reset">{{ $order->order->address ?? 'N/A' }}</a></td>
                    <td><a href="" class="text-reset">{{ $order->order->city ?? 'N/A' }}</a></td>
                    <td><a href="" class="text-reset">{{ $order->order->state ?? 'N/A' }}</a></td>
                    <td><a href="" class="text-reset">{{ $order->order->country ?? 'N/A' }}</a></td>
                    <td><a href="" class="text-reset">{{ $order->order->type ?? 'N/A' }}</a></td>
                    <td>
                        @if ($order->order->status === 'ordered')
                            <div class="badge badge-sa-success">{{ $order->order->status }}</div>
                        @elseif ($order->order->status === 'delivered')
                            <div class="badge badge-sa-warning">{{ $order->order->status }}</div>
                        @else
                            <div class="badge badge-sa-danger">{{ $order->order->status }}</div>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card p-4 mt-4">
            <h3 class="my-3">Payment Information</h3>
            <table class="table table-bordered table-responsive">
                <tr>
                    <th>OrderID</th>
                    <th>Payment TrxID</th>
                    <th>Payment Number</th>
                    
                    <th>Payment status</th>
                </tr>
                <tr>
                    <td><a href="" class="text-reset">{{ $order->order->id }}</a></td>
                    
                    <td><a href="" class="text-reset">{{ $order->order->transaction->payment_trxid }}</a></td>
                    <td><a href="" class="text-reset">{{ $order->order->transaction->payment_number }}</a></td>
                    <td>
                        @if ($order->order->transaction->status === 'approved')
                            <div class="badge badge-sa-success">{{ $order->order->transaction->status }}</div>
                        @elseif ($order->order->transaction->status === 'refunded')
                            <div class="badge badge-sa-warning">{{ $order->order->transaction->status }}</div>
                        @elseif ($order->order->transaction->status === 'declined')
                            <div class="badge badge-sa-danger">{{ $order->order->transaction->status }}</div>
                        @else
                            <div class="badge badge-sa-danger">{{ $order->order->transaction->status }}</div>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

@endsection