
@extends('admin.master')
@section('admin')

<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <!-- Product Image -->
                        <div class="col-md-4">
                            <div class="text-center">
                                <img src="{{ asset('uploads/products/' . $product->image) }}" class="img-fluid" style="height: 270px;width: 270px;">
                            </div>
                        </div>

                        <!-- Product Details -->
                        <div class="col-md-8">
                            <h2>{{ $product->name }}</h2>
                            <p><strong>SKU:</strong> {{ $product->sku }}</p>
                            <p><strong>Barcode:</strong> {{ $product->barcode }}</p>
                            <p><strong>Slug:</strong> {{ $product->slug }}</p>

                            <p><strong>Current Price:</strong> ${{ number_format($product->current_price, 2) }}</p>
                            <p><strong>Discount Price:</strong> ${{ number_format($product->discount_price, 2) }}</p>

                            <p><strong>Quantity:</strong> {{ $product->quantity }}</p>
                            <p><strong>Weight:</strong> {{ $product->weight }} kg</p>

                            <!-- Sizes -->
                            <div>
                                <strong>Sizes:</strong>
                                @foreach ($product->sizes as $size)
                                    <span class="badge bg-primary">{{ $size->name }}</span>
                                @endforeach
                            </div>

                            <!-- Colors -->
                            <div class="mt-2">
                                <strong>Colors:</strong>
                                @foreach ($product->colors as $color)
                                    <span class="badge bg-success">{{ $color->name }}</span>
                                @endforeach
                            </div>

                            <!-- Stock Status -->
                            <p class="mt-2">
                                <strong>Stock:</strong>
                                <span class="badge bg-{{ $product->quantity > 0 ? 'success' : 'danger' }}">
                                    {{ $product->quantity > 0 ? 'In Stock' : 'Out of Stock' }}
                                </span>
                            </p>

                            <!-- Description -->
                            <p><strong>Description:</strong> {{ Str::limit($product->description, 150) }}</p>

                            <!-- Additional Info -->
                            <p><strong>Additional Info:</strong> {{ Str::limit($product->additional_info, 150) }}</p>

                            <!-- Category & Brand -->
                            <p><strong>Category:</strong> {{ $product->category->name ?? 'N/A' }}</p>
                            <p><strong>SubCategory:</strong> {{ $product->subCategory->name ?? 'N/A' }}</p>
                            <p><strong>Brand:</strong> {{ $product->brand->name ?? 'N/A' }}</p>

                            <!-- Actions -->
                            <div class="d-flex justify-content-between mt-3">
                                <a class="btn btn-sm btn-outline-primary" href="{{ route('products.edit', $product->id) }}">Edit</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Gallery (If Available) -->
            @if (!empty($product->product_gallery))
                <div class="card mb-4">
                    <div class="card-body">
                        <h5>Gallery</h5>
                        <div class="row">
                            @foreach (json_decode($product->product_gallery, true) as $image)
                                <div class="col-md-3">
                                    <img src="{{ asset($image) }}" class="img-fluid" style="height: 270px;width: 270px;padding: 10px;">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
