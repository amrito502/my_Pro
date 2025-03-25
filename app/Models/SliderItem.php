<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SliderItem extends Model
{
    protected $fillable = [
        'product_slider_id',
        'image',
        'title_1',
        'title_2',
        'title_3',
        'link_4',
    ];

    public function productSlider()
    {
        return $this->belongsTo(ProductSlider::class);
    }
}
