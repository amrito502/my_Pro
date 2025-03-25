@extends('admin.master')

@section('admin')
    <div class="container">
        <h1 class="mb-4">Edit Product</h1>

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Product edit form -->
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <!-- Left Column -->
                        <div class="col-md-8">
                            <!-- Product Details Card -->
                            <div class="card">
                                <div class="card-body p-5">
                                    <div class="mb-5">
                                        <h2 class="mb-0 fs-exact-18">Product Details</h2>
                                    </div>
                                    <div class="mb-4">
                                        <label for="name" class="form-label">Product Name</label>
                                        <input type="text" name="name" placeholder="Name" class="form-control" id="name" value="{{ old('name', $product->name) }}" required />
                                    </div>

                                    <div class="mb-4">
                                        <label for="tag_title" class="form-label">Product Tag Title</label>
                                        <input type="text" name="tag_title" placeholder="Product Tag" class="form-control" id="tag_title" value="{{ old('tag_title', $product->tag_title) }}" />
                                    </div>

                                    <div class="mb-4">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea id="description" placeholder="Description" name="description" class="form-control" rows="2">{{ old('description', $product->description) }}</textarea>
                                    </div>

                                    <div class="mb-4">
                                        <label for="additional_info" class="form-label">Additional Information</label>
                                        <textarea id="additional_info" placeholder="Additional information" name="additional_info" class="form-control" rows="2">{{ old('additional_info', $product->additional_info) }}</textarea>
                                    </div>

                                    <div class="mb-4">
                                        <label for="return_policy" class="form-label">Return Policy</label>
                                        <textarea id="return_policy" placeholder="Return policy" name="return_policy" class="form-control" rows="2">{{ old('return_policy', $product->return_policy) }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Pricing Card -->
                            <div class="card mt-4">
                                <div class="card-body p-5">
                                    <div class="mb-5">
                                        <h2 class="mb-0 fs-exact-18">Pricing</h2>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 col-sm-12">
                                            <div class="form-group mb-4">
                                                <label for="current_price" class="form-label">Current Price</label>
                                                <input type="number" name="current_price" placeholder="Regular price" class="form-control" id="regular_price" value="{{ old('current_price', $product->current_price) }}" required />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="discount_price" class="form-label">Discount Price</label>
                                                <input type="number" name="discount_price" placeholder="Special price" class="form-control" id="special_price" value="{{ old('discount_price', $product->discount_price) }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Quantity and Weight Card -->
                            <div class="card mt-4">
                                <div class="card-body p-5">
                                    <div class="mb-5">
                                        <h2 class="mb-0 fs-exact-18">Quantity and Weight</h2>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="sku" class="form-label">SKU</label>
                                        <input type="text" name="sku" readonly placeholder="SKU" class="form-control" id="sku" value="{{ old('sku', $product->sku) }}" />
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="barcode" class="form-label">Barcode</label>
                                        <input type="text" name="barcode" readonly placeholder="Barcode" class="form-control" id="barcode" value="{{ old('barcode', $product->barcode) }}" />
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="number" name="quantity" placeholder="Quantity" class="form-control" id="quantity" value="{{ old('quantity', $product->quantity) }}" required />
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="weight" class="form-label">Weight (KG)</label>
                                        <input type="number" name="weight" placeholder="Weight" class="form-control" id="weight" value="{{ old('weight', $product->weight) }}" />
                                    </div>
                                </div>
                            </div>

                            <!-- Image and Video Card -->
                            <div class="card mt-4">
                                <div class="card-body p-5">
                                    <div class="mb-5">
                                        <h2 class="mb-0 fs-exact-18">Image and Video</h2>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="form-label mb-3" for="image">Product Image</label>
                                        <input type="file" name="image" class="form-control">
                                        @if ($product->image)
                                            <img src="{{ asset('uploads/products/' . $product->image) }}" alt="Product Image" class="img-thumbnail mt-2" style="height: 90px;width: 90px;">
                                        @endif
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="form-label mb-3" for="product_gallery">Product Gallery</label>
                                        <input type="file" name="product_gallery[]" multiple class="form-control">
                                        @if ($product->product_gallery)
                                            <div class="mt-2">
                                                @foreach (json_decode($product->product_gallery) as $image)
                                                    <img src="{{ asset($image) }}" alt="Gallery Image" class="img-thumbnail" style="height: 90px;width: 90px;">
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="form-label mb-3" for="video">Video URL</label>
                                        <input type="url" name="video" class="form-control" placeholder="Enter video URL" value="{{ old('video', $product->video) }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-md-4">
                            <!-- Location and Category Card -->
                            <div class="card mb-4">
                                <div class="card-body p-5">
                                    <div class="mb-5">
                                        <h2 class="mb-0 fs-exact-18">Location and Category</h2>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="division" class="form-label">Division</label>
                                        <select id="division" name="division" required class="form-control sa-select2 form-select">
                                            <option value="">-- Select Division --</option>
                                            <option value="ঢাকা" {{ old('division', $product->division) == 'ঢাকা' ? 'selected' : '' }}>ঢাকা</option>
                                            <option value="চট্টগ্রাম" {{ old('division', $product->division) == 'চট্টগ্রাম' ? 'selected' : '' }}>চট্টগ্রাম</option>
                                            <option value="রাজশাহী" {{ old('division', $product->division) == 'রাজশাহী' ? 'selected' : '' }}>রাজশাহী</option>
                                            <option value="খুলনা" {{ old('division', $product->division) == 'খুলনা' ? 'selected' : '' }}>খুলনা</option>
                                            <option value="বরিশাল" {{ old('division', $product->division) == 'বরিশাল' ? 'selected' : '' }}>বরিশাল</option>
                                            <option value="সিলেট" {{ old('division', $product->division) == 'সিলেট' ? 'selected' : '' }}>সিলেট</option>
                                            <option value="রংপুর" {{ old('division', $product->division) == 'রংপুর' ? 'selected' : '' }}>রংপুর</option>
                                            <option value="ময়মনসিংহ" {{ old('division', $product->division) == 'ময়মনসিংহ' ? 'selected' : '' }}>ময়মনসিংহ</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="district_id" class="form-label">District</label>
                                        <select name="district_id" id="district_id" class="form-select">
                                            <option value="">Select District</option>
                                            @foreach ($districts as $district)
                                                <option value="{{ $district->id }}" {{ old('district_id', $product->district_id) == $district->id ? 'selected' : '' }}>{{ $district->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="sub_district_id" class="form-label">Sub District</label>
                                        <select name="sub_district_id" id="sub_district_id" class="form-select">
                                            <option value="">Select Sub District</option>
                                            @foreach ($subDistricts as $subDistrict)
                                                <option value="{{ $subDistrict->id }}" {{ old('sub_district_id', $product->sub_district_id) == $subDistrict->id ? 'selected' : '' }}>{{ $subDistrict->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="section_id" class="form-label">Section</label>
                                        <select name="section_id" id="section_id" class="form-select">
                                            <option value="">Select Section</option>
                                            @foreach ($sections as $section)
                                                <option value="{{ $section->id }}" {{ old('section_id', $product->section_id) == $section->id ? 'selected' : '' }}>{{ $section->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="category_id" class="form-label">Category</label>
                                        <select name="category_id" id="category_id" class="form-select">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="sub_category_id" class="form-label">Sub Category</label>
                                        <select name="sub_category_id" id="sub_category_id" class="form-select">
                                            <option value="">Select Sub Category</option>
                                            @foreach ($subCategories as $subCategory)
                                                <option value="{{ $subCategory->id }}" {{ old('sub_category_id', $product->sub_category_id) == $subCategory->id ? 'selected' : '' }}>{{ $subCategory->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="brand_id" class="form-label">Brand</label>
                                        <select name="brand_id" class="form-select">
                                            <option value="">Select Brand</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}" {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Attributes Card -->
                            <div class="card mb-4">
                                <div class="card-body p-5">
                                    <div class="mb-5">
                                        <h2 class="mb-0 fs-exact-18">Product Attributes</h2>
                                    </div>
                                    <div class="mb-4">
                                        <div class="form-group">
                                            <label for="size" class="form-label">Product Size</label>
                                            <select name="size_id[]" multiple="multiple" id="size" class="form-control sa-select2 form-select form-select-lg">
                                                <option value="">-- Select Size --</option>
                                                @foreach ($product->sizes as $size)
                                                    <option value="{{ $size->id }}" 
                                                        {{ in_array($size->id, json_decode($product->size_id) ?? []) ? 'selected' : '' }}>
                                                        {{ $size->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <div class="form-group">
                                            <label for="color" class="form-label">Product Color</label>
                                            <select name="color_id[]" multiple="multiple" id="color" class="form-control sa-select2 form-select form-select-lg">
                                                <option value="">-- Select Color --</option>
                                                @foreach ($product->colors as $color_item)
                                                <option value="{{ $color_item->id }}" 
                                                    {{ in_array($color_item->id, json_decode($product->color_id) ?? []) ? 'selected' : '' }}>
                                                    {{ $color_item->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Status Card -->
                            <div class="card mb-4">
                                <div class="card-body p-5">
                                    <div class="mb-5">
                                        <h2 class="mb-0 fs-exact-18">Status</h2>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="mb-3 fs-exact-18" for="is_featured">Is Featured?</label>
                                        <select name="is_featured" class="form-control">
                                            <option value="">-- Featured Status --</option>
                                            <option value="0" {{ old('is_featured', $product->is_featured) == 0 ? 'selected' : '' }}>No</option>
                                            <option value="1" {{ old('is_featured', $product->is_featured) == 1 ? 'selected' : '' }}>Yes</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="mb-3 fs-exact-18" for="stock_status">Stock Status</label>
                                        <select name="stock_status" class="form-control">
                                            <option value="">-- Stock Status --</option>
                                            <option value="in_stock" {{ old('stock_status', $product->stock_status) == 'in_stock' ? 'selected' : '' }}>In Stock</option>
                                            <option value="out_of_stock" {{ old('stock_status', $product->stock_status) == 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
                                            <option value="pre_order" {{ old('stock_status', $product->stock_status) == 'pre_order' ? 'selected' : '' }}>Pre Order</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="mb-3 fs-exact-18" for="remark">Remark</label>
                                        <select name="remark" class="form-control">
                                            <option value="">-- Remark --</option>
                                            <option value="popular" {{ old('remark', $product->remark) == 'popular' ? 'selected' : '' }}>Popular</option>
                                            <option value="new" {{ old('remark', $product->remark) == 'new' ? 'selected' : '' }}>New</option>
                                            <option value="top" {{ old('remark', $product->remark) == 'top' ? 'selected' : '' }}>Top</option>
                                            <option value="special" {{ old('remark', $product->remark) == 'special' ? 'selected' : '' }}>Special</option>
                                            <option value="trending" {{ old('remark', $product->remark) == 'trending' ? 'selected' : '' }}>Trending</option>
                                            <option value="regular" {{ old('remark', $product->remark) == 'regular' ? 'selected' : '' }}>Regular</option>
                                            <option value="best_seller" {{ old('remark', $product->remark) == 'best_seller' ? 'selected' : '' }}>Best Seller</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="mb-3 fs-exact-18" for="status">Approval Status</label>
                                        <select name="status" class="form-control">
                                            <option value="">-- Approval Status --</option>
                                            <option value="pending" {{ old('status', $product->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="approved" {{ old('status', $product->status) == 'approved' ? 'selected' : '' }}>Approved</option>
                                            <option value="rejected" {{ old('status', $product->status) == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- SEO Card -->
                            <div class="card">
                                <div class="card-body p-5">
                                    <div class="mb-5">
                                        <h2 class="mb-0 fs-exact-18">Search Engine Optimization</h2>
                                    </div>
                                    <div class="mb-4">
                                        <label for="meta_title" class="form-label">Page Title</label>
                                        <input type="text" name="meta_title" placeholder="Meta Title" class="form-control" id="meta_title" value="{{ old('meta_title', $product->meta_title) }}" />
                                    </div>
                                    <div>
                                        <label for="meta_description" class="form-label">Meta Description</label>
                                        <textarea id="meta_description" placeholder="Meta Description" name="meta_description" class="form-control" rows="2">{{ old('meta_description', $product->meta_description) }}</textarea>
                                    </div>
                                    <div>
                                        <label for="meta_keyword" class="form-label">Meta Keyword</label>
                                        <textarea id="meta_keyword" placeholder="Meta Keyword" name="meta_keyword" class="form-control" rows="2">{{ old('meta_keyword', $product->meta_keyword) }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Submission Buttons -->
            <div class="row" style="margin-bottom: 400px;">
                <div class="col-xl-12 mt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('products.index') }}" class="btn btn-secondary ml-2">Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Load sub-districts based on selected district
            document.getElementById("district_id").addEventListener("change", function() {
                var district_id = this.value;
                var subDistrictSelect = document.getElementById("sub_district_id");

                subDistrictSelect.innerHTML = '<option value="">Loading...</option>';

                if (district_id) {
                    axios.get('{{ route('get.subdistricts') }}', {
                            params: {
                                district_id: district_id
                            }
                        })
                        .then(function(response) {
                            subDistrictSelect.innerHTML = '<option value="">Select Sub District</option>';
                            response.data.forEach(function(subDistrict) {
                                var option = document.createElement("option");
                                option.value = subDistrict.id;
                                option.textContent = subDistrict.name;
                                subDistrictSelect.appendChild(option);
                            });
                        })
                        .catch(function(error) {
                            console.log(error);
                        });
                } else {
                    subDistrictSelect.innerHTML = '<option value="">Select Sub District</option>';
                }
            });

            // Load sub-categories based on selected category
            document.getElementById("category_id").addEventListener("change", function() {
                var category_id = this.value;
                var subCategorySelect = document.getElementById("sub_category_id");

                subCategorySelect.innerHTML = '<option value="">Loading...</option>';

                if (category_id) {
                    axios.get('{{ route('get.subcategories') }}', {
                            params: {
                                category_id: category_id
                            }
                        })
                        .then(function(response) {
                            subCategorySelect.innerHTML = '<option value="">Select Sub Category</option>';
                            response.data.forEach(function(subCategory) {
                                var option = document.createElement("option");
                                option.value = subCategory.id;
                                option.textContent = subCategory.name;
                                subCategorySelect.appendChild(option);
                            });
                        })
                        .catch(function(error) {
                            console.log(error);
                        });
                } else {
                    subCategorySelect.innerHTML = '<option value="">Select Sub Category</option>';
                }
            });
        });
    </script>
@endsection