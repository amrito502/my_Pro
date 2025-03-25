<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
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

    static public function getRecordActive(){
        return self::where('status','active')
                    ->orderBy('id','asc')
                    ->get();
    }
}
