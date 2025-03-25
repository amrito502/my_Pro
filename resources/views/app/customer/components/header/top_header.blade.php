<div class="header-top">
    <div class="container">
        <div class="header-left">
            <p class="welcome-msg">Welcome to Zamanshops</p>
        </div>
        <div class="header-right">
            <div class="dropdown">
                <a href="#currency">BDT</a>
                <div class="dropdown-box">
                    <a href="#USD">BDT</a>
                    <a href="#EUR">USD</a>
                </div>
            </div>
            <!-- End of DropDown Menu -->

            <div class="dropdown">
                <a href="#language"><img src="{{ url('') }}/assets/images/flags/eng.png" alt="ENG Flag" width="14"
                        height="8" class="dropdown-image" /> ENG</a>
                <div class="dropdown-box">
                    <a href="#ENG">
                        <img src="{{ url('') }}/assets/images/flags/eng.png" alt="ENG Flag" width="14" height="8"
                            class="dropdown-image" />
                        ENG
                    </a>
                </div>
            </div>
            <!-- End of Dropdown Menu -->
            <span class="divider d-lg-show"></span>
            <a href="blog.html" class="d-lg-show">Blog</a>
            <a href="contact-us.html" class="d-lg-show">Contact Us</a>
            @if (!auth()->user())

            <a href="{{ route('login') }}" class="d-lg-show"><i
                    class="w-icon-account"></i>Sign In</a>
            <span class="delimiter d-lg-show">/</span>
            <a href="{{ route('customer.register') }}" class="ml-0 d-lg-show ">Register</a>
            @else
            <a href="{{ route('dashboard') }}" class="d-lg-show">My Account</a>
            <img style="width: 30px;border-radius: 20px;margin-left: 7px;" src="{{ asset(auth()->user()->image) }}" alt="">
            @endif
        </div>
    </div>
</div>
