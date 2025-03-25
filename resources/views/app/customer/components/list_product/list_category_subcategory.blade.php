@extends('app.customer.master')
@section('customer')

<main class="main">
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb bb-no">
                <li><a href="#">Home</a></li>
                <li><a href="#">Shop</a></li>
                @if (!empty($getSubCategory))
                <li>{{ $getCategory->name }}</li>
                <li>{{ $getSubCategory->name }}</li>
                @else
                <li>{{ $getCategory->name }}</li>
                @endif



            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb-nav -->

    <div class="page-content mb-10">
        <div class="container">
            <!-- Start of Shop Content -->
            <div class="shop-content row gutter-lg">
                <!-- Start of Sidebar, Shop Sidebar -->
                <aside class="sidebar shop-sidebar sticky-sidebar-wrapper sidebar-fixed">
                    <!-- Start of Sidebar Overlay -->
                    <div class="sidebar-overlay"></div>
                    <a class="sidebar-close" href="#"><i class="close-icon"></i></a>

                    <!-- Start of Sidebar Content -->
                    <div class="sidebar-content scrollable">

                        {{-- <form id="FilterForm" action="" method="post">
                            {{ csrf_field() }}
                            <input type="text" name="sub_category_id" id="get_sub_category_id">
                            <input type="text" name="brand_id" id="get_brand_id">
                        </form> --}}









                        <!-- Start of Sticky Sidebar -->
                        <div class="sticky-sidebar">
                            <div class="filter-actions">
                                <label>Filter :</label>
                                <a href="#" class="btn btn-dark btn-link filter-clean">Clean All</a>
                            </div>
                            <!-- Start of Collapsible widget -->
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title"><span>All Categories</span></h3>
                                <ul class="widget-body filter-items search-ul">
                                    @foreach ($getSubCategoryFilter as $filter_category)
                                    <li class="d-flex">
                                        <input type="checkbox" value="{{ $filter_category->id }}" name="" id="" class="mr-1 changeCategory" style="cursor: pointer">
                                        <a href="{{ url($filter_category->category->slug.'/'.$filter_category->slug) }}">{{ $filter_category->name }} ({{ $filter_category->totalProduct() }})</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- End of Collapsible Widget -->

                            <!-- Start of Collapsible Widget -->
                            {{-- <div class="widget widget-collapsible">
                                <h3 class="widget-title"><span>Price</span></h3>
                                <div class="widget-body">
                                    <ul class="filter-items search-ul">
                                        <li><a href="#">$0.00 - $100.00</a></li>
                                        <li><a href="#">$100.00 - $200.00</a></li>
                                        <li><a href="#">$200.00 - $300.00</a></li>
                                        <li><a href="#">$300.00 - $500.00</a></li>
                                        <li><a href="#">$500.00+</a></li>
                                    </ul>
                                    <form class="price-range">
                                        <input type="number" name="min_price" class="min_price text-center"
                                            placeholder="$min"><span class="delimiter">-</span><input
                                            type="number" name="max_price" class="max_price text-center"
                                            placeholder="$max"><a href="#"
                                            class="btn btn-primary btn-rounded">Go</a>
                                    </form>
                                </div>
                            </div> --}}
                            <!-- End of Collapsible Widget -->

                            <!-- Start of Collapsible Widget -->
                            {{-- <div class="widget widget-collapsible">
                                <h3 class="widget-title"><span>Size</span></h3>
                                <ul class="widget-body filter-items item-check mt-1">
                                    <li><a href="#">Extra Large</a></li>
                                    <li><a href="#">Large</a></li>
                                    <li><a href="#">Medium</a></li>
                                    <li><a href="#">Small</a></li>
                                </ul>
                            </div> --}}
                            <!-- End of Collapsible Widget -->

                            <!-- Start of Collapsible Widget -->
                            <div class="widget widget-collapsible">
                                <h3 class="widget-title"><span>Brand</span></h3>
                                <ul class="widget-body filter-items  mt-1">
                                    @foreach ($getBrand as $brand)
                                    <li class="d-flex">
                                        <input type="checkbox" value="{{ $brand->id }}" name="" id="" class="mr-1 changeBrand" style="cursor: pointer">
                                        <a href="#">{{ $brand->name }}</a>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                            <!-- End of Collapsible Widget -->

                            <!-- Start of Collapsible Widget -->
                            {{-- <div class="widget widget-collapsible">
                                <h3 class="widget-title"><span>Color</span></h3>
                                <ul class="widget-body filter-items item-check">
                                    <li><a href="#">Black</a></li>
                                    <li><a href="#">Blue</a></li>
                                    <li><a href="#">Brown</a></li>
                                    <li><a href="#">Green</a></li>
                                    <li><a href="#">Grey</a></li>
                                    <li><a href="#">Orange</a></li>
                                    <li><a href="#">Yellow</a></li>
                                </ul>
                            </div> --}}
                            <!-- End of Collapsible Widget -->
                        </div>
                        <!-- End of Sidebar Content -->
                    </div>
                    <!-- End of Sidebar Content -->
                </aside>
                <!-- End of Shop Sidebar -->

                <!-- Start of Main Content -->
                <div class="main-content">
                    <!-- Start of Shop Banner -->
                    <div class="shop-default-banner shop-boxed-banner banner d-flex align-items-center mb-6 br-xs"
                        style="background-color: #336699;">
                        <div class="banner-content">
                            <h4 class="banner-subtitle font-weight-bold">   
                                @if (!empty($getSubCategory))
                               <div >
                               <p style="font-size: 30px;font-weight: 500; color: #fff;"> {{ $getCategory->name }} / {{ $getSubCategory->name }}</p>
                               </div>
                                @else
                                <h5 style="font-size: 30px;font-weight: 500;color: #fff;">{{ $getCategory->name }}</h5>
                                @endif
                            </h4>
                  
                            
                        </div>
                    </div>
                    <!-- End of Shop Banner -->

                    <nav class="toolbox sticky-toolbox sticky-content fix-top">
                        <div class="toolbox-left">
                            <a href="#" class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle
                                btn-icon-left d-block d-lg-none"><i
                                    class="w-icon-category"></i><span>Filters</span></a>
                            <div class="toolbox-item toolbox-sort select-box text-dark">
                                <label>Sort By :</label>
                                <select name="orderby" class="form-control">
                                    <option value="default" selected="selected">Default sorting</option>
                                    <option value="popularity">Sort by popularity</option>
                                    <option value="rating">Sort by average rating</option>
                                    <option value="date">Sort by latest</option>
                                    <option value="price-low">Sort by pric: low to high</option>
                                    <option value="price-high">Sort by price: high to low</option>
                                </select>
                            </div>
                        </div>
                        <div class="toolbox-right">
                            <div class="toolbox-item toolbox-show select-box">
                                <select name="count" class="form-control">
                                    <option value="9">Show 9</option>
                                    <option value="12" selected="selected">Show 12</option>
                                    <option value="24">Show 24</option>
                                    <option value="36">Show 36</option>
                                </select>
                            </div>
                            <div class="toolbox-item toolbox-layout">
                                <a href="shop-boxed-banner.html" class="icon-mode-grid btn-layout active">
                                    <i class="w-icon-grid"></i>
                                </a>
                                <a href="shop-list.html" class="icon-mode-list btn-layout">
                                    <i class="w-icon-list"></i>
                                </a>
                            </div>
                        </div>
                    </nav>
                    <div class="product-wrapper row cols-md-3 cols-sm-2 cols-2">


                    @foreach ($getProduct as $product)
                    <div class="product-wrap">
                        <div class="product text-center">
                            <figure class="product-media">
                                <a href="product-default.html">
                                    <img src="{{ asset('uploads/products/' . $product->image) }}" alt="Product"
                                        width="300" height="338" style="width: 300px; height: 290px;" />
                                    <img src="{{ asset('uploads/products/' . $product->image) }}" alt="Product"
                                        width="300" height="338" style="width: 300px; height: 290px;" />
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

                    {{-- <div class="toolbox toolbox-pagination justify-content-between">
                        <p class="showing-info mb-2 mb-sm-0">
                            Showing<span>1-12 of 60</span>Products
                        </p>
                        <ul class="pagination">
                            <li class="prev disabled">
                                <a href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                                    <i class="w-icon-long-arrow-left"></i>Prev
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2</a>
                            </li>
                            <li class="next">
                                <a href="#" aria-label="Next">
                                    Next<i class="w-icon-long-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div> --}}
                </div>
                <!-- End of Main Content -->
            </div>
            <!-- End of Shop Content -->
        </div>
    </div>
</main>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.changeCategory').change(function(){
        var ids = '';
        $('.changeCategory').each(function(){

            if(this.checked){
                var id = $(this).val();
                ids += id+',';
            }
        });
        $('#get_sub_category_id').val(ids);
        FilterForm()
    });

    $('.changeBrand').change(function(){
        var ids = '';
        $('.changeBrand').each(function(){

            if(this.checked){
                var id = $(this).val();
                ids += id+',';
            }
        });
        $('#get_brand_id').val(ids);
        FilterForm()
    });


    function FilterForm(){
        $.ajax({
            type : "POST",
            url : "{{ url('get_filter_product_ajax') }}",
            data : $('#FilterForm').serialize(),
            dataType : "json",
            success : function(data){

            },
            error : function(data){

            }
        })
    }
</script> --}}


@endsection

