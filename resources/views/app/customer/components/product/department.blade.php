<div class="container">
    <h2 class="title justify-content-center ls-normal mb-4 mt-10 pt-1 appear-animate">Popular Departments
    </h2>
    <div class="tab tab-nav-boxed tab-nav-outline appear-animate">
        <ul class="nav nav-tabs justify-content-center" role="tablist">
            <li class="nav-item mr-2 mb-2">
                <a class="nav-link active br-sm font-size-md ls-normal" href="#tab1-1">New arrivals</a>
            </li>
            <li class="nav-item mr-2 mb-2">
                <a class="nav-link br-sm font-size-md ls-normal" href="#tab1-2">Best seller</a>
            </li>
            <li class="nav-item mr-2 mb-2">
                <a class="nav-link br-sm font-size-md ls-normal" href="#tab1-3">most popular</a>
            </li>
            <li class="nav-item mr-0 mb-2">
                <a class="nav-link br-sm font-size-md ls-normal" href="#tab1-4">Featured</a>
            </li>
        </ul>
    </div>
    <!-- End of Tab -->
    <div class="tab-content product-wrapper appear-animate">
        <div class="tab-pane active pt-4" id="tab1-1">
            <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">

                @foreach (App\Models\Product::where(['status' => 'approved', 'remark' => 'new'])->get() as $product)
                    <div class="product-wrap">
                        <div class="product text-center">
                            <figure class="product-media">
                                <a href="product-default.html">
                                    <img src="{{ asset('uploads/products/' . $product->image) }}" alt="Product"
                                        width="300" height="338" />
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



        <!-- End of Tab Pane -->
        <div class="tab-pane pt-4" id="tab1-2">
            <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
                <div class="product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo1/products/3-4-1.jpg" alt="Product" width="300"
                                    height="338" />
                                <img src="assets/images/demos/demo1/products/3-4-2.jpg" alt="Product" width="300"
                                    height="338" />
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Fashion Blue Towel</a>
                            </h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 100%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(8 reviews)</a>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$26.55 - $29.99</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo1/products/3-3.jpg" alt="Product" width="300"
                                    height="338" />
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                            <div class="product-label-group">
                                <label class="product-label label-discount">7% Off</label>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Multi Funtional Apple
                                    iPhone</a></h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 100%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(5 reviews)</a>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">136.26</ins>
                                <del class="old-price">$145.90</del>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo1/products/3-8-1.jpg" alt="Product" width="300"
                                    height="338" />
                                <img src="assets/images/demos/demo1/products/3-8-2.jpg" alt="Product" width="300"
                                    height="338" />
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Comfortable Backpack</a>
                            </h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 100%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(6 reviews)</a>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$45.90</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo1/products/3-9.jpg" alt="Product" width="300"
                                    height="338" />
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Data Transformer Tool
                                </a></h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 60%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                            </div>
                            <div class="product-price">
                                <span class="price">$64.47</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo1/products/3-5.jpg" alt="Product" width="300"
                                    height="338" />
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                            <div class="product-label-group">
                                <label class="product-label label-discount">4% Off</label>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Apple Super Notecom</a>
                            </h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 100%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(4 reviews)</a>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$243.30</ins>
                                <del class="old-price">$253.50</del>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo1/products/3-6-1.jpg" alt="Product" width="300"
                                    height="338" />
                                <img src="assets/images/demos/demo1/products/3-6-2.jpg" alt="Product" width="300"
                                    height="338" />
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Women’s Comforter</a>
                            </h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 100%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(10 reviews)</a>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$32.00 - $33.26</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo1/products/3-7.jpg" alt="Product" width="300"
                                    height="338" />
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Multi-colorful Music</a>
                            </h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 60%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$260.59 - $297.83</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo1/products/3-1-1.jpg" alt="Product" width="300"
                                    height="338" />
                                <img src="assets/images/demos/demo1/products/3-1-2.jpg" alt="Product" width="300"
                                    height="338" />
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Classic Hat</a></h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 60%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(1 Reviews)</a>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$53.00</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo1/products/3-2.jpg" alt="Product" width="300"
                                    height="338" />
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Women’s White
                                    Handbag</a></h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 80%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$26.62</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo1/products/3-10.jpg" alt="Product" width="300"
                                    height="338" />
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Women’s hairdye</a></h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 60%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                            </div>
                            <div class="product-price">
                                <span class="price">$173.84</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- End of Tab Pane -->
        <div class="tab-pane pt-4" id="tab1-3">
            <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
                <div class="product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo1/products/3-9.jpg" alt="Product" width="300"
                                    height="338" />
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Data Transformer Tool
                                </a></h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 60%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                            </div>
                            <div class="product-price">
                                <span class="price">$64.47</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo1/products/3-1-1.jpg" alt="Product" width="300"
                                    height="338" />
                                <img src="assets/images/demos/demo1/products/3-1-2.jpg" alt="Product" width="300"
                                    height="338" />
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Classic Hat</a></h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 60%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(1 Reviews)</a>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$53.00</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo1/products/3-3.jpg" alt="Product" width="300"
                                    height="338" />
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                            <div class="product-label-group">
                                <label class="product-label label-discount">7% Off</label>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Multi Funtional Apple
                                    iPhone</a></h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 100%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(5 reviews)</a>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">136.26</ins>
                                <del class="old-price">$145.90</del>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo1/products/3-2.jpg" alt="Product" width="300"
                                    height="338" />
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Women’s White
                                    Handbag</a></h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 80%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$26.62</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo1/products/3-10.jpg" alt="Product" width="300"
                                    height="338" />
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Women’s hairdye</a></h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 60%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                            </div>
                            <div class="product-price">
                                <span class="price">$173.84</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo1/products/3-8-1.jpg" alt="Product" width="300"
                                    height="338" />
                                <img src="assets/images/demos/demo1/products/3-8-2.jpg" alt="Product" width="300"
                                    height="338" />
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Comfortable Backpack</a>
                            </h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 100%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(6 reviews)</a>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$45.90</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo1/products/3-5.jpg" alt="Product" width="300"
                                    height="338" />
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                            <div class="product-label-group">
                                <label class="product-label label-discount">4% Off</label>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Apple Super Notecom</a>
                            </h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 100%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(4 reviews)</a>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$243.30</ins>
                                <del class="old-price">$253.50</del>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo1/products/3-7.jpg" alt="Product" width="300"
                                    height="338" />
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Multi-colorful Music</a>
                            </h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 60%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$260.59 - $297.83</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo1/products/3-6-1.jpg" alt="Product" width="300"
                                    height="338" />
                                <img src="assets/images/demos/demo1/products/3-6-2.jpg" alt="Product" width="300"
                                    height="338" />
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Women’s Comforter</a>
                            </h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 100%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(10 reviews)</a>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$32.00 - $33.26</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo1/products/3-4-1.jpg" alt="Product" width="300"
                                    height="338" />
                                <img src="assets/images/demos/demo1/products/3-4-2.jpg" alt="Product" width="300"
                                    height="338" />
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Fashion Blue Towel</a>
                            </h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 100%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(8 reviews)</a>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$26.55 - $29.99</ins>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- End of Tab Pane -->
        <div class="tab-pane pt-4" id="tab1-4">
            <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">
                <div class="product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo1/products/3-4-1.jpg" alt="Product" width="300"
                                    height="338" />
                                <img src="assets/images/demos/demo1/products/3-4-2.jpg" alt="Product" width="300"
                                    height="338" />
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Fashion Blue Towel</a>
                            </h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 100%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(8 reviews)</a>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$26.55 - $29.99</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo1/products/3-10.jpg" alt="Product" width="300"
                                    height="338" />
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Women’s hairdye</a></h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 60%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                            </div>
                            <div class="product-price">
                                <span class="price">$173.84</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo1/products/3-9.jpg" alt="Product" width="300"
                                    height="338" />
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Data Transformer Tool
                                </a></h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 60%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                            </div>
                            <div class="product-price">
                                <span class="price">$64.47</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo1/products/3-8-1.jpg" alt="Product" width="300"
                                    height="338" />
                                <img src="assets/images/demos/demo1/products/3-8-2.jpg" alt="Product" width="300"
                                    height="338" />
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Comfortable Backpack</a>
                            </h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 100%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(6 reviews)</a>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$45.90</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo1/products/3-2.jpg" alt="Product" width="300"
                                    height="338" />
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Women’s White
                                    Handbag</a></h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 80%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$26.62</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo1/products/3-5.jpg" alt="Product" width="300"
                                    height="338" />
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                            <div class="product-label-group">
                                <label class="product-label label-discount">4% Off</label>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Apple Super Notecom</a>
                            </h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 100%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(4 reviews)</a>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$243.30</ins>
                                <del class="old-price">$253.50</del>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo1/products/3-3.jpg" alt="Product"
                                    width="300" height="338" />
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                            <div class="product-label-group">
                                <label class="product-label label-discount">7% Off</label>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Multi Funtional Apple
                                    iPhone</a></h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 100%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(5 reviews)</a>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">136.26</ins>
                                <del class="old-price">$145.90</del>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo1/products/3-7.jpg" alt="Product"
                                    width="300" height="338" />
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Multi-colorful Music</a>
                            </h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 60%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$260.59 - $297.83</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo1/products/3-6-1.jpg" alt="Product"
                                    width="300" height="338" />
                                <img src="assets/images/demos/demo1/products/3-6-2.jpg" alt="Product"
                                    width="300" height="338" />
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Women’s Comforter</a>
                            </h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 100%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(10 reviews)</a>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$32.00 - $33.26</ins>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-wrap">
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/demos/demo1/products/3-1-1.jpg" alt="Product"
                                    width="300" height="338" />
                                <img src="assets/images/demos/demo1/products/3-1-2.jpg" alt="Product"
                                    width="300" height="338" />
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                    title="Add to wishlist"></a>
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quickview"></a>
                                <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                    title="Add to Compare"></a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <h4 class="product-name"><a href="product-default.html">Classic Hat</a></h4>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 60%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="product-default.html" class="rating-reviews">(1 Reviews)</a>
                            </div>
                            <div class="product-price">
                                <ins class="new-price">$53.00</ins>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Tab Pane -->
    </div>
    <!-- End of Tab Content -->


    @include('app.customer.components.product.section_product')
    @include('app.customer.components.blog.blog')

</div>
