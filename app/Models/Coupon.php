<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupons';

    protected $fillable =
    [
        'id',
        'code',
        'promotion_id',
        'discount'
    ];

    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }
}
