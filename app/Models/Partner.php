<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
        'name',
        'social_reason',
        'category_id',
        'cpf_cnpj',
        'phone',
        'mobile_phone',
        'email',
        'brand',
        'site',
        'facebook',
        'instagram',
        'youtube',
        'zipcode',
        'address',
        'address_number',
        'address_complement',
        'province',
        'city',
        'observations',
        'user_id',
        'is_aprooved',
    ];

    /**
     * Relations
     * */
    public function promotions()
    {
        return $this->hasMany(Promotion::class);
    }

    public function stores()
    {
        return $this->hasMany(Store::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getImageAttribute()
    {
        $defaultImage = asset('/img/colepom_bg_white.png');
        return $this->attributes['brand'] ? $this->attributes['brand'] : $defaultImage;
    }

    public static function searchPartners($uf = null, $city = null, $categories = null)
    {
        return self::when($categories, function ($query) use ($categories) {
            $query->WhereIn('category_id', $categories);
        })->when($uf, function ($query) use ($uf) {
            $query->orWhere('uf_code', $uf);
        })->when($city, function ($query) use ($city) {
            $query->orWhere('city_code', $city);
        })->get();
    }
}
