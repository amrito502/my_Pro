@extends('app.customer.master')
@section('customer')
<main class="main cart">
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb shop-breadcrumb bb-no">
                <li class="active"><a href="cart.html">Shopping Cart</a></li>
                <li><a href="checkout.html">Checkout</a></li>
                <li><a href="order.html">Order Complete</a></li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of PageContent -->
    <div class="page-content">
        <div class="container">
            <div class="row gutter-lg mb-10">
                <div class="col-lg-8 pr-lg-4 mb-6">
                    <table class="shop-table cart-table">
                        <thead>
                            <tr>
                                <th class="product-name"><span>Product</span></th>
                                <th></th>
                                <th class="product-price"><span>Price</span></th>
                                <th class="product-quantity"><span>Quantity</span></th>
                                <th class="product-subtotal"><span>Subtotal</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <tr>
                                <td class="product-thumbnail">
                                    <div class="p-relative">
                                        <a href="{{ url('/') }}">
                                            <figure>
                                                <img src="{{ asset('uploads/products/'.$item->options->image ?? '') }}" alt="product" width="300" height="338">
                                            </figure>
                                        </a>
                                        <form action="{{ route('cart.remove', ['rowId' => $item->rowId]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-close"><i class="fas fa-times"></i></button>
                                        </form>
                                    </div>
                                </td>
                                <td class="product-name">
                                    <a href="{{ url('/') }}">
                                        {{ $item->name }}
                                    </a>
                                </td>
                                <td class="product-price"><span class="amount">{{ $item->price }}</span></td>
                                <td class="product-quantity">
                                    <div class="input-group">

                                        <input class="quantity form-control" type="number" min="1" max="100000" value="{{ $item->qty }}">

                                        <button class="quantity-plus w-icon-plus"></button>
                                        <button class="quantity-minus w-icon-minus"></button>

                                        {{-- <form action="{{ route('cart.increase', ['rowId' => $item->rowId]) }}"
                                            method="POST">
                                            @csrf
                                            <button class=" quantity-plus cart_qty_increase plus">+</button>
                                        </form>
                                        <form action="{{ route('cart.decrease', ['rowId' => $item->rowId]) }}"
                                            method="POST">
                                            @csrf
                                            <button class=" quantity-minus cart_qty_decrease">-</button>
                                        </form> --}}



                                    </div>
                                </td>
                                <td class="product-subtotal">
                                    <span class="amount">{{ $item->subtotal }}</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="cart-action mb-6">
                        <a href="#" class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i class="w-icon-long-arrow-left"></i>Continue Shopping</a>
                        <form action="{{ route('cart.destroy') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-rounded btn-default btn-clear" name="clear_cart" value="Clear Cart">Clear Cart</button>
                        </form>
                        <button type="submit" class="btn btn-rounded btn-update disabled" name="update_cart" value="Update Cart">Update Cart</button>
                    </div>

                    <form class="coupon" action="{{ Session::has('coupon') ? route('remove.coupon.code') : route('apply.coupon.code') }}" method="POST">
                        @csrf
                        @if (Session::has('coupon'))
                            @method('DELETE')
                            <h5 class="title coupon-title font-weight-bold text-uppercase">Coupon Discount</h5>
                            <input type="text" class="form-control mb-4" value="{{ Session::get('coupon')['code'] }} Applied!" readonly>
                            <button class="btn btn-dark btn-outline btn-rounded">Remove Coupon</button>
                        @else
                            <h5 class="title coupon-title font-weight-bold text-uppercase">Coupon Discount</h5>
                            <input type="text" class="form-control mb-4" name="coupon_code" placeholder="Enter coupon code here..." required />
                            <button class="btn btn-dark btn-outline btn-rounded">Apply Coupon</button>
                        @endif
                    </form>
                </div>

                <div class="col-lg-4 sticky-sidebar-wrapper">
                    <div class="sticky-sidebar">
                        <div class="cart-summary mb-4">
                            <h3 class="cart-title text-uppercase">Cart Totals</h3>
                            <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                <label class="ls-25">Subtotal</label>
                                <span>{{ Surfsidemedia\Shoppingcart\Facades\Cart::instance('cart')->subtotal() }}</span>
                            </div>

                            @if (Session::has('discounts'))
                                <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                    <label class="ls-25">Discount ({{ Session::get('coupon')['code'] }})</label>
                                    <span>{{ Session::get('discounts')['discount'] }}</span>
                                </div>

                                <div class="cart-subtotal d-flex align-items-center justify-content-between">
                                    <label class="ls-25">Subtotal After Discount</label>
                                    <span>{{ Session::get('discounts')['subtotal'] }}</span>
                                </div>
                            @endif

                            <hr class="divider">

                            <ul class="shipping-methods mb-2">
                                <li>
                                    <label class="shipping-title text-dark font-weight-bold">Shipping</label>
                                </li>
                                <li>
                                    <div class="custom-radio">
                                        <input type="radio" id="free-shipping" class="custom-control-input" name="shipping">
                                        <label for="free-shipping" class="custom-control-label color-dark">Free Shipping</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-radio">
                                        <input type="radio" id="local-pickup" class="custom-control-input" name="shipping">
                                        <label for="local-pickup" class="custom-control-label color-dark">Local Pickup</label>
                                    </div>
                                </li>
                            </ul>


                            <hr class="divider mb-6">
                            <div class="order-total d-flex justify-content-between align-items-center">
                                <label>Total</label>
                                <span class="ls-50">
                                    @if (Session::has('discounts'))
                                        {{ Session::get('discounts')['total'] }}
                                    @else
                                        {{ Surfsidemedia\Shoppingcart\Facades\Cart::instance('cart')->total() }}
                                    @endif
                                </span>
                            </div>
                            <a href="{{ route('checkout') }}" class="btn btn-block btn-dark btn-icon-right btn-rounded  btn-checkout">
                                Proceed to checkout<i class="w-icon-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of PageContent -->
</main>
@endsection

@section('scripts')
<script>
    $(".cart_qty_decrease").on("click", function(e) {
        e.preventDefault();
        $(this).closest('form').submit();
    });

    $(".cart_qty_increase").on("click", function() {
        $(this).closest('form').submit();
    });
</script>
@endsection
