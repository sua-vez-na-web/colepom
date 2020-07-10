<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Syndicate extends Model
{
    protected $fillable = [
        'user_id',
        'category_id',
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
     */
    public function stores()
    {
        return $this->hasMany(Store::class);
    }

    public function affiliates()
    {
        return $this->hasMany(Affiliate::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
