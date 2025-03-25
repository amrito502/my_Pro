<!-- sa-app__sidebar -->
<div class="sa-app__sidebar">
    <div class="sa-sidebar">
        <div class="sa-sidebar__header">
            <a class="sa-sidebar__logo" href="{{ route('admin.dashboard') }}" style="border: 1px solid #040404;">
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
                                    <i class="fa-solid fa-gauge"></i>
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
                                </li>
                                <li class="sa-nav__menu-item">
                                    <a href="{{ route('seller.dashboard') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Seller Dashboard</span>
                                    </a>
                                </li>
                            </ul>
                        </li>



                        <li class="sa-nav__menu-item sa-nav__menu-item--has-icon" data-sa-collapse-item="sa-nav__menu-item--open">
                            <a href="#" class="sa-nav__link" data-sa-collapse-trigger="">
                                <span class="sa-nav__icon">
                                    <i class="fa-solid fa-copyright"></i>
                                </span>
                                <span class="sa-nav__title">Brand</span>
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
                                    <a href="{{ route('brands.create') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Add Brand</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item">
                                    <a href="{{ route('brands.index') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Manage Brand</span>
                                    </a>
                                </li>
                            </ul>
                        </li>






                        <li class="sa-nav__menu-item sa-nav__menu-item--has-icon" data-sa-collapse-item="sa-nav__menu-item--open">
                            <a href="#" class="sa-nav__link" data-sa-collapse-trigger="">
                                <span class="sa-nav__icon">
                                    <i class="fa-solid fa-list"></i>
                                </span>
                                <span class="sa-nav__title">Category</span>
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
                                    <a href="{{ route('categories.create') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Add Category</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item">
                                    <a href="{{ route('categories.index') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Manage Category</span>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="sa-nav__menu-item sa-nav__menu-item--has-icon" data-sa-collapse-item="sa-nav__menu-item--open">
                            <a href="#" class="sa-nav__link" data-sa-collapse-trigger="">
                                <span class="sa-nav__icon">
                                    <i class="fa-solid fa-layer-group"></i>
                                </span>
                                <span class="sa-nav__title">Sub Category</span>
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
                                    <a href="{{ route('subcategories.create') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Add SubCategory</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item">
                                    <a href="{{ route('subcategories.index') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Manage SubCategory</span>
                                    </a>
                                </li>
                            </ul>
                        </li>



                        <li class="sa-nav__menu-item sa-nav__menu-item--has-icon" data-sa-collapse-item="sa-nav__menu-item--open">
                            <a href="#" class="sa-nav__link" data-sa-collapse-trigger="">
                                <span class="sa-nav__icon">
                                    <i class="fa-solid fa-table-list"></i>
                                </span>
                                <span class="sa-nav__title">Section</span>
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
                                    <a href="{{ route('sections.create') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Add Section</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item">
                                    <a href="{{ route('sections.index') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Manage Section</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sa-nav__menu-item sa-nav__menu-item--has-icon" data-sa-collapse-item="sa-nav__menu-item--open">
                            <a href="#" class="sa-nav__link" data-sa-collapse-trigger="">
                                <span class="sa-nav__icon">
                                    <i class="fa-solid fa-palette"></i>
                                </span>
                                <span class="sa-nav__title">Color</span>
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
                                    <a href="{{ route('colors.create') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Add Color</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item">
                                    <a href="{{ route('colors.index') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Manage Color</span>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="sa-nav__menu-item sa-nav__menu-item--has-icon" data-sa-collapse-item="sa-nav__menu-item--open">
                            <a href="#" class="sa-nav__link" data-sa-collapse-trigger="">
                                <span class="sa-nav__icon">
                                    <i class="fa-solid fa-maximize"></i>
                                </span>
                                <span class="sa-nav__title">Size</span>
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
                                    <a href="{{ route('sizes.create') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Add Size</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item">
                                    <a href="{{ route('sizes.index') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Manage Size</span>
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
                                    <a href="{{ route('products.create') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Add Product</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item">
                                    <a href="{{ route('products.index') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Manage Product</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sa-nav__menu-item sa-nav__menu-item--has-icon" data-sa-collapse-item="sa-nav__menu-item--open">
                            <a href="#" class="sa-nav__link" data-sa-collapse-trigger="">
                                <span class="sa-nav__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor">
                                        <path
                                            d="M8,10c-3.3,0-6,2.7-6,6H0c0-3.2,1.9-6,4.7-7.3C3.7,7.8,3,6.5,3,5c0-2.8,2.2-5,5-5s5,2.2,5,5c0,1.5-0.7,2.8-1.7,3.7c2.8,1.3,4.7,4,4.7,7.3h-2C14,12.7,11.3,10,8,10z M8,2C6.3,2,5,3.3,5,5s1.3,3,3,3s3-1.3,3-3S9.7,2,8,2z"
                                        ></path>
                                    </svg>
                                </span>
                                <span class="sa-nav__title">Seller</span>
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
                                    <a href="{{ route('all_seller_list') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Seller manage</span>
                                    </a>
                                </li>

                                <li class="sa-nav__menu-item">
                                    <a href="{{ route('admin.seller.requests') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Seller Request</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sa-nav__menu-item sa-nav__menu-item--has-icon" data-sa-collapse-item="sa-nav__menu-item--open">
                            <a href="#" class="sa-nav__link" data-sa-collapse-trigger="">
                                <span class="sa-nav__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor">
                                        <path
                                            d="M8,10c-3.3,0-6,2.7-6,6H0c0-3.2,1.9-6,4.7-7.3C3.7,7.8,3,6.5,3,5c0-2.8,2.2-5,5-5s5,2.2,5,5c0,1.5-0.7,2.8-1.7,3.7c2.8,1.3,4.7,4,4.7,7.3h-2C14,12.7,11.3,10,8,10z M8,2C6.3,2,5,3.3,5,5s1.3,3,3,3s3-1.3,3-3S9.7,2,8,2z"
                                        ></path>
                                    </svg>
                                </span>
                                <span class="sa-nav__title">Customer</span>
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
                                    <a href="{{ route('all_customer_list') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Manage Customer</span>
                                    </a>
                                </li>

                            </ul>
                        </li>


                  
                       

                        <li class="sa-nav__menu-item sa-nav__menu-item--has-icon" data-sa-collapse-item="sa-nav__menu-item--open">
                            <a href="#" class="sa-nav__link" data-sa-collapse-trigger="">
                                <span class="sa-nav__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor">
                                        <path
                                            d="M11.5,3C12.9,3,14,4.1,14,5.5c0,2.7-4.3,6.4-6,7.4c-1.7-1-6-4.7-6-7.4C2,4.1,3.1,3,4.5,3C5.3,3,6,3.3,6.4,3.9L8,5.3l1.6-1.4C10,3.3,10.7,3,11.5,3 M11.5,1C10.1,1,8.8,1.6,8,2.7C7.2,1.6,5.9,1,4.5,1C2,1,0,3,0,5.5C0,10,7,15,8,15s8-5,8-9.5C16,3,14,1,11.5,1L11.5,1z"
                                        ></path>
                                    </svg>
                                </span>
                                <span class="sa-nav__title">Coupon</span>
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
                                    <a href="{{ route('coupons.create') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Add Coupon</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item">
                                    <a href="{{ route('coupons.index') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Manage Coupon</span>
                                    </a>
                                </li>
                            </ul>
                        </li>



                        <li class="sa-nav__menu-item sa-nav__menu-item--has-icon" data-sa-collapse-item="sa-nav__menu-item--open">
                            <a href="#" class="sa-nav__link" data-sa-collapse-trigger="">
                                <span class="sa-nav__icon">
                                    <i class="fa-solid fa-blog"></i>
                                </span>
                                <span class="sa-nav__title">Blog Category</span>
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
                                    <a href="{{ route('blog_categories.create') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Add Category</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item">
                                    <a href="{{ route('blog_categories.index') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Manage Category</span>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="sa-nav__menu-item sa-nav__menu-item--has-icon" data-sa-collapse-item="sa-nav__menu-item--open">
                            <a href="#" class="sa-nav__link" data-sa-collapse-trigger="">
                                <span class="sa-nav__icon">
                                    <i class="fa-solid fa-blog"></i>
                                </span>
                                <span class="sa-nav__title">Blog</span>
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
                                    <a href="{{ route('blogs.create') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Publish Post</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item">
                                    <a href="{{ route('blogs.index') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Manage Posts</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sa-nav__menu-item sa-nav__menu-item--has-icon" data-sa-collapse-item="sa-nav__menu-item--open">
                            <a href="#" class="sa-nav__link" data-sa-collapse-trigger="">
                                <span class="sa-nav__icon">
                                    <i class="fa-solid fa-magnifying-glass-chart"></i>
                                </span>
                                <span class="sa-nav__title">Reports</span>
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
                                    <a href="{{ route('admin_order_reports') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Sales and Order Reports</span>
                                    </a>
                                </li>
                            </ul>
                        </li>





                        




                        {{-- <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                            <a href="app-file-manager.html" class="sa-nav__link">
                                <span class="sa-nav__icon"><i class="fas fa-hdd"></i></span>
                                <span class="sa-nav__title">File Manager</span>
                            </a>
                        </li> --}}



                        <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                            <a href="{{ route('admin_message_show') }}" class="sa-nav__link">
                                <span class="sa-nav__icon"><i class="fa-solid fa-comment-sms"></i></span>
                                <span class="sa-nav__title">Message</span>
                            </a>
                        </li>
                        <li class="sa-nav__menu-item sa-nav__menu-item--has-icon">
                            <a href="{{ route('admin_subscribe_reports') }}" class="sa-nav__link">
                                <span class="sa-nav__icon"><i class="fa-solid fa-envelope-open"></i></span>
                                <span class="sa-nav__title">Subscribe Newsletter</span>
                            </a>
                        </li>

                        <li class="sa-nav__menu-item sa-nav__menu-item--has-icon" data-sa-collapse-item="sa-nav__menu-item--open">
                            <a href="#" class="sa-nav__link" data-sa-collapse-trigger="">
                                <span class="sa-nav__icon">
                                    <i class="fa-solid fa-building"></i>
                                </span>
                                <span class="sa-nav__title">Company</span>
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
                                    <a href="{{ route('companies.create') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Add Company</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item">
                                    <a href="{{ route('companies.index') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Manage Company</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="sa-nav__menu-item sa-nav__menu-item--has-icon" data-sa-collapse-item="sa-nav__menu-item--open">
                            <a href="#" class="sa-nav__link" data-sa-collapse-trigger="">
                                <span class="sa-nav__icon">
                                    <i class="fa-solid fa-sliders"></i>
                                </span>
                                <span class="sa-nav__title">Slider</span>
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
                                    <a href="{{ route('product_sliders.create') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Add Slider</span>
                                    </a>
                                </li>
                                <li class="sa-nav__menu-item">
                                    <a href="{{ route('product_sliders.index') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Manage Slider</span>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="sa-nav__menu-item sa-nav__menu-item--has-icon" data-sa-collapse-item="sa-nav__menu-item--open">
                            <a href="#" class="sa-nav__link" data-sa-collapse-trigger="">
                                <span class="sa-nav__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor">
                                        <path
                                            d="M8,10c-3.3,0-6,2.7-6,6H0c0-3.2,1.9-6,4.7-7.3C3.7,7.8,3,6.5,3,5c0-2.8,2.2-5,5-5s5,2.2,5,5c0,1.5-0.7,2.8-1.7,3.7c2.8,1.3,4.7,4,4.7,7.3h-2C14,12.7,11.3,10,8,10z M8,2C6.3,2,5,3.3,5,5s1.3,3,3,3s3-1.3,3-3S9.7,2,8,2z"
                                        ></path>
                                    </svg>
                                </span>
                                <span class="sa-nav__title">User Manage</span>
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
                                    <a href="{{ route('admin_user_index') }}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">Manage User</span>
                                    </a>
                                </li>

                                <li class="sa-nav__menu-item">
                                    <a href="{{route('admin.users')}}" class="sa-nav__link">
                                        <span class="sa-nav__menu-item-padding"></span>
                                        <span class="sa-nav__title">User Block Manage</span>
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
