<?php

namespace App\Models;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Promotion extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'partner_id',
        'store_id',
        'category_id',
        'title',
        'description',
        'image',
        'expiration_date',
        'redeem_expiration_date',
        'original_value',
        'discount',
        'quantity',
        'rules',
        'image',
        'is_aprooved'
    ];

    protected $dates = [
        'expiration_date',
        'redeem_expiration_date'
    ];


    /**
     * Relations
     */

    public function setExpirationDateAttribute($value)
    {
        $_expiration_date = Carbon::parse($value)->endOfDay();
        $this->attributes['expiration_date'] = $_expiration_date;
    }

    public function getImageAttribute()
    {
        $defaultImage = asset('/img/colepom_bg_white.png');
        return $this->attributes['image'] ? Storage::url($this->attributes['image']) : $defaultImage;
    }

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function coupons()
    {
        return $this->hasMany(Coupon::class);
    }

    public static function getCouponAvailable($promotion)
    {
        return $promotion->coupons()->where('is_used', 0)->first();
    }
}
