<?php

namespace App\Models;

use App\Traits\AffiliatesTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Affiliate extends Model
{
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
            'document',
            'address',
            'address_number',
            'address_complement',
            'city',
            'province',
            'zipcode'
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
