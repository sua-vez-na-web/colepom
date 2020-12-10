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
        'redeem_at',
        'is_used',
        'is_active',
    ];

    protected $dates = [
        'redeem_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
