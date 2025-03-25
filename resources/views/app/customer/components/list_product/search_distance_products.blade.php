@extends('app.customer.master')
@section('customer')

<div class="container" style="margin-bottom: 50px;">
    <h3 class="my-4" style="margin-top: 77px;">Search Products by Distance</h3>

    <div class="row">
        <div class="col-md-4">
            <form action="{{ route('products.search') }}" method="GET">
                <label for="distance" style="font-size: 17px; margin-bottom: 20px;;">Select Distance (in km):</label>
                <select class="form-control" name="distance" id="distance" required>
                    <option value="">Select km</option>
                    <option value="10">10 km</option>
                    <option value="20">20 km</option>
                    <option value="50">50 km</option>
                    <option value="100">100 km</option>
                    <option value="150">150 km</option>
                    <option value="200">200 km</option>
                    <option value="250">250 km</option>
                    <option value="300">300 km</option>
                    <option value="350">350 km</option>
                    <option value="400">400 km</option>
                    <option value="500">500 km</option>
                </select>
                <br>
                <button class="btn w-100" style="background: #336699;color: #fff; margin-bottom: 20px;;" type="submit">Search</button>
            </form>
        </div>

        <div class="col-md-12">
            @if (isset($nearbyProducts))
                <h2 style="font-size: 16px;color: #336699;">Nearby Products (Within {{ $distance }} km):</h2>
             
                    <div class="row cols-xl-5 cols-md-4 cols-sm-3 cols-2">

                        @foreach ($nearbyProducts as $product)
                            <div class="product-wrap">
                                <div class="product text-center">
                                    <figure class="product-media">
                                        <a href="{{ route('product_details.page', ['id' => $product->id]) }}">
                                            <img src="{{ asset('uploads/products/' . $product->image) }}" alt="Product"
                                                width="300" height="338" style="height: 290px; width: 300px;" />
                                            <img src="{{ asset('uploads/products/' . $product->image) }}" alt="Product"
                                                width="300" height="338" style="height: 290px; width: 300px;" />
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
                                            <a href="{{ route('product_details.page', ['id' => $product->id]) }}" class="rating-reviews">(1 Reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">{{ $product->current_price }}</ins>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
        
                    </div>
             
            @endif
        </div>
    </div>
</div>


@endsection






