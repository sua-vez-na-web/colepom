<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable = [
        'fantasy_name',
        'social_reason',
        'document',
        'email',
        'brand',
        'site',
        'facebook',
        'instagram',
        'youtube',
        'is_aprooved',        
    ];

    /**
     * Relations 
     * */
    public function promotions()
    {
        return $this->hasMany(Promotion::class);
    }
}
