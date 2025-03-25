@extends('app.customer.master')
@section('customer')
<main class="main login-page">
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">My Account</h1>
        </div>
    </div>

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
            <div class="login-popup">
                <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                    <ul class="nav nav-tabs text-uppercase mb-2" style="margin-bottom: 41px !important;">
                        <li class="nav-item">
                            <a href="" class="nav-link">Login</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        @if(session('error'))
                        <p style="color: red; text-align: center;">{{ session('error') }}</p>
                    @endif
                    @if(session('success'))
                        <p style="color: green; text-align: center;">{{ session('success') }}</p>
                    @endif

                    <form method="POST" action="{{ url('/customer/login') }}" class="registration-form">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="login">Email or Phone*</label>
                            <input type="text" class="form-control" name="login" id="login" value="{{ old('login') }}" placeholder="Enter your email or phone" required autofocus>
                            @error('login')
                            <div class="mt-2" style="color: red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="password">Password*</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
                            @error('password')
                            <div class="mt-2" style="color: red">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Login Account</button>
                    </form>

                    </div>
                    <p class="text-center mt-3"><a href="{{ url('/customer/register') }}">Register Now</a> If you have not an account!</p>
                    <div class="social-icons social-icon-border-color d-flex justify-content-center">
                        <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                        <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                        <a href="#" class="social-icon social-google fab fa-google"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection







