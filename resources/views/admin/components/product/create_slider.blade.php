@extends('admin.master')


@section('admin')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">Create Product Slider</div>
                <div class="card-body">
                    <form action="{{ route('product_sliders.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Product Selection -->
                        <div class="form-group mb-3">
                            <label for="product_id">Select Product</label>
                            <select name="product_id" id="product_id" class="form-control" required>
                                <option value="">Choose a product...</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group mb-3">
                            <label for="status">Background Image</label>
                            <input type="file" name="background_image" class="form-control mt-2">
                        </div>

                        <!-- Status -->
                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <!-- Slider Items (4 sliders required) -->
                        <h5 class="mb-3">Add 4 Slider Items</h5>
                        <div id="slider-items">
                            @for ($i = 0; $i < 4; $i++)
                                <div class="border p-3 mb-3">
                                    <h6>Slider {{ $i + 1 }}</h6>
                                    <div class="form-group mb-2">
                                        <label for="slider_items[{{ $i }}][image]">Image</label>
                                        <input type="file" name="slider_items[{{ $i }}][image]" class="form-control" required>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="slider_items[{{ $i }}][title_1]">Title 1</label>
                                        <input type="text" name="slider_items[{{ $i }}][title_1]" class="form-control" required>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="slider_items[{{ $i }}][title_2]">Title 2</label>
                                        <input type="text" name="slider_items[{{ $i }}][title_2]" class="form-control" required>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="slider_items[{{ $i }}][title_3]">Title 3</label>
                                        <input type="text" name="slider_items[{{ $i }}][title_3]" class="form-control" required>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="slider_items[{{ $i }}][link_4]">Link</label>
                                        <input type="url" name="slider_items[{{ $i }}][link_4]" class="form-control" required>
                                    </div>
                                </div>
                            @endfor
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100">Create Product Slider</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
