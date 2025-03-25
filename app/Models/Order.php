<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'seller_id',
        'product_id',
        'subtotal',
        'discount',
        'tax',
        'total',
        'name',
        'phone',
        'locality',
        'address',
        'city',
        'state',
        'country',
        'landmark',
        'zip',
        'type',
        'status',
        'is_shipping_different',
        'delivery_date',
        'canceled_date',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    

    /**
     * Relationship: Order has many Order Items.
     */
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Relationship: Order has one Shipping Address (if different).
     */
    // public function user(){
    //     return $this->belongsTo(User::class,"user_id");
    // }

    // public function orderItems(){
    //     return $this->hasMany(OrderItem::class,"order_id");
    // }

    public function transaction(){
        return $this->hasOne(Transaction::class,"order_id");
    }
}
