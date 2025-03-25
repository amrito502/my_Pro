<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSlider extends Model
{
    protected $fillable = ['product_id', 'status','background_image'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function sliderItems()
    {
        return $this->hasMany(SliderItem::class);
    }
}
