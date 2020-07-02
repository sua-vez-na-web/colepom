<?php

namespace App\Models;

use App\Traits\AffiliatesTrait;
use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    use AffiliatesTrait;
    
    protected $fillable =
    [
        'user_id',
        'syndicate_id',
        'first_name',
        'last_name',
        'birth_of_date',
        'genre',
        'company',
        'job_post',
        'email',
        'document'
    ];
    
    /**
     * Relations
     */
    public function syndicate()
    {
        return $this->belongsTo(Syndicate::class);
    }

    public function dependents()
    {
        return $this->hasMany(Dependent::class);
    }
}
