<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'price',
        'quantity',
        'options',
        'rstatus',
    ];


    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Relationship: OrderItem belongs to a Product.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }


    public function seller()
{
    return $this->belongsTo(User::class, 'seller_id');  // assuming 'seller_id' is the foreign key in order_items
}

}
