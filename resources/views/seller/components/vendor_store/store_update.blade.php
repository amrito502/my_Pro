@extends('seller.master')
@section('seller')
  <div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-md-12">
            <h2>Update Vendor Store</h2>
            @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            <div class="card p-4 mt-2">
                <form action="{{ route('seller.updateRequest') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH') <!-- Use PATCH method to indicate an update -->
                    
                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="name">Seller Name</label>
                                <input type="text" id="name" name="name" class="form-control mt-2"
                                    value="{{ old('name', $sellerRequest->name) }}" placeholder="Enter your full name" required>
                            </div>
                        </div>

                        <!-- Store Name -->
                        <div class="col-md-6">
                            <div class="form-group mb-2">
                                <label for="store_name">Store Name</label>
                                <input type="text" id="store_name" name="store_name" class="form-control mt-2"
                                    value="{{ old('store_name', $sellerRequest->store_name) }}" placeholder="Enter your store's name" required>
                            </div>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="form-group mb-2">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control mt-2"
                            value="{{ old('email', $sellerRequest->email) }}" placeholder="Enter your email address" required>
                    </div>

                    <!-- Phone -->
                    <div class="form-group mb-2">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control mt-2"
                            value="{{ old('phone', $sellerRequest->phone) }}" placeholder="Enter your phone number" required>
                    </div>

                    <!-- Address -->
                    <div class="form-group mb-2">
                        <label for="address">Address</label>
                        <textarea id="address" name="address" class="form-control mt-2" rows="3" placeholder="Enter your full address"
                            required>{{ old('address', $sellerRequest->address) }}</textarea>
                    </div>

                    <!-- City -->
                    <div class="form-group mb-2">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" class="form-control mt-2"
                            value="{{ old('city', $sellerRequest->city) }}" placeholder="Enter your city" required>
                    </div>

                    <!-- District -->
                    <div class="form-group mb-2">
                        <label for="district">District</label>
                        <input type="text" id="district" name="district" class="form-control mt-2"
                            value="{{ old('district', $sellerRequest->district) }}" placeholder="Enter your district" required>
                    </div>

                    <!-- Sub-District -->
                    <div class="form-group mb-2">
                        <label for="sub_district">Sub-District</label>
                        <input type="text" id="sub_district" name="sub_district" class="form-control mt-2"
                            value="{{ old('sub_district', $sellerRequest->sub_district) }}" placeholder="Enter your sub-district" required>
                    </div>

                    <!-- Country -->
                    <div class="form-group mb-2">
                        <label for="country">Country</label>
                        <input type="text" id="country" name="country" class="form-control mt-2"
                            value="{{ old('country', $sellerRequest->country) }}" placeholder="Enter your country" required>
                    </div>

                    <!-- Postal Code -->
                    <div class="form-group mb-2">
                        <label for="postal_code">Postal Code</label>
                        <input type="text" id="postal_code" name="postal_code" class="form-control mt-2"
                            value="{{ old('postal_code', $sellerRequest->postal_code) }}" placeholder="Enter your postal code" required>
                    </div>

                    <!-- NID -->
                    <div class="form-group mb-2">
                        <label for="nid">NID</label>
                        <input type="text" id="nid" name="nid" class="form-control mt-2"
                            value="{{ old('nid', $sellerRequest->nid) }}" placeholder="Enter your National ID number" required>
                    </div>

                    <!-- Store Description -->
                    <div class="form-group mb-2">
                        <label for="store_description">Store Description</label>
                        <textarea id="store_description" name="store_description" class="form-control mt-2" rows="3"
                            placeholder="Describe your store" required>{{ old('store_description', $sellerRequest->store_description) }}</textarea>
                    </div>

                    <!-- Message -->
                    <div class="form-group mb-2">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" class="form-control mt-2" rows="3"
                            placeholder="Enter a message to us" required>{{ old('message', $sellerRequest->message) }}</textarea>
                    </div>

                    <!-- Store Image -->
                    <div class="form-group mb-3">
                        <label for="store_image">Store Image</label>
                        <input type="file" id="store_image" name="store_image" class="form-control mt-2">
                        @if($sellerRequest->store_image)
                            <img src="{{ asset('uploads/store_image/' . $sellerRequest->store_image) }}" alt="Store Image" class="mt-2" width="100">
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Update Store</button>
                </form>
            </div>
        </div>
    </div>
  </div>
@endsection
