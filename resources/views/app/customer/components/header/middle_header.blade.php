<div class="header-middle">
    <div class="container">
        <div class="header-left mr-md-4">
            <a href="#" class="mobile-menu-toggle  w-icon-hamburger" aria-label="menu-toggle">
            </a>
            <a href="{{ url('/') }}" class="logo ml-lg-0">
                <img src="{{ asset('uploads/logo/' . App\Models\Company::select('logo')->first()->logo) }}" alt="logo" style="width: 90px;" height="45" />

            </a>
            <form method="GET" action="{{ route('search') }}"
                class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
                <div class="select-box">
                    <select id="category" name="category">
                        <option value="">All Categories</option>
                        @foreach (App\Models\Category::all() as $header_category)
                            <option value="{{ url($header_category->slug) }}"><a href="{{ url($header_category->slug) }}">{{ $header_category->name }}</a></option>
                        @endforeach
                    </select>
                </div>


                <input type="text" class="form-control" name="query" value="{{ request()->input('query') }}" id="search" placeholder="Search for products, categories, brands..."
                    required />
                <button class="btn btn-search" type="submit"><i class="w-icon-search"></i>
                </button>
            </form>


            
        </div>
        <div class="header-right ml-4">
            <div class="header-call d-xs-show d-lg-flex align-items-center">
                <a href="tel:#" class="w-icon-call"></a>
                <div class="call-info d-lg-show">
                    <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                        <a href="https://portotheme.com/cdn-cgi/l/email-protection#2c0f" class="text-capitalize">Live
                            Chat</a> or :
                    </h4>
                    <a href="tel:#" class="phone-number font-weight-bolder ls-50">{{ App\Models\Company::select('phone')->first()->phone }}</a>
                </div>
            </div>
            <a class="wishlist label-down link d-xs-show" href="{{ url('/wishlist') }}">
                <i class="w-icon-heart"></i>

                <span class="wishlist-label d-lg-show">
                    Wishlist
                    @if (Surfsidemedia\Shoppingcart\Facades\Cart::instance('wishlist')->content()->count() > 0)
                        ({{ Surfsidemedia\Shoppingcart\Facades\Cart::instance('wishlist')->content()->count() }})
                    @endif
                </span>
            </a>

            <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
                <div class="cart-overlay"></div>
                <a href="#" class="cart-toggle label-down link">
                    <i class="w-icon-cart">
                        @if (Surfsidemedia\Shoppingcart\Facades\Cart::instance('cart')->content()->count() > 0)
                            <span
                                class="cart-count">{{ Surfsidemedia\Shoppingcart\Facades\Cart::instance('cart')->content()->count() }}</span>
                        @endif
                    </i>
                    <span class="cart-label">Cart</span>
                </a>
                <div class="dropdown-box">
                    <div class="cart-header">
                        <span>Shopping Cart</span>
                        <a href="#" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
                    </div>
                    @if (Surfsidemedia\Shoppingcart\Facades\Cart::instance('cart')->content()->count() == 0)
                    <p>No cart available</p>
                    @else

                    <div class="products">

                        @foreach (Surfsidemedia\Shoppingcart\Facades\Cart::instance('cart')->content() as $item)
                            <div class="product product-cart">
                                <div class="product-detail">
                                    <a href="{{ url('/') }}" class="product-name">{{ $item->name }}</a>
                                    <div class="price-box">
                                        <span class="product-quantity">{{ $item->qty }}</span>
                                        <span class="product-price">{{ $item->price }}</span>
                                    </div>
                                </div>
                                <figure class="product-media">
                                    <a href="{{ url('/') }}">
                                        <img src="{{ asset('uploads/products/'.$item->options->image ?? 'default-image.jpg') }}"
                                            alt="product" height="84" width="94" />
                                    </a>
                                </figure>

                                <form action="{{ route('cart.remove', ['rowId' => $item->rowId]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-link btn-close" aria-label="button">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </form>
                            </div>
                        @endforeach

                    </div>

                    <div class="cart-total">
                        <label>Subtotal:</label>
                        <span class="price">{{ Surfsidemedia\Shoppingcart\Facades\Cart::instance('cart')->subtotal() }}</span>
                    </div>

                    <div class="cart-action">
                        <a href="{{ url('cart') }}" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                        <a href="{{ route('checkout') }}" class="btn btn-primary  btn-rounded">Checkout</a>
                    </div>
                    @endif
                </div>
                <!-- End of Dropdown Box -->
            </div>
        </div>
    </div>
</div>
