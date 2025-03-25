@extends('seller.master')

@section('seller')
    <h1 class="mb-4">Order List</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="p-4">
                    <input type="text" placeholder="Start typing to search for categories"
                        class="form-control form-control--search mx-auto" id="table-search" />
                </div>
                <div class="sa-divider"></div>
            
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <table class="sa-datatables-init table table-bordered p-4" data-order='[[ 1, "asc" ]]' data-sa-search-input="#table-search">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Order Date</th>
                            <th>Order ID</th>
                            <th>Customer Name</th>
                            <th>Product Title</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                            <th>Discount</th>
                            <th>Tax</th>
                            <th>Total</th>
                            <th>Payment Status</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $key => $order)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td><a href="" class="text-reset">{{ $order->id }}</a></td>
                                <td><a href="" class="text-reset">{{ $order->created_at }}</a></td>
                                <td><a href="" class="text-reset">{{ $order->order->user->name }}</a></td>
                                <td><a href="" class="text-reset">{{ $order->product->name }}</a></td>
                                <td><a href="" class="text-reset">{{ $order->price }}</a></td>
                                <td><a href="" class="text-reset">{{ $order->quantity }}</a></td>
                                <td><a href="" class="text-reset">{{ $order->order->subtotal }}</a></td>
                                <td><a href="" class="text-reset">{{ $order->order->discount }}</a></td>
                                <td><a href="" class="text-reset">{{ $order->order->tax }}</a></td>
                                <td><a href="" class="text-reset">{{ $order->order->total }}</a></td>
                                <td>
                                    <form action="{{ route('seller.updatePaymentStatus', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" class="form-control">
                                            <option value="pending" @if($order->order->transaction->status === 'pending') selected @endif>Pending</option>
                                            <option value="approved" @if($order->order->transaction->status === 'approved') selected @endif>Approved</option>
                                            <option value="declined" @if($order->order->transaction->status === 'declined') selected @endif>Declined</option>
                                            <option value="refunded" @if($order->order->transaction->status === 'refunded') selected @endif>Refunded</option>
                                        </select>
                                        <button type="submit" class="btn btn-sm btn-primary mt-2">Update Payment Status</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('seller.updateOrderStatus', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <select name="order_status" class="form-control">
                                            <option value="ordered" @if($order->order->status === 'ordered') selected @endif>Ordered</option>
                                            <option value="delivered" @if($order->order->status === 'delivered') selected @endif>Delivered</option>
                                            <option value="canceled" @if($order->order->status === 'canceled') selected @endif>Cancelled</option>
                                        </select>
                                        <button type="submit" class="btn btn-sm btn-primary mt-2">Update Status</button>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('seller_order_details', $order->id) }}" class="btn btn-sm btn-info">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
