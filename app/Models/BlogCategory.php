<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'status',
        'user_id',
        'meta_title',
        'meta_description',
        'meta_keyword',
    ];
}
