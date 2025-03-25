@extends('admin.master')

@section('admin')
    <div class="container">

        <div class="py-5">
            <div class="row g-4 align-items-center">
                <div class="col">
                    <nav class="mb-2" aria-label="breadcrumb">
                        <h1 class="h3 m-0">Create Coupon</h1>
                </div>
            </div>
        </div>



        <div class="row g-4 align-items-center">
           <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('coupons.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label>Code</label>
                            <input type="text" name="code" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Type</label>
                            <select name="type" class="form-control">
                                <option value="fixed">Fixed</option>
                                <option value="percent">Percent</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Value</label>
                            <input type="number" name="value" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Cart Value</label>
                            <input type="number" name="cart_value" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Expiry Date</label>
                            <input type="date" name="expiry_date" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
           </div>
        </div>
    </div>
@endsection
