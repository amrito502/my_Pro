@extends('admin.master')

@section('admin')

<div class="containe pb-6">
    <div class="py-5">
        <div class="row g-4 align-items-center">
            {{-- <div class="col"><h1 class="h3 m-0">Dashboard</h1></div>
            <div class="col-auto d-flex">
                <select class="form-select me-3">
                    <option selected="">7 October, 2021</option>
                </select>
                <a href="#" class="btn btn-primary">Export</a>
            </div> --}}
        </div>
    </div>
    <div class="row g-4 g-xl-5">
        <div class="col-12 col-md-3 d-flex">
            <div class="card saw-indicator flex-grow-1" data-sa-container-query='{"340":"saw-indicator--size--lg"}' style="background: #082f56;display: flex;justify-content: center;align-items: center;height: 198px;">
                <div class="sa-widget-header saw-indicator__header" style="display: flex;justify-content: center;flex-direction: column;padding: 21px;">
                    <span style="font-size: 40px; color: #ffffff;"><i class="fa-solid fa-users"></i></span>
                    <h3 style="font-size: 26px;font-weight: 800;color: #ffffff !important;margin-top: 9px;letter-spacing: .5px;margin-bottom: 12px;"
                    class="text-muted">Total Earning</h3>
                    <h4 style="font-size: 23px;color: #ffffff !important;font-weight: 500;" class="mt-1 mb-3"><i class="fa-solid fa-bangladeshi-taka-sign"></i> {{ $total_earnings }}</h4>
                </div>

            </div>
        </div>

        <div class="col-12 col-md-3 d-flex">
            <div class="card saw-indicator flex-grow-1" data-sa-container-query='{"340":"saw-indicator--size--lg"}' style="background: #620345;display: flex;justify-content: center;align-items: center;height: 198px;">
                <div class="sa-widget-header saw-indicator__header" style="display: flex;justify-content: center;flex-direction: column;padding: 21px;">
                    <span style="font-size: 40px; color: #ffffff;"><i class="fa-solid fa-users"></i></span>
                    <h3 style="font-size: 26px;font-weight: 800;color: #ffffff !important;margin-top: 9px;letter-spacing: .5px;margin-bottom: 12px;"
                    class="text-muted">Total Orders</h3>
                    <h4 style="font-size: 23px;color: #ffffff !important;font-weight: 500;" class="mt-1 mb-3">{{ $totalorders }}</h4>
                </div>

            </div>
        </div>

        <div class="col-12 col-md-3 d-flex">
            <div class="card saw-indicator flex-grow-1" data-sa-container-query='{"340":"saw-indicator--size--lg"}' style="background: #08563d;display: flex;justify-content: center;align-items: center;height: 198px;">
                <div class="sa-widget-header saw-indicator__header" style="display: flex;justify-content: center;flex-direction: column;padding: 21px;">
                    <span style="font-size: 40px; color: #ffffff;"><i class="fa-solid fa-users"></i></span>
                    <h3 style="font-size: 26px;font-weight: 800;color: #ffffff !important;margin-top: 9px;letter-spacing: .5px;margin-bottom: 12px;"
                    class="text-muted">Total Delivered Orders</h3>
                    <h4 style="font-size: 23px;color: #ffffff !important;font-weight: 500;" class="mt-1 mb-3">{{ $totalordersdelivered }}</h4>
                </div>

            </div>
        </div>

        <div class="col-12 col-md-3 d-flex">
            <div class="card saw-indicator flex-grow-1" data-sa-container-query='{"340":"saw-indicator--size--lg"}' style="background: #960505;display: flex;justify-content: center;align-items: center;height: 198px;">
                <div class="sa-widget-header saw-indicator__header" style="display: flex;justify-content: center;flex-direction: column;padding: 21px;">
                    <span style="font-size: 40px; color: #ffffff;"><i class="fa-solid fa-users"></i></span>
                    <h3 style="font-size: 26px;font-weight: 800;color: #ffffff !important;margin-top: 9px;letter-spacing: .5px;margin-bottom: 12px;"
                    class="text-muted">Total Canceled Orders</h3>
                    <h4 style="font-size: 23px;color: #ffffff !important;font-weight: 500;" class="mt-1 mb-3">{{ $totalorderscanceled }}</h4>
                </div>

            </div>
        </div>

        <div class="col-12 col-md-3 d-flex">
            <div class="card saw-indicator flex-grow-1" data-sa-container-query='{"340":"saw-indicator--size--lg"}' style="background: #028b37;display: flex;justify-content: center;align-items: center;height: 198px;">
                <div class="sa-widget-header saw-indicator__header" style="display: flex;justify-content: center;flex-direction: column;padding: 21px;">
                    <span style="font-size: 40px; color: #ffffff;"><i class="fa-solid fa-users"></i></span>
                    <h3 style="font-size: 26px;font-weight: 800;color: #ffffff !important;margin-top: 9px;letter-spacing: .5px;margin-bottom: 12px;"
                    class="text-muted">Total Seller</h3>
                    <h4 style="font-size: 23px;color: #ffffff !important;font-weight: 500;" class="mt-1 mb-3">{{ $totalseller }}</h4>
                </div>

            </div>
        </div>


        <div class="col-12 col-md-3 d-flex">
            <div class="card saw-indicator flex-grow-1" data-sa-container-query='{"340":"saw-indicator--size--lg"}' style="background: #420394;display: flex;justify-content: center;align-items: center;height: 198px;">
                <div class="sa-widget-header saw-indicator__header" style="display: flex;justify-content: center;flex-direction: column;padding: 21px;">
                    <span style="font-size: 40px; color: #ffffff;"><i class="fa-solid fa-users"></i></span>
                    <h3 style="font-size: 26px;font-weight: 800;color: #ffffff !important;margin-top: 9px;letter-spacing: .5px;margin-bottom: 12px;"
                    class="text-muted">Total Customer</h3>
                    <h4 style="font-size: 23px;color: #ffffff !important;font-weight: 500;" class="mt-1 mb-3">{{ $totalcustomer }}</h4>
                </div>

            </div>
        </div>


        <div class="col-12 col-md-3 d-flex">
            <div class="card saw-indicator flex-grow-1" data-sa-container-query='{"340":"saw-indicator--size--lg"}' style="background: #960555;display: flex;justify-content: center;align-items: center;height: 198px;">
                <div class="sa-widget-header saw-indicator__header" style="display: flex;justify-content: center;flex-direction: column;padding: 21px;">
                    <span style="font-size: 40px; color: #ffffff;"><i class="fa-solid fa-users"></i></span>
                    <h3 style="font-size: 26px;font-weight: 800;color: #ffffff !important;margin-top: 9px;letter-spacing: .5px;margin-bottom: 12px;"
                    class="text-muted">Total Products</h3>
                    <h4 style="font-size: 23px;color: #ffffff !important;font-weight: 500;" class="mt-1 mb-3">{{ $totalproduct }}</h4>
                </div>

            </div>
        </div>


        <div class="col-12 col-md-3 d-flex">
            <div class="card saw-indicator flex-grow-1" data-sa-container-query='{"340":"saw-indicator--size--lg"}' style="background: #1b0596;display: flex;justify-content: center;align-items: center;height: 198px;">
                <div class="sa-widget-header saw-indicator__header" style="display: flex;justify-content: center;flex-direction: column;padding: 21px;">
                    <span style="font-size: 40px; color: #ffffff;"><i class="fa-solid fa-users"></i></span>
                    <h3 style="font-size: 26px;font-weight: 800;color: #ffffff !important;margin-top: 9px;letter-spacing: .5px;margin-bottom: 12px;"
                    class="text-muted">Total Blog Posts</h3>
                    <h4 style="font-size: 23px;color: #ffffff !important;font-weight: 500;" class="mt-1 mb-3">{{ $totalblogpost }}</h4>
                </div>

            </div>
        </div>

        



      
        <div class="col-12 col-xxl-12 d-flex">
            <div class="card flex-grow-1 saw-table">
                <div class="sa-widget-header saw-table__header">
                    <h2 class="sa-widget-header__title">Recent orders</h2>
                  
                </div>
                <div class="saw-table__body sa-widget-table text-nowrap">
                    <table class=" table table-bordered p-4" data-sa-search-input="#table-search">
                        <thead>
                            <tr>
                                <th>SL.</th>
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
                                    <td><a href="" class="text-reset">{{ $order->order->user->name }}</a></td>
                                    <td><a href="" class="text-reset">{{ $order->product->name }}</a></td>
                                    <td><a href="" class="text-reset">{{ $order->price }}</a></td>
                                    <td><a href="" class="text-reset">{{ $order->quantity }}</a></td>
                                    <td><a href="" class="text-reset">{{ $order->order->subtotal }}</a></td>
                                    <td><a href="" class="text-reset">{{ $order->order->discount }}</a></td>
                                    <td><a href="" class="text-reset">{{ $order->order->tax }}</a></td>
                                    <td><a href="" class="text-reset">{{ $order->order->total }}</a></td>
                                    <td>
                                        {{ $order->order->transaction->status ?? 'N/A' }}
                                    </td>
                                    <td>
                                        {{ $order->order->status }}
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


    </div>
</div>
@endsection
