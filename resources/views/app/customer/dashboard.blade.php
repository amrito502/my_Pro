@extends('app.customer.master')
@section('customer')
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">My Account</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="demo1.html">Home</a></li>
                    <li>My account</li>
                </ul>
            </div>
        </nav>

        <div class="page-content">
            <div class="container">
                <div class="">
                    <div class=" tab-nav-boxed ">

                        <div class="row" style="margin: 100px 0px;border: 1px solid rgb(235, 232, 232);padding: 40px;">
                            <div class="d-flex">
                                @if (auth()->user()->role === 'customer')
                                <a class="btn btn-sm btn-success" href="{{ route('seller.request.create') }}">Become
                                    a seller</a>
                            @endif

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            @if (auth()->user()->role === 'seller' || auth()->user()->role === 'admin')
                                            <a href="{{ route('seller.dashboard') }}" class="btn btn-info btn-sm">Go to Seller
                                                Dashboard</a>
                                        @endif
                                    </div>
                                        <div class="col-md-6 mb-3">
                                            @if (auth()->user()->role === 'admin')
                                            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btn-sm">Go
                                                to Admin
                                                Dashboard</a>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            </div>








                            </div>
                            <div class="col-md-4">
                                <div class="card" style="border: 1px solid rgb(235, 232, 232);">
                                  <div style="display: flex;justify-content: center;padding: 30px 0;">
                                    @if (!empty($user->image))
                                        <img style="width: 200px;height: 200px;border: 1px solid gray;border-radius: 50%;padding: 10px;" src="{{ asset('uploads/profile/' . $user->image) }}" alt="">
                                    @else
                                        <img style="width: 200px;height: 200px;border: 1px solid gray;border-radius: 50%;padding: 10px;" src="{{ asset('assets/zamanshops.png') }}" alt="">
                                    @endif
                                  </div>

                                    <div class="pro_menu">
                                        <a class="nav-link" href="">Dashboard</a>
                                        <a class="nav-link" href="">My Orders</a>

                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button class="w-100 btn btn-success btn-sm" type="submit">Logout</button>
                                            </form>
                                        </div>

                                </div>

                            </div>
                            <div class="col-md-8">
                                <div class="card" style="padding: 24px;">
                                    <form action="{{ route('customer_update.profile', ['id' => auth()->user()->id]) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
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
                                            <input type="text" name="sub_district" readonly value="{{ $user->subDistrict->name }}"
                                                class="form-control mt-2">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="city">Address</label>
                                            <input type="text" name="address" value="{{ $user->address }}"
                                                class="form-control mt-2">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="password">Change Password</label>
                                            <input type="password" name="password" placeholder="Change Password"
                                                class="form-control mt-2">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" class="form-control mt-2">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm mt-5">Update Customer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
