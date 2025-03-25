@extends('admin.master')

@section('admin')
    <div class="container">

        <h2>Edit Coupon</h2>
    <div class="row">
        <div class="col-xl-12">
            <div class="card p-4">
                <form action="{{ route('coupons.update', $coupon->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label>Code</label>
                        <input type="text" name="code" class="form-control" value="{{ old('code', $coupon->code) }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Type</label>
                        <select name="type" class="form-control">
                            <option value="fixed" {{ $coupon->type == 'fixed' ? 'selected' : '' }}>Fixed</option>
                            <option value="percent" {{ $coupon->type == 'percent' ? 'selected' : '' }}>Percent</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Value</label>
                        <input type="number" name="value" class="form-control" value="{{ old('value', $coupon->value) }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Cart Value</label>
                        <input type="number" name="cart_value" class="form-control" value="{{ old('cart_value', $coupon->cart_value) }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Expiry Date</label>
                        <input type="date" name="expiry_date" class="form-control" value="{{ old('expiry_date', $coupon->expiry_date) }}" required>
                    </div>

                    <div class="mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="active" {{ $coupon->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ $coupon->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
