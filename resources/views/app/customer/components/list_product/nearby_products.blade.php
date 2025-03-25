@extends('app.customer.master')
@section('customer')




<div class="container">
    <h2 style="margin: 47px 0;padding-bottom: 10px;border-bottom: 1px solid #e9e2e2;color: #336699;font-size: 18px;font-weight: 100;">Search Results for Nearby Products</h2>

  
       
        <div class="search-results">
       
                <h3>Products</h3>
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
    
                                        {{-- <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a> --}}
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
                   
        
        </div>
 
</div>

@endsection