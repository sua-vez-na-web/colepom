<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    /**
     * Realtions
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
