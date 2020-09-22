<?php

namespace App\Models;

use App\Traits\PartnerTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    //use PartnerTrait;

    protected $fillable = [
        'partner_id',
        'store_id',
        'category_id',
        'code',
        'title',
        'description',
        'image',
        'expiration_date',
        'original_value',
        'discount',
        'qty_available',
        'qty_remaining',
        'redemption_rules',
        'image',
        'is_active'
    ];

    protected $dates = [
        'expiration_date'
    ];

    /**
     * Relations
     */

    public function setExpirationDateAttribute($value)
    {
        $_expiration_date = Carbon::parse($value)->endOfDay();
        $this->attributes['expiration_date'] = $_expiration_date;
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
}
