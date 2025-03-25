@extends('admin.master')

@section('admin')
    <div class="container">
        <div class="py-5">
            <div class="row g-4 align-items-center">
                <div class="col">
                    <h1 class="h3 m-0">Coupons</h1>
                </div>
                <div class="col-auto d-flex"><a href="{{ route('coupons.create') }}" class="btn btn-primary">New
                    Coupon</a></div>
            </div>
        </div>
       
        <div class="card">
            <div class="p-4">
                <input type="text" placeholder="Start typing to search for categories"
                    class="form-control form-control--search mx-auto" id="table-search" />
            </div>
            <div class="sa-divider"></div>
            <table style="margin-bottom: 100px!important;" class="sa-datatables-init p-4 table-bordered" data-order='[[ 1, "asc" ]]' data-sa-search-input="#table-search">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Code</th>
                        <th>Type</th>
                        <th>Value</th>
                        <th>Cart Value</th>
                        <th>Expiry Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                        <th style="display: none" class="w-min" data-orderable="false"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($coupons as $coupon)
                        <tr>
                            <td class=""><input type="checkbox" class="form-check-input m-0 fs-exact-16 d-block" aria-label="..." />
                            </td>
                            <td>{{ $coupon->id }}</td>
                            <td>{{ $coupon->code }}</td>
                            <td>{{ ucfirst($coupon->type) }}</td>
                            <td>{{ $coupon->value }}</td>
                            <td>{{ $coupon->cart_value }}</td>
                            <td>{{ $coupon->expiry_date }}</td>
                            <td>{{ ucfirst($coupon->status) }}</td>
                            <td style="display: flex">
                                <a href="{{ route('coupons.edit', $coupon->id) }}" class="btn btn-warning btn-sm mx-3">Edit</a>
                                <form action="{{ route('coupons.destroy', $coupon->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
