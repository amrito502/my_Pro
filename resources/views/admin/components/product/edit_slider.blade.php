@extends('admin.master')

@section('admin')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">Edit Product Slider</div>
                <div class="card-body">
                    <form action="{{ route('product_sliders.update', $productSlider->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Product Selection -->
                        <div class="form-group mb-3">
                            <label for="product_id">Select Product</label>
                            <select name="product_id" id="product_id" class="form-control" required>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}" {{ $product->id == $productSlider->product_id ? 'selected' : '' }}>
                                        {{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="status">Background Image</label>
                            <input type="file" name="background_image" class="form-control mt-2">
                            <img style="width: 100px;" src="{{ asset('uploads/background_image/'.$productSlider->background_image) }}" alt="">
                        </div>

                        <!-- Status -->
                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="active" {{ $productSlider->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $productSlider->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <!-- Slider Items -->
                        <h5 class="mb-3">Edit 4 Slider Items</h5>
                        <div id="slider-items">
                            @foreach ($productSlider->sliderItems as $index => $item)
                                <div class="border p-3 mb-3">
                                    <h6>Slider {{ $index + 1 }}</h6>
                                    <div class="form-group mb-2">
                                        <label>Current Image</label>
                                        <br>
                                        <img src="{{ asset( $item->image) }}" width="80" height="50" class="rounded">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="slider_items[{{ $index }}][image]">Change Image</label>
                                        <input type="file" name="slider_items[{{ $index }}][image]" class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="slider_items[{{ $index }}][title_1]">Title 1</label>
                                        <input type="text" name="slider_items[{{ $index }}][title_1]" class="form-control" value="{{ $item->title_1 }}" required>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="slider_items[{{ $index }}][title_2]">Title 2</label>
                                        <input type="text" name="slider_items[{{ $index }}][title_2]" class="form-control" value="{{ $item->title_2 }}" required>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="slider_items[{{ $index }}][title_3]">Title 3</label>
                                        <input type="text" name="slider_items[{{ $index }}][title_3]" class="form-control" value="{{ $item->title_3 }}" required>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="slider_items[{{ $index }}][link_4]">Link</label>
                                        <input type="url" name="slider_items[{{ $index }}][link_4]" class="form-control" value="{{ $item->link_4 }}" required>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100">Update Product Slider</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
