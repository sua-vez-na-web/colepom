<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    
    use SoftDeletes;

    protected $fillable = [
        'syndicate_id', 
        'title',
        'body',
        'link',
        'is_active'      
    ];

    public function syndicate(){

    return $this->belongsTo(Syndicate::class);
    }

}


