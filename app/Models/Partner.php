<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Partner extends Model
{
    use SoftDeletes;

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
        'uf_code',
        'city_code'
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
        $defaultImage = asset('/img/sem-foto.jpeg');
        return $this->attributes['brand'] ? Storage::url($this->attributes['brand']) : $defaultImage;
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
