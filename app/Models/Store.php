<?php

namespace App\Models;

use App\Traits\PartnerTrait;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use PartnerTrait;
    
    protected $fillable = [
        'syndicate_id',
        'partner_id',
        'category_id',
        'name',
        'zip_code',
        'city',
        'address',
        'neighborhood',
        'state',
        'lat',
        'lng',
        'phone',
        'alt_phone',
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
