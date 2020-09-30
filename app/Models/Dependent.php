<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
{


    /**
     * Relations
     */
    public function affiliate()
    {
        return $this->belongsTo(Affiliate::class);
    }

}
