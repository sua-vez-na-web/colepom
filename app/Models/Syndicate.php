<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Syndicate extends Model
{
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
        return $this->attributes['brand'] ? $this->attributes['brand'] : $defaultImage;
    }
}
