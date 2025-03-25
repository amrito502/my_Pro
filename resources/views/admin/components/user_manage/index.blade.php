@extends('admin.master')
@section('admin')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card p-4 my-5">
                    <h3>Admin Profile Update</h3>
                    <form action="{{ route('seller_update_profile', ['id' => auth()->user()->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">

                                <div class="form-group mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" value="{{ $user->name }}"
                                        class="form-control mt-2">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" value="{{ $user->email }}"
                                        class="form-control mt-2">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" readonly value="{{ $user->phone }}"
                                        class="form-control mt-2">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="city">City</label>
                                    <input type="text" name="city" value="{{ $user->city }}"
                                        class="form-control mt-2">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="city">District</label>
                                    <input type="text" name="district" readonly value="{{ $user->district->name }}"
                                        class="form-control mt-2">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="city">Sub District</label>
                                    <input type="text" name="sub_district" readonly
                                        value="{{ $user->subDistrict->name }}" class="form-control mt-2">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="city">Address</label>
                                    <input type="text" name="address" value="{{ $user->address }}"
                                        class="form-control mt-2">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" class="form-control mt-2">
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm mt-5">Update Admin</button>

                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="password">Change Password</label>
                                    <input type="password" name="password" placeholder="Write New Password!"
                                        class="form-control mt-2">
                                </div>
                                <div style="display: flex;justify-content: center;padding: 30px 0;">
                                    @if (!empty($user->image))
                                        <img style="width: 200px;height: 200px;border: 1px solid gray;border-radius: 50%;padding: 10px;" src="{{ asset('uploads/profile/' . $user->image) }}" alt="">
                                    @else
                                        <img style="width: 200px;height: 200px;border: 1px solid gray;border-radius: 50%;padding: 10px;" src="{{ asset('assets/zamanshops.png') }}" alt="">
                                    @endif
                                  </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
