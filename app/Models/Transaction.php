<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'order_id',
        'status',
        'mode',
        'payment_screenshot',
        'payment_trxid',
        'payment_number'
    ];

    /**
     * Relationship: Transaction belongs to a User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship: Transaction belongs to an Order.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
