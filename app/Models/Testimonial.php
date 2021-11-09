<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Testimonial extends Model
{
    
    use SoftDeletes;

    protected $fillable = [
        'partner_id', 
        'name',
        'description',
        'active'      
    ];

    public function partner(){

    return $this->belongsTo(Partner::class);
    }

}


