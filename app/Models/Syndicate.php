<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Syndicate extends Model
{
    use SoftDeletes;

    public $table = "syndicates";
    protected $fillable = [
        'user_id',
        'name',
        'president_name',
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
        'asaas_notify',
        'asaas_id',
        'municipal_inscription',
        'state_inscription',
        'observations',
        'is_aprooved',
        'uf_code',
        'city_code'
    ];
    /**
     * Relations
     */
    public function stores()
    {
        return $this->hasMany(Store::class);
    }

    public function affiliates()
    {
        return $this->hasMany(Affiliate::class);
    }

    public function getImageAttribute()
    {
        $defaultImage = asset('/img/colepom_bg_white.png');

        return $this->attributes['brand'] ? Storage::url($this->attributes['brand']) : $defaultImage;
    }

    public static function searchSyndicates($uf = null, $city = null)
    {
        return self::when($uf, function ($query) use ($uf) {
            $query->orWhere('uf_code', $uf);
        })->when($city, function ($query) use ($city) {
            $query->orWhere('city_code', $city);
        })->get();
    }

    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
