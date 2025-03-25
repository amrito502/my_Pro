@extends('seller.master')

@section('seller')
    <div class="container">
        <h1 class="mb-4">Create Product</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('sellerproducts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md12">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body p-5">
                                    <div class="mb-5">
                                        <h2 class="mb-0 fs-exact-18">left card-heading</h2>
                                    </div>
                                    <div class="mb-4">
                                        <label for="name" class="form-label">Product Name</label>
                                        <input type="text" name="name" placeholder="Name" class="form-control"
                                            id="name" />
                                    </div>

                                    <div class="mb-4">
                                        <label for="tag_title" class="form-label">Product Tag Title</label>
                                        <input type="text" name="tag_title" placeholder="Product Tag"
                                            class="form-control" id="tag_title" />
                                    </div>


                                    <div class="mb-4">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea id="description" placeholder="Description" name="description" class="form-control" rows="2"></textarea>
                                    </div>

                                    <div class="mb-4">
                                        <label for="additional_info" class="form-label">Additional information</label>
                                        <textarea id="additional_info" placeholder="Additional information" name="additional_info" class="form-control"
                                            rows="2"></textarea>
                                    </div>

                                    <div class="mb-4">
                                        <label for="return_policy" class="form-label">Return policy</label>
                                        <textarea id="return_policy" placeholder="Return policy" name="return_policy" class="form-control" rows="2"></textarea>
                                    </div>

                                </div>
                            </div>

                            <div class="card mt-4">
                                <div class="card-body p-5">
                                    <div class="mb-5">
                                        <h2 class="mb-0 fs-exact-18">Price</h2>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-6 col-md-6 col-sm-12">
                                            <div class="form-group mb-4">
                                                <label for="current_price" class="form-label">Current Price</label>
                                                <input type="number" name="current_price" placeholder="Regular price" class="form-control"
                                                    id="regular_price" />
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="discount_price" class="form-label">Discount Price</label>
                                                <input type="number" name="discount_price" placeholder="Special price" class="form-control"
                                                    id="special_price" />
                                            </div>
                                        </div>
                                    </div>


                                    <div class="mb-4">

                                    </div>

                                </div>
                            </div>


                            <div class="card mt-4">
                                <div class="card-body p-5">
                                    <div class="mb-5">
                                        <h2 class="mb-0 fs-exact-18">Quantity</h2>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="sku" class="form-label">SKU</label>
                                        <input type="text" name="sku" readonly placeholder="SKU" class="form-control"
                                            id="sku" />
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="barcode" class="form-label">Barcode</label>
                                        <input type="text" name="barcode" readonly placeholder="Barcode" class="form-control"
                                            id="barcode" />
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="quantity" class="form-label">Quantity</label>
                                        <input type="number" name="quantity" placeholder="Quantity" class="form-control"
                                            id="quantity" />
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="weight" class="form-label">Weight-(KG)</label>
                                        <input type="number" name="weight" placeholder="Weight" class="form-control"
                                            id="weight" />
                                    </div>


                                </div>
                            </div>


                            <div class="card mt-4">
                                <div class="card-body p-5">
                                    <div class="mb-5">
                                        <h2 class="mb-0 fs-exact-18">Image and Video</h2>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="form-label mb-3"  for="image">Product Image</label>
                                        <input type="file" required name="image" class="form-control">
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="form-label mb-3"  for="product_gallery">Product Gallery</label>
                                        <input type="file" required name="product_gallery[]" multiple class="form-control">
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="form-label mb-3" for="video">Video URL</label>
                                        <input type="url" name="video" class="form-control" placeholder="Enter video URL">
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="col-md-4">


                            <div class="card mb-4">
                                <div class="card-body p-5">
                                    <div class="mb-5">
                                        <h2 class="mb-0 fs-exact-18">heding title</h2>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="division" class="form-label">বিভাগ নির্বাচন করুন</label>
                                        <select id="division" name="division" required
                                            class="form-control sa-select2 form-select">
                                            <option value="">-- বিভাগ নির্বাচন করুন --</option>
                                            <option value="ঢাকা">ঢাকা</option>
                                            <option value="চট্টগ্রাম">চট্টগ্রাম</option>
                                            <option value="রাজশাহী">রাজশাহী</option>
                                            <option value="খুলনা">খুলনা</option>
                                            <option value="বরিশাল">বরিশাল</option>
                                            <option value="সিলেট">সিলেট</option>
                                            <option value="রংপুর">রংপুর</option>
                                            <option value="ময়মনসিংহ">ময়মনসিংহ</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="district_id" class="form-label">District</label>
                                        <select name="district_id" id="district_id" class="form-select">
                                            <option value="">Select District</option>
                                            @foreach ($districts as $district)
                                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="sub_district_id" class="form-label">Sub District</label>
                                        <select name="sub_district_id" id="sub_district_id" class="form-select">
                                            <option value="">Select Sub District</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="section_id" class="form-label">Section</label>
                                        <select name="section_id" id="section_id" class="form-select">
                                            <option value="">Select Section</option>
                                            @foreach ($sections as $section)
                                                <option value="{{ $section->id }}">{{ $section->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="category_id" class="form-label">Category</label>
                                        <select name="category_id" id="category_id" class="form-select">
                                            <option value="">Select Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="sub_category_id" class="form-label">Sub Category</label>
                                        <select name="sub_category_id" id="sub_category_id" class="form-select">
                                            <option value="">Select Sub Category</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-4">
                                        <div class="col-md-12 mb-3">
                                            <label for="brand_id" class="form-label">Brand</label>
                                            <select name="brand_id" class="form-select">
                                                <option value="">Select Brand</option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>



                            <div class="card mb-4">
                                <div class="card-body p-5">
                                    <div class="mb-5">
                                        <h2 class="mb-0 fs-exact-18">Product Attrubite</h2>
                                    </div>
                                    <div class="mb-4">
                                       <div class="form-group">
                                        <label for="size" class="form-label">Product size</label>
                                        <select name="size_id[]" multiple="multiple" id="size" class="form-control sa-select2 form-select form-select-lg">
                                            <option value="">-- Select Size --</option>
                                            @foreach ($size as $size_item)
                                                <option value="{{ $size_item->id }}">{{ $size_item->name }}</option>
                                            @endforeach
                                        </select>
                                       </div>
                                    </div>
                                    <div class="mb-4">
                                        <div class="form-group">
                                         <label for="color" class="form-label">Product color</label>
                                         <select name="color_id[]" multiple="multiple" id="color" class="form-control sa-select2 form-select form-select-lg">
                                             <option value="">-- Select color --</option>
                                             @foreach ($pro_color as $color_item)
                                                <option value="{{ $color_item->id }}">{{ $color_item->name }}</option>
                                             @endforeach
                                         </select>
                                        </div>
                                     </div>
                                </div>
                            </div>

                            <div class="card mb-4">
                                <div class="card-body p-5">
                                    <div class="mb-5">
                                        <h2 class="mb-0 fs-exact-18">Status</h2>
                                    </div>
                                    <div class="form-group mb-4">
                                        <label class="mb-3 fs-exact-18" for="is_featured">Is Featured?</label>
                                        <select name="is_featured" class="form-control">
                                            <option value="">-- Featured Status --</option>
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="mb-3 fs-exact-18" for="stock_status">Stock Status</label>
                                        <select name="stock_status" class="form-control">
                                            <option value="">-- Stock Status --</option>

                                            <option value="in_stock">In Stock</option>
                                            <option value="out_of_stock">Out of Stock</option>
                                            <option value="pre_order">Pre Order</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="mb-3 fs-exact-18" for="remark">Remark</label>
                                        <select name="remark" class="form-control">
                                            <option value="">-- Remark --</option>
                                            <option value="popular">Popular</option>
                                            <option value="new">New</option>
                                            <option value="top">Top</option>
                                            <option value="special">Special</option>
                                            <option value="trending">Trending</option>
                                            <option value="regular">Regular</option>
                                            <option value="best_seller">Best Seller</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="mb-3 fs-exact-18" for="status">Approval Status</label>
                                        <select name="status" class="form-control">
                                            <option value="">-- Approval Status --</option>
                                            <option value="pending">Pending</option>
                                            <option value="approved">Approved</option>
                                            <option value="rejected">Rejected</option>
                                        </select>
                                    </div>
                                </div>
                            </div>



                            <div class="card">
                                <div class="card-body p-5">
                                    <div class="mb-5">
                                        <h2 class="mb-0 fs-exact-18">Search Engine Optimization</h2>
                                    </div>
                                    <div class="mb-4">
                                        <label for="meta_title" class="form-label">Page title</label>
                                        <input type="text" name="meta_title" placeholder="meta_title" class="form-control" id="meta_title" />
                                    </div>
                                    <div>
                                        <label for="meta_description" class="form-label">Meta description</label>
                                        <textarea id="meta_description" placeholder="meta_description" name="meta_description" class="form-control" rows="2"></textarea>
                                    </div>
                                    <div>
                                        <label for="meta_keyword" class="form-label">Meta Keyword</label>
                                        <textarea id="meta_keyword" placeholder="meta_keyword" name="meta_keyword" class="form-control" rows="2"></textarea>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-bottom: 400px;">
                <div class="col-xl-12 mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('sellerproducts.index') }}" class="btn btn-secondary ml-2">Cancel</a>
                </div>
            </div>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("district_id").addEventListener("change", function() {
                var district_id = this.value;
                var subDistrictSelect = document.getElementById("sub_district_id");

                subDistrictSelect.innerHTML = '<option value="">Loading...</option>';

                if (district_id) {
                    axios.get('{{ route('getseller.subdistricts') }}', {
                            params: {
                                district_id: district_id
                            }
                        })
                        .then(function(response) {
                            subDistrictSelect.innerHTML =
                                '<option value="">Select Sub District</option>';
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
        });
    </script>



    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("category_id").addEventListener("change", function() {
                var category_id = this.value;
                var subCategorySelect = document.getElementById("sub_category_id");
                console.log(document.getElementById("category_id"))
                console.log(document.getElementById("subCategorySelect"))
                subCategorySelect.innerHTML = '<option value="">Loading...</option>';

                if (category_id) {
                    axios.get('{{ route('getseller.subcategories') }}', {
                            params: {
                                category_id: category_id
                            }
                        })
                        .then(function(response) {
                            subCategorySelect.innerHTML =
                                '<option value="">Select Sub Category</option>';
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



