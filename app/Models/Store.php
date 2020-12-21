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

    public function promotions()
    {
        return $this->hasMany(Promotion::class);
    }

    public static function searchStores($uf = null, $city = null, $categories = null)
    {

        if ($uf == null || $city == null) {

            return self::all();
        } else {
            return self::when($uf, function ($query) use ($uf) {
                $query->orWhere('uf_code', $uf);
            })->when($city, function ($query) use ($city) {
                $query->orWhere('city_code', $city);
            })->get();
        }
    }
}
