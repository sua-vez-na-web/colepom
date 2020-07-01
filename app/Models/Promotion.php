<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = [
        'partner_id',
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

}
