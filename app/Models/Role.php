<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    const ADMINISTRATOR = 1;
    const SYNDICATE = 2;
    const AFFILIATE = 3;
    const PARTNER = 4;

    protected $fillable = [
        'name',
        'description'
    ];

    /**
     * Relations
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
