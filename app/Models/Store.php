<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Store extends Model
{

    protected $fillable = [
        'partner_id',
        'category_id',
        'name',
        'phone',
        'mobile_phone',
        'zipcode',
        'address',
        'address_number',
        'address_complement',
        'province',
        'city',
        'lat',
        'lng',
        'is_aprooved',
    ];
    /**
     * Relations
     */
    public function syndicate()
    {
        return $this->belongsTo(Syndicate::class);
    }

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
