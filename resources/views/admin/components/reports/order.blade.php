@extends('admin.master')

@section('admin')
<div class="row">
    <h2 class="mb-4 mt-4">Order Reports</h2>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center" style="font-size: 23px;background: #f1efef;padding: 20px;color: #ff7600;font-weight: 800;">Total orders : <i class="fa-solid fa-bangladeshi-taka-sign"></i>  {{ $total_sales }}</h3>
            </div>
            <div class="p-4">
                <input type="text" placeholder="Start typing to search for categories"
                    class="form-control form-control--search mx-auto" id="table-search" />
            </div>
            <div class="sa-divider"></div>
            <table class="sa-datatables-init table table-bordered p-4" data-order='[[ 1, "asc" ]]' data-sa-search-input="#table-search">
                <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Order ID</th>
                        <th>Order Date</th>
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $key=>$order)
                        <tr>
                            <td>
                                {{ $key+1 }}
                            </td>
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
                            <td><a href="" class="text-reset badge badge-sa-success">{{ $order->order->transaction->status ?? 'N/A' }}</a></td>
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
                    @endforeach
                 

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
