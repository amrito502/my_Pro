<div class="mobile-menu-wrapper">
    <div class="mobile-menu-overlay"></div>
    <!-- End of .mobile-menu-overlay -->

    <a href="#" class="mobile-menu-close"><i class="close-icon"></i></a>
    <!-- End of .mobile-menu-close -->

    <div class="mobile-menu-container scrollable">
        <form action="#" method="get" class="input-wrapper">
            <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search" required />
            <button class="btn btn-search" type="submit">
                <i class="w-icon-search"></i>
            </button>
        </form>
        <!-- End of Search Form -->
        <div class="tab">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a href="#main-menu" class="nav-link active">Main Menu</a>
                </li>
                <li class="nav-item">
                    <a href="#categories" class="nav-link">Categories</a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="main-menu">
                <ul class="mobile-menu">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>
                        <a href="#">Shop</a>
                        <ul>

                            @foreach (App\Models\Category::all() as $header_category)
                                @if (!empty($header_category->subCategories->count()))
                                    <li>
                                        <a href="{{ url($header_category->slug) }}">{{ $header_category->name }}</a>

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
                    </li>
              
               
                   
                    <li>
                    
                        <a href="{{ url('nearby-products') }}">Near You</a>
                    </li>
                    <li>
                    
                        <a href="{{ url('search-products') }}">Distance Deals</a>
                    </li>
                </ul>
            </div>
            {{-- <div class="tab-pane" id="categories">
                <ul class="mobile-menu">
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-tshirt2"></i>Fashion
                        </a>
                        <ul>
                            <li>
                                <a href="#">Women</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">New Arrivals</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Best Sellers</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Trending</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Clothing</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Shoes</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Bags</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Accessories</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Jewlery &
                                            Watches</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Men</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">New Arrivals</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Best Sellers</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Trending</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Clothing</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Shoes</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Bags</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Accessories</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Jewlery &
                                            Watches</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-home"></i>Home & Garden
                        </a>
                        <ul>
                            <li>
                                <a href="#">Bedroom</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">Beds, Frames &
                                            Bases</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Dressers</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Nightstands</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Kid's Beds &
                                            Headboards</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Armoires</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Living Room</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">Coffee Tables</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Chairs</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Tables</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Futons & Sofa
                                            Beds</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Cabinets &
                                            Chests</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Office</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">Office Chairs</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Desks</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Bookcases</a></li>
                                    <li><a href="shop-fullwidth-banner.html">File Cabinets</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Breakroom
                                            Tables</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Kitchen & Dining</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">Dining Sets</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Kitchen Storage
                                            Cabinets</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Bashers Racks</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Dining Chairs</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Dining Room
                                            Tables</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Bar Stools</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-electronics"></i>Electronics
                        </a>
                        <ul>
                            <li>
                                <a href="#">Laptops &amp; Computers</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">Desktop
                                            Computers</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Monitors</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Laptops</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Hard Drives &amp;
                                            Storage</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Computer
                                            Accessories</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">TV &amp; Video</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">TVs</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Home Audio
                                            Speakers</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Projectors</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Media Streaming
                                            Devices</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Digital Cameras</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">Digital SLR
                                            Cameras</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Sports & Action
                                            Cameras</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Camera Lenses</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Photo Printer</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Digital Memory
                                            Cards</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Cell Phones</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">Carrier Phones</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Unlocked Phones</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Phone & Cellphone
                                            Cases</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Cellphone
                                            Chargers</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-furniture"></i>Furniture
                        </a>
                        <ul>
                            <li>
                                <a href="#">Furniture</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">Sofas & Couches</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Armchairs</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Bed Frames</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Beside Tables</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Dressing Tables</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Lighting</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">Light Bulbs</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Lamps</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Celling Lights</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Wall Lights</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Bathroom
                                            Lighting</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Home Accessories</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">Decorative
                                            Accessories</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Candals &
                                            Holders</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Home Fragrance</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Mirrors</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Clocks</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Garden & Outdoors</a>
                                <ul>
                                    <li><a href="shop-fullwidth-banner.html">Garden
                                            Furniture</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Lawn Mowers</a>
                                    </li>
                                    <li><a href="shop-fullwidth-banner.html">Pressure
                                            Washers</a></li>
                                    <li><a href="shop-fullwidth-banner.html">All Garden
                                            Tools</a></li>
                                    <li><a href="shop-fullwidth-banner.html">Outdoor Dining</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-heartbeat"></i>Healthy & Beauty
                        </a>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-gift"></i>Gift Ideas
                        </a>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-gamepad"></i>Toy & Games
                        </a>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-ice-cream"></i>Cooking
                        </a>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-ios"></i>Smart Phones
                        </a>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-camera"></i>Cameras & Photo
                        </a>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-ruby"></i>Accessories
                        </a>
                    </li>
                    <li>
                        <a href="shop-banner-sidebar.html" class="font-weight-bold text-primary text-uppercase ls-25">
                            View All Categories<i class="w-icon-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </div> --}}
        </div>
    </div>
</div>
