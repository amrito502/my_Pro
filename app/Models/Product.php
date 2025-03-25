<?php

namespace App\Models;

use App\Models\Size;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'sku',
        'barcode',
        'current_price',
        'discount_price',
        'quantity',
        'weight',
        'color_id',
        'size_id',
        'description',
        'additional_info',
        'return_policy',
        'tag_title',
        'image',
        'product_gallery',
        'video',
        'is_featured',
        'stock_status',
        'remark',
        'status',
        'division',
        'latitude',
        'longitude',
        'section_id',
        'user_id',
        'admin_id',
        'seller_id',
        'district_id',
        'sub_district_id',
        'category_id',
        'sub_category_id',
        'brand_id',
        'meta_title',
        'meta_description',
        'meta_keyword',
    ];

    protected $casts = [
        'size' => 'json',
        'color' => 'json',
        'product_gallery' => 'json',
    ];


    // Relationships

    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function subDistrict()
    {
        return $this->belongsTo(SubDistrict::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }


    static public function getProduct($category_id = '', $subcategory_id = '')
    {
        // If both parameters are provided
        if (!empty($category_id) && !empty($subcategory_id)) {
            return Product::where('category_id', $category_id)
                ->where('sub_category_id', $subcategory_id)
                ->get();
        }

        // If only category_id is provided
        if (!empty($category_id)) {
            return Product::where('category_id', $category_id)
                ->get();
        }

        // If only subcategory_id is provided
        if (!empty($subcategory_id)) {
            return Product::where('sub_category_id', $subcategory_id)
                ->get();
        }

    }

}
