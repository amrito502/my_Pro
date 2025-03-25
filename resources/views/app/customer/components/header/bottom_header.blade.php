<div class="header-bottom sticky-content fix-top sticky-header">
    <div class="container">
        <div class="inner-wrap">
            <div class="header-left">
                <div class="dropdown category-dropdown has-border" data-visible="true">
                    <a href="#" class="category-toggle" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="true" data-display="static" title="Browse Categories">
                        <i class="w-icon-category"></i>
                        <span>Browse Categories</span>
                    </a>

                    <div class="dropdown-box">
                        <ul class="menu vertical-menu category-menu">
                            @foreach (App\Models\Category::all() as $header_category)
                            @if (!empty($header_category->subCategories->count()))
                            <li>
                                <a href="{{ url($header_category->slug) }}">
                                    <i class="w-icon-tshirt2"></i>{{ $header_category->name }}
                                </a>
                                <ul class="megamenu">
                                    <li>
                                        <h4 class="menu-title">{{ $header_category->name }}</h4>
                                        <hr class="divider">
                                        <ul>
                                            @foreach ($header_category->subCategories as $header_subcategory)
                                            <li><a href="{{ url($header_category->slug . '/' . $header_subcategory->slug) }}">{{ $header_subcategory->name }}</a>
                                            </li>
                                            @endforeach

                                        </ul>
                                    </li>

                                </ul>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <nav class="main-nav">
                    <ul class="menu active-underline">
                        <li>
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li>
                            <a href="#">Shop</a>

                            <!-- Start of Megamenu -->
                            <ul class="megamenu">
                                @foreach (App\Models\Category::all() as $header_category)
                                    @if (!empty($header_category->subCategories->count()))
                                        <li>
                                            <h4 class="menu-title"><a
                                                    href="{{ url($header_category->slug) }}">{{ $header_category->name }}</a>
                                            </h4>
                                            <ul>
                                                @foreach ($header_category->subCategories as $header_subcategory)
                                                    <li><a
                                                            href="{{ url($header_category->slug . '/' . $header_subcategory->slug) }}">{{ $header_subcategory->name }}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                @endforeach 

                            </ul>
                            <!-- End of Megamenu -->
                        </li>
                        <li>
                            <a href="{{ route('vendor_list') }}">Vendors</a>
                        </li>
                        <li>
                            <a href="{{ route('contact_page') }}">Contact</a>
                        </li>
                        <li>
                            <a href="{{ route('blog_list_front') }}">Blog</a>
                        </li>
                        {{-- <li>
                            <a href="vendor-dokan-store.html">Vendor</a>
                            <ul>
                                <li>
                                    <a href="vendor-dokan-store-list.html">Store Listing</a>
                                    <ul>
                                        <li><a href="vendor-dokan-store-list.html">Store listing 1</a></li>
                                        <li><a href="vendor-wcfm-store-list.html">Store listing 2</a></li>
                                        <li><a href="vendor-wcmp-store-list.html">Store listing 3</a></li>
                                        <li><a href="vendor-wc-store-list.html">Store listing 4</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="vendor-dokan-store.html">Vendor Store</a>
                                    <ul>
                                        <li><a href="vendor-dokan-store.html">Vendor Store 1</a></li>
                                        <li><a href="vendor-wcfm-store-product-grid.html">Vendor Store 2</a>
                                        </li>
                                        <li><a href="vendor-wcmp-store-product-grid.html">Vendor Store 3</a>
                                        </li>
                                        <li><a href="vendor-wc-store-product-grid.html">Vendor Store 4</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li> --}}
                        <li>
                            <a href="{{ url('nearby-products') }}">Near You</a>

                        </li>
                        <li>
                            <a href="{{ url('search-products') }}">Distance Deals</a>

                        </li>
                        <li>
                            {{-- <a href="{{ url('/blog') }}">Blog</a> --}}

                        </li>

                        <li>
                            {{-- <a href="{{ route('contact_us') }}">Contact</a> --}}

                        </li>
                    </ul>
                </nav>
            </div>
            <div class="header-right">
                {{-- <a href="#" class="d-xl-show"><i class="w-icon-map-marker mr-1"></i>Track Order</a> --}}
                <a href="#"><i class="w-icon-sale"></i>Daily Deals</a>
            </div>
        </div>
    </div>
</div>
