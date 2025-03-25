<?php

namespace App\Models;

use App\Models\BlogCategory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'short_desc',
        'long_desc',
        'slug',
        'status',
        'user_id',
        'meta_title',
        'meta_description',
        'meta_keyword',
        'blog_category_id',
        'image',
    ];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function blogcategory()
    {
        return $this->belongsTo(BlogCategory::class,'blog_category_id');
    }
}
