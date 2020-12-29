<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AffiliateCoupom extends Model
{
    protected $table = 'affiliate_coupoms';

    protected $fillable = [
        'user_id',
        'coupon_id',
        'partner_id',
        'promotion_id',
        'redeem_at',
        'is_used',
        'used_at',
        'is_active',
    ];

    protected $dates = [
        'redeem_at',
        'used_at'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }
    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }
}
