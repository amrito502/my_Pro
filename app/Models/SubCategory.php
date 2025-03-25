<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'image',
        'status',
        'user_id',
        'category_id',
        'meta_title',
        'meta_description',
        'meta_keyword',
    ];
   
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


    // public function childSubCategories()
    // {
    //     return $this->hasMany(SubCategory::class, 'parent_id')->where('status', 1);
    // }


    static public function getSingleSlug($slug){
        return self::where('slug','=', $slug)->first();
    }


    static public function getRecordSubCategory($category_id){
        return self::where('category_id','=', $category_id)->get();
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'sub_category_id');
    }

    public function totalProduct()
    {
        return $this->products()->count();
    }
}
