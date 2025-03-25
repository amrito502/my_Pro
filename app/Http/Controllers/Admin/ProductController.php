<?php

namespace App\Http\Controllers\Admin;

use App\Models\Size;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Section;
use App\Models\Category;
use App\Models\District;
use App\Models\SubCategory;
use App\Models\SubDistrict;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products= Product::with(['section', 'user', 'admin', 'seller', 'customer', 'district', 'subDistrict', 'category', 'subCategory', 'brand'])
        ->get();
        foreach ($products as $product) {
            if ($product->size_id) {
                $sizeIds = json_decode($product->size_id, true);
                if (is_array($sizeIds) && count($sizeIds) > 0) {
                    $product->sizes = Size::whereIn('id', $sizeIds)->get();
                } else {
                    $product->sizes = collect(); 
                }
            } else {
                $product->sizes = collect(); 
            }
    
            if ($product->color_id) {
                $colorIds = json_decode($product->color_id, true);
                if (is_array($colorIds) && count($colorIds) > 0) {
                    $product->colors = Color::whereIn('id', $colorIds)->get();
                } else {
                    $product->colors = collect(); 
                }
            } else {
                $product->colors = collect();  
            }
        }
    
        return view('admin.components.product.index', compact('products'));
    }


    public function getSubDistricts(Request $request)
    {
        $subDistricts = SubDistrict::where('district_id', $request->district_id)->get();
        return response()->json($subDistricts);
    }

    public function getSubCategories(Request $request)
    {
        $subCategories = SubCategory::where('category_id', $request->category_id)->get();
        return response()->json($subCategories);
    }
    public function create()
    {
        $data['size'] = Size::all();
        $data['pro_color'] = Color::all();
        $data['sections'] = Section::all();
        $data['districts'] = District::all();
        $data['categories'] = Category::all();
        $data['brands'] = Brand::all();
        return view('admin.components.product.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $slug = Str::slug($request->name);
        $originalSlug = $slug;
        $count = 1;
        while (Product::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }
        $sku = $request->sku ?? 'SKU-' . strtoupper(Str::random(5));
        while (Product::where('sku', $sku)->exists()) {
            $sku = 'SKU-' . strtoupper(Str::random(5));
        }
        $barcode = $request->sku ?? 'BAR-' . strtoupper(Str::random(8));
        while (Product::where('barcode', $sku)->exists()) {
            $sku = 'BAR-' . strtoupper(Str::random(8));
        }
        $coordinates = $this->getDivisionCoordinates($request->division);
        $products = new Product();
        $products->name = $request->name;
        if ($request->has('size_id') && count($request->size_id) > 0) {
            $products->size_id = json_encode($request->size_id); 
        } else {
            $products->size_id = null; 
        }
        
        if ($request->has('color_id') && count($request->color_id) > 0) {
            $products->color_id = json_encode($request->color_id); 
        } else {
            $products->color_id = null;
        }
        $products->slug = $slug;
        $products->sku = $sku;

        $products->user_id = auth()->id();
        $products->admin_id = auth()->id();
        $products->seller_id = auth()->id();

        $products->barcode = $barcode;
        $products->current_price = $request->current_price;
        $products->discount_price = $request->discount_price;
        $products->quantity = $request->quantity;
        $products->weight = $request->weight;
        $products->description = $request->description;
        $products->additional_info = $request->additional_info;
        $products->return_policy = $request->return_policy;

        $products->tag_title = $request->tag_title;
        $products->is_featured = $request->is_featured;
        $products->stock_status = $request->stock_status;
        $products->remark = $request->remark;
        $products->status = $request->status;

        $products->division = $request->division;
        $products->latitude = $coordinates['latitude'];
        $products->longitude = $coordinates['longitude'];

        $products->section_id = $request->section_id;

        $products->district_id = $request->district_id;
        $products->sub_district_id = $request->sub_district_id;
        $products->category_id = $request->category_id;
        $products->sub_category_id = $request->sub_category_id;
        $products->brand_id = $request->brand_id;
        $products->video = $request->video;
        $products->meta_title = $request->meta_title;
        $products->meta_description = $request->meta_description;
        $products->meta_keyword = $request->meta_keyword;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/products', $fileName);
            $products->image = $fileName;
        }

        if ($request->hasFile('product_gallery')) {
            $imagePaths = [];

            foreach ($request->file('product_gallery') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move('uploads/product_gallery', $imageName);
                $imagePaths[] = 'uploads/product_gallery/' . $imageName;
            }
            $productGallery = json_encode($imagePaths);
        }


        $products->product_gallery = $productGallery;
        $products->save();

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }
    private function getDivisionCoordinates($division)
    {
        $divisions = [
            'ঢাকা' => ['latitude' => '23.8103', 'longitude' => '90.4125'],
            'চট্টগ্রাম' => ['latitude' => '22.3569', 'longitude' => '91.7832'],
            'রাজশাহী' => ['latitude' => '24.3745', 'longitude' => '88.6042'],
            'খুলনা' => ['latitude' => '22.8456', 'longitude' => '89.5403'],
            'বরিশাল' => ['latitude' => '22.7010', 'longitude' => '90.3535'],
            'সিলেট' => ['latitude' => '24.8949', 'longitude' => '91.8687'],
            'রংপুর' => ['latitude' => '25.7439', 'longitude' => '89.2752'],
            'ময়মনসিংহ' => ['latitude' => '24.7471', 'longitude' => '90.4203'],
        ];

        return $divisions[$division] ?? ['latitude' => null, 'longitude' => null];
    }

    public function show(Product $product)
    {
        if ($product->size_id) {
            $sizeIds = json_decode($product->size_id, true);
            $product->sizes = Size::whereIn('id', $sizeIds)->get();
        } else {
            $product->sizes = collect();
        }
        if ($product->color_id) {
            $colorIds = json_decode($product->color_id, true);
            $product->colors = Color::whereIn('id', $colorIds)->get();
        } else {
            $product->colors = collect();
        }
        return view('admin.components.product.show',compact('product'));
    }

    public function edit(Product $product)
    {
        if ($product->size_id) {
            $sizeIds = json_decode($product->size_id, true);
            $product->sizes = Size::whereIn('id', $sizeIds)->get();
        } else {
            $product->sizes = collect();
        }
        if ($product->color_id) {
            $colorIds = json_decode($product->color_id, true);
            $product->colors = Color::whereIn('id', $colorIds)->get();
        } else {
            $product->colors = collect();
        }

        $districts = District::all();
        $subDistricts = SubDistrict::all();
        $subCategories = SubCategory::all();
        $sections = Section::all();
        $categories = Category::all();
        $brands = Brand::all(); 

        return view('admin.components.product.edit', compact('subDistricts','subCategories','product', 'districts', 'sections', 'categories', 'brands'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'stock_status' => 'required|in:in_stock,out_of_stock,pre_order',
        ]);

        $id = $request->id;

        $slug = Str::slug($request->name);
        $originalSlug = $slug;
        $count = 1;

        while (Product::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        $sku = $request->sku ?? 'SKU-' . strtoupper(Str::random(5));
        while (Product::where('sku', $sku)->exists()) {
            $sku = 'SKU-' . strtoupper(Str::random(5));
        }
        $barcode = $request->sku ?? 'BAR-' . strtoupper(Str::random(8));
        while (Product::where('barcode', $sku)->exists()) {
            $sku = 'BAR-' . strtoupper(Str::random(8));
        }
        $coordinates = $this->getDivisionCoordinates($request->division);
   
        $product->name = $request->name;
        if ($request->has('size_id') && count($request->size_id) > 0) {
            $product->size_id = json_encode($request->size_id); 
        } else {
            $product->size_id = null; 
        }
        
        if ($request->has('color_id') && count($request->color_id) > 0) {
            $product->color_id = json_encode($request->color_id); 
        } else {
            $product->color_id = null;
        }
        $product->slug = $slug;
        $product->sku = $sku;

        $product->user_id = auth()->id();
        $product->admin_id = auth()->id();
        $product->seller_id = auth()->id();

        $product->barcode = $barcode;
        $product->current_price = $request->current_price;
        $product->discount_price = $request->discount_price;
        $product->quantity = $request->quantity;
        $product->weight = $request->weight;
        $product->description = $request->description;
        $product->additional_info = $request->additional_info;
        $product->return_policy = $request->return_policy;

        $product->tag_title = $request->tag_title;
        $product->is_featured = $request->is_featured;
        $product->stock_status = $request->stock_status;
        $product->remark = $request->remark;
        $product->status = $request->status;

        $product->division = $request->division;
        $product->latitude = $coordinates['latitude'];
        $product->longitude = $coordinates['longitude'];

        $product->section_id = $request->section_id;

        $product->district_id = $request->district_id;
        $product->sub_district_id = $request->sub_district_id;
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->sub_category_id;
        $product->brand_id = $request->brand_id;
        $product->video = $request->video;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_keyword = $request->meta_keyword;

        if ($request->hasFile('image')) {
             $destination = 'uploads/products/' . $product->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/products', $fileName);
            $product->image = $fileName;
        }
        $productGallery = null;
        if ($request->hasFile('product_gallery')) {
            $imagePaths = [];

            if ($product->product_gallery) {
                $existingImages = json_decode($product->product_gallery);
                foreach ($existingImages as $existingImage) {
                    if (File::exists($existingImage)) {
                        File::delete($existingImage);
                    }
                }
            }

            foreach ($request->file('product_gallery') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move('uploads/product_gallery', $imageName);
                $imagePaths[] = 'uploads/product_gallery/' . $imageName;
            }
            $productGallery = json_encode($imagePaths);
        }

        if (empty($productGallery)) {
            $productGallery = $product->product_gallery;
        }
        $product->product_gallery = $productGallery;
        $product->save();

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $destination = 'uploads/products/' . $product->image;
        if (File::exists($destination)) {
            File::delete($destination);
        }

        if ($product->product_gallery) {
            $existingImages = json_decode($product->product_gallery);
            foreach ($existingImages as $existingImage) {
                if (File::exists($existingImage)) {
                    File::delete($existingImage);
                }
            }
        }
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
