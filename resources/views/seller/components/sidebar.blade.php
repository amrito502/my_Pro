<!-- sa-app__sidebar -->
<div class="sa-app__sidebar">
    <div class="sa-sidebar">
        <div class="sa-sidebar__header">
            <a class="sa-sidebar__logo" href="{{ route('seller.dashboard') }}" style="border: 1px solid #040404;">
                <!-- logo -->
                <div class="sa-sidebar-logo" >
                 <img style="width: 50px;height: 38px;margin-right: 10px;" src="{{ asset('assets/zamanshops.png') }}" alt="">
                 <span style="font-size: 20px;color: #2c2a2a;font-weight: 600;">Zamanshops</span>
                    {{-- <h5 class="text-dark mt-2">Zamanshops</h5>
                    <div class="sa-sidebar-logo__caption">Admin</div> --}}
                </div>
                <!-- logo / end -->
            </a>
        </div>
        <div class="sa-sidebar__body" data-simplebar="">
            <ul class="sa-nav sa-nav--sidebar" data-sa-collapse="">
                <li class="sa-nav__section">
                    <div class="sa-nav__section-title"><span>Application</span></div>
                    <ul class="sa-nav__menu sa-nav__menu--root">


                        <li class="sa-nav__menu-item sa-nav__menu-item--has-icon" data-sa-collapse-item="sa-nav__menu-item--open">
                            <a href="#" class="sa-nav__link" data-sa-collapse-trigger="">
                                <span class="sa-nav__icon">
                                    <i class="fa-solid fa-gauge-simple"></i>
                                </span>
                                <span class="sa-nav__title">Dashboard</span>
                                <span class="sa-nav__arrow">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="9" viewBox="0 0 6 9" fill="currentColor">
                                        <path
                                            d="M5.605,0.213 C6.007,0.613 6.107,1.212 5.706,1.612 L2.696,4.511 L5.706,7.409 C6.107,7.809 6.107,8.509 5.605,8.808 C5.204,9.108 4.702,9.108 4.301,8.709 L-0.013,4.511 L4.401,0.313 C4.702,-0.087 5.304,-0.087 5.605,0.213 Z"
                                        ></path>
                                    </svg>
                                </span>
                            </a>
                            <ul class="sa-nav__menu sa-nav__menu--sub" data-sa-collapse-content="">
                                <li class="sa-nav__menu-item">
                                    <a href="{{ route('dashboard') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Customer Dashboard</span>
                                    </a>

                                    <a href="{{ route('seller.dashboard') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Vendor Dashboard</span>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="sa-nav__menu-item sa-nav__menu-item--has-icon" data-sa-collapse-item="sa-nav__menu-item--open">
                            <a href="#" class="sa-nav__link" data-sa-collapse-trigger="">
                                <span class="sa-nav__icon">
                                    <i class="fa-brands fa-product-hunt"></i>
                                </span>
                                <span class="sa-nav__title">Product</span>
                                <span class="sa-nav__arrow">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="9" viewBox="0 0 6 9" fill="currentColor">
                                        <path
                                            d="M5.605,0.213 C6.007,0.613 6.107,1.212 5.706,1.612 L2.696,4.511 L5.706,7.409 C6.107,7.809 6.107,8.509 5.605,8.808 C5.204,9.108 4.702,9.108 4.301,8.709 L-0.013,4.511 L4.401,0.313 C4.702,-0.087 5.304,-0.087 5.605,0.213 Z"
                                        ></path>
                                    </svg>
                                </span>
                            </a>
                            <ul class="sa-nav__menu sa-nav__menu--sub" data-sa-collapse-content="">
                                <li class="sa-nav__menu-item">
                                    <a href="{{ route('sellerproducts.create') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Add Product</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item">
                                    <a href="{{ route('sellerproducts.index') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Product Manage</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sa-nav__menu-item sa-nav__menu-item--has-icon" data-sa-collapse-item="sa-nav__menu-item--open">
                            <a href="#" class="sa-nav__link" data-sa-collapse-trigger="">
                                <span class="sa-nav__icon">
                                    <i class="fa-solid fa-arrow-down-wide-short"></i>
                                </span>
                                <span class="sa-nav__title">Order Manage</span>
                                <span class="sa-nav__arrow">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="9" viewBox="0 0 6 9" fill="currentColor">
                                        <path
                                            d="M5.605,0.213 C6.007,0.613 6.107,1.212 5.706,1.612 L2.696,4.511 L5.706,7.409 C6.107,7.809 6.107,8.509 5.605,8.808 C5.204,9.108 4.702,9.108 4.301,8.709 L-0.013,4.511 L4.401,0.313 C4.702,-0.087 5.304,-0.087 5.605,0.213 Z"
                                        ></path>
                                    </svg>
                                </span>
                            </a>
                            <ul class="sa-nav__menu sa-nav__menu--sub" data-sa-collapse-content="">
                                <li class="sa-nav__menu-item">
                                    <a href="{{ route('seller.order') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">All Order</span>
                                    </a>
                                </li>
                                {{-- <li class="sa-nav__menu-item">
                                    <a href="{{ route('sellerproducts.index') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Approved Order</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item">
                                    <a href="{{ route('sellerproducts.index') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Canceled Order</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item">
                                    <a href="{{ route('sellerproducts.index') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Delivered Order</span>
                                    </a>
                                </li> --}}
                            </ul>
                        </li>



                        @if (App\Models\SellerRequest::count())
                        <li class="sa-nav__menu-item sa-nav__menu-item--has-icon" data-sa-collapse-item="sa-nav__menu-item--open">
                            <a href="#" class="sa-nav__link" data-sa-collapse-trigger="">
                                <span class="sa-nav__icon">
                                    <i class="fa-solid fa-shop"></i>
                                </span>
                                <span class="sa-nav__title">My Store</span>
                                <span class="sa-nav__arrow">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="9" viewBox="0 0 6 9" fill="currentColor">
                                        <path
                                            d="M5.605,0.213 C6.007,0.613 6.107,1.212 5.706,1.612 L2.696,4.511 L5.706,7.409 C6.107,7.809 6.107,8.509 5.605,8.808 C5.204,9.108 4.702,9.108 4.301,8.709 L-0.013,4.511 L4.401,0.313 C4.702,-0.087 5.304,-0.087 5.605,0.213 Z"
                                        ></path>
                                    </svg>
                                </span>
                            </a>
                            <ul class="sa-nav__menu sa-nav__menu--sub" data-sa-collapse-content="">
                                <li class="sa-nav__menu-item">
                                    <a href="{{ route('sellerupdateRequest_page') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Update Store</span>
                                    </a>

                                    <a href="{{ route('store_details') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Store Details</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif
                        

                        <li class="sa-nav__menu-item sa-nav__menu-item--has-icon" data-sa-collapse-item="sa-nav__menu-item--open">
                            <a href="#" class="sa-nav__link" data-sa-collapse-trigger="">
                                <span class="sa-nav__icon">
                                    <i class="fa-solid fa-magnifying-glass-chart"></i>
                                </span>
                                <span class="sa-nav__title">Sales Report</span>
                                <span class="sa-nav__arrow">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="9" viewBox="0 0 6 9" fill="currentColor">
                                        <path
                                            d="M5.605,0.213 C6.007,0.613 6.107,1.212 5.706,1.612 L2.696,4.511 L5.706,7.409 C6.107,7.809 6.107,8.509 5.605,8.808 C5.204,9.108 4.702,9.108 4.301,8.709 L-0.013,4.511 L4.401,0.313 C4.702,-0.087 5.304,-0.087 5.605,0.213 Z"
                                        ></path>
                                    </svg>
                                </span>
                            </a>
                            <ul class="sa-nav__menu sa-nav__menu--sub" data-sa-collapse-content="">
                                <li class="sa-nav__menu-item">
                                    <a href="{{ route('seller_sales_report') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Report</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sa-nav__menu-item sa-nav__menu-item--has-icon" data-sa-collapse-item="sa-nav__menu-item--open">
                            <a href="#" class="sa-nav__link" data-sa-collapse-trigger="">
                                <span class="sa-nav__icon">
                                    <i class="fa-solid fa-gear"></i>
                                </span>
                                <span class="sa-nav__title">Settings</span>
                                <span class="sa-nav__arrow">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="6" height="9" viewBox="0 0 6 9" fill="currentColor">
                                        <path
                                            d="M5.605,0.213 C6.007,0.613 6.107,1.212 5.706,1.612 L2.696,4.511 L5.706,7.409 C6.107,7.809 6.107,8.509 5.605,8.808 C5.204,9.108 4.702,9.108 4.301,8.709 L-0.013,4.511 L4.401,0.313 C4.702,-0.087 5.304,-0.087 5.605,0.213 Z"
                                        ></path>
                                    </svg>
                                </span>
                            </a>
                            <ul class="sa-nav__menu sa-nav__menu--sub" data-sa-collapse-content="">
                                <li class="sa-nav__menu-item">
                                    <a href="{{ route('seller_update_profile_page') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Update Profile & Password</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="sa-app__sidebar-shadow"></div>
    <div class="sa-app__sidebar-backdrop" data-sa-close-sidebar=""></div>
</div>
<!-- sa-app__sidebar / end -->
