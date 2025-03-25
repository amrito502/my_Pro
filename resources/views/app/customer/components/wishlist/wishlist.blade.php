@extends('app.customer.master')
@section('customer')
 <!-- Start of Main -->
 <
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">Wishlist</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav mb-10">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="demo1.html">Home</a></li>
                <li>Wishlist</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of PageContent -->
    <div class="page-content">
        <div class="container">
            <h3 class="wishlist-title">My wishlist</h3>



            @if ($items->count() == 0)
            <p>No wishlist available</p>
            @else

            <table class="table table-bordered" style="margin: 100px 0">
                <thead>
                    <tr>
                        <th>SL.</th>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>SubTotal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>



                    @forelse ($items as $key=>$item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <img style="width: 100px;height: 100px;border-radius: 6px;"
                            src="{{ asset('uploads/products/'.$item->options->image ?? 'default-image.jpg') }}"
                            alt="product">
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ $item->subtotal }}</td>
                        <td>
                            <div class="d-lg-flex">

                                <form action="{{ route('wishlist.move_to_cart',['rowId'=>$item->rowId]) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-dark btn-rounded btn-sm ml-lg-2 btn-cart" type="submit">
                                        Add to cart
                                    </button>
                                </form>


                                    <form action="{{ route('wishlist.remove',['rowId'=>$item->rowId]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-rounded btn-sm ml-lg-2 btn-cart">Delete Item</button>
                                    </form>
                            </div>
                        </td>
                    </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>



                <form class="" style="margin: 10px 0 100px;" action="{{ route('wishlist.destroy') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-rounded btn-sm ml-lg-2 btn-cart" type="submit">Clear All</button>
                </form>

        @endif




            <div class="social-links">
                <label>Share On:</label>
                <div class="social-icons social-no-color border-thin">
                    <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                    <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                    <a href="#" class="social-icon social-pinterest w-icon-pinterest"></a>
                    <a href="#" class="social-icon social-email far fa-envelope"></a>
                    <a href="#" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                </div>
            </div>
        </div>
    </div>
    <!-- End of PageContent -->

<!-- End of Main -->
@endsection

