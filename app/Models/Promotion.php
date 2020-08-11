<?php

namespace App\Models;

use App\Traits\PartnerTrait;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use PartnerTrait;

    protected $fillable = [
        'partner_id',
        'store_id',
        'category_id',
        'code',
        'title',
        'description',
        'image',
        'due_date',
        'amount',
        'image',
        'is_active'
    ];

    /**
     * Relations
     */


    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
