@extends('app.customer.master')
@section('customer')
<main class="main">
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb bb-no">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="#">Vendor</a></li>
                <li><a href="#">Dokan</a></li>
                <li>Store</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of Pgae Contetn -->
    <div class="page-content mb-8">
        <div class="container">
            <div class="row gutter-lg">
                <aside class="sidebar left-sidebar vendor-sidebar sticky-sidebar-wrapper sidebar-fixed">
                    <!-- Start of Sidebar Overlay -->
                    <div class="sidebar-overlay"></div>
                    <a class="sidebar-close" href="#"><i class="close-icon"></i></a>
                    <a href="#" class="sidebar-toggle"><i class="fas fa-chevron-right"></i></a>
                    <div class="sidebar-content">
                        <div class="sticky-sidebar">
                            
                            <!-- End of Widget -->
                            <div class="widget widget-collapsible widget-time">
                                <h3 class="widget-title"><span>Store Time</span></h3>
                                <ul class="widget-body">
                                    <li><label>Sunday</label> <span style="color: red;">Closed</span></li>
                                    <li><label>Monday</label> 9:00 AM - 6:00 PM</li>
                                    <li><label>Tuesday</label> 9:00 AM - 6:00 PM</li>
                                    <li><label>Wednesday </label> 9:00 AM - 6:00 PM</li>
                                    <li><label>Thursday </label> 9:00 AM - 6:00 PM</li>
                                    <li><label>Friday </label> 9:00 AM - 6:00 PM</li>
                                    <li><label>Saturday </label> 9:00 AM - 6:00 PM</li>
                                </ul>
                            </div>
                            <!-- End of Widget -->
                        
                        </div>
                    </div>
                </aside>
                <!-- End of Sidebar -->

                <div class="main-content">
                    <div class="store store-banner mb-4">
                        <figure class="store-media">
                            <img src="{{ asset('uploads/store_image/' . $vendor_store->sellerRequest->store_image) }}" alt="Vendor" width="930" height="446"
                                style="background-color: #414960; height: 446px;" />
                        </figure>
                        <div class="store-content">
                            <figure class="seller-brand">
                                <img src="{{ asset('uploads/profile/'.$vendor_store->image) }}" alt="Brand" width="80"
                                    height="80" style="width: 80px; height:80px;" />
                            </figure>
                            <h4 class="store-title">{{ $vendor_store->sellerRequest->store_name }}</h4>
                            <ul class="seller-info-list list-style-none mb-6">
                                <li class="store-address">
                                    <i class="w-icon-map-marker"></i>
                                    {{ $vendor_store->sellerRequest->address }}
                                </li>
                                <li class="store-phone">
                                    <a href="tel:1234567890">
                                        <i class="w-icon-phone"></i>
                                        {{ $vendor_store->sellerRequest->phone }}
                                    </a>
                                </li>
                                <li class="store-rating">
                                    <i class="w-icon-star-full"></i>
                                    4.33 rating from 3 reviews
                                </li>
                                <li class="store-open">
                                    <i class="w-icon-cart"></i>
                                    Store Open
                                </li>
                            </ul>
                            <div class="social-icons social-no-color border-thin">
                                <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                                <a href="#" class="social-icon social-google w-icon-google"></a>
                                <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                                <a href="#" class="social-icon social-pinterest w-icon-pinterest"></a>
                                <a href="#" class="social-icon social-youtube w-icon-youtube"></a>
                                <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                            </div>
                        </div>
                    </div>
                    <!-- End of Store Banner -->

                    <h2 class="title vendor-product-title mb-4"><a href="#">Products</a></h2>

                    <div class="product-wrapper row cols-md-3 cols-sm-2 cols-2">

                        @foreach ($vendor_store->products as $product)
                        <div class="product-wrap">
                            <div class="product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('uploads/products/' . $product->image) }}" alt="Product"
                                            width="300" height="338" style="height: 338px;" />
                                        <img src="{{ asset('uploads/products/' . $product->image) }}" alt="Product"
                                            width="300" height="338" />
                                    </a>
                                    <div class="product-action-vertical">
    
                                        @if (Surfsidemedia\Shoppingcart\Facades\Cart::instance('wishlist')->content()->where('id', $product->id)->count() > 0)
                                            <a href="{{ route('cart.index') }}" class="btn-product-icon w-icon-cart"
                                                title="Add to cart"></a>
                                        @else
                                            <form action="{{ route('cart.add') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="quantity" value="1" min="1">
                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                                <input type="hidden" name="name" value="{{ $product->name }}">
                                                <input type="hidden" name="image" value="{{ $product->image }}">
                                                <input type="hidden" name="price"
                                                    value="{{ $product->current_price == '' ? $product->discount_price : $product->current_price }}">
                                                <button type="submit" class="btn-product-icon w-icon-cart"
                                                    title="Add to cart"></button>
                                            </form>
                                        @endif
    
    
    
                                        @if (Surfsidemedia\Shoppingcart\Facades\Cart::instance('wishlist')->content()->where('id', $product->id)->count() > 0)
                                            <a href="{{ route('wishlist.index') }}" class="btn-product-icon  w-icon-heart"
                                                title="Add to wishlist"></a>
                                        @else
                                            <form action="{{ route('wishlist.add') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                                <input type="hidden" name="name" value="{{ $product->name }}">
                                                <input type="hidden" name="price"
                                                    value="{{ $product->current_price == '' ? $product->discount_price : $product->current_price }}">
                                                <input type="hidden" name="quantity" value="1" min="1">
                                                <input type="hidden" name="image" value="{{ $product->image }}">
                                                <button type="submit" class="btn-product-icon w-icon-heart"
                                                    title="Add to wishlist">
    
                                                </button>
    
                                            </form>
                                        @endif
    
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a
                                            href="{{ route('product_details.page', ['id' => $product->id]) }}">{{ $product->name }}</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 60%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(1 Reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">{{ $product->current_price }}</ins>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
    

                        
                    </div>
                </div>
                <!-- End of Main Content -->
            </div>
        </div>
    </div>
    <!-- End of Page Content -->
</main>
@endsection
