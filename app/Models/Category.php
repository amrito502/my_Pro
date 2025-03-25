<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'image',
        'status',
        'user_id',
        'meta_title',
        'meta_description',
        'meta_keyword',
    ];

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class, 'category_id')
            ->where('status', 'active');
    }

    static public function getSingleSlug($slug){
        return self::where('slug','=', $slug)->first();
    }

}
