<?php

namespace App\Models;

use App\Traits\PartnerTrait;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use PartnerTrait;
    
    protected $fillable = [
        'partner_id',
        'category_id',
        'code',
        'title',
        'description',
        'image',
        'due_date',
        'amount',
        'is_active'
    ];

    /**
     * Relations
     */

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
