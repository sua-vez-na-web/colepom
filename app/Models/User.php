<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password','role_id','is_active'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Relations
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function syndicate()
    {
        return $this->hasOne(Syndicate::class);
    }

    public function partner()
    {
        return $this->hasOne(Partner::class);
    }
}
