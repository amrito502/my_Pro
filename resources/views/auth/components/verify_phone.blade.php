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
                    <ul class="nav nav-tabs text-uppercase mb-2" style="margin-bottom: 45px !important;">
                        <li class="nav-item">
                            <a href="" class="nav-link">Verify OTP</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        @if(session('error'))
                        <p style="color: red; text-align: center;">{{ session('error') }}</p>
                        @endif
                        @if(session('success'))
                            <p style="color: green; text-align: center;">{{ session('success') }}</p>
                        @endif
                        <form method="POST" action="{{ route('verify.phone.store') }}" class="registration-form">
                            @csrf
                            <div class="form-group">
                                <label for="otp">Phone Verification <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" name="otp" id="otp" placeholder="Enter OTP" required>
                            </div>
                         
                            <button class="btn btn-primary w-100" type="submit">Verify OTP</button>
                       </form>

                       <div class="mt-3" style="display: flex;justify-content: center;margin-bottom: 10px;">
                        <form method="POST" action="{{ route('otp.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link">Resend OTP</button>
                        </form>
                    </div>

                    </div>

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
