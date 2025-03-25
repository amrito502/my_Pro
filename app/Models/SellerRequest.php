<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SellerRequest extends Model
{
    protected $fillable = [
        'name',
        'store_name',
        'email',
        'phone',
        'address',
        'city',
        'district',
        'sub_district',
        'country',
        'postal_code',
        'nid',
        'store_description',
        'user_id',
        'message',
        'status',
        'store_image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
