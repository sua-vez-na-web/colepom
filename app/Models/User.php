<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'is_active'
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

    public function affiliate()
    {
        return $this->hasOne(Affiliate::class);
    }

    public static function createUserAccount($email, $username, $role)
    {
        $newUser = User::create([
            'name' => $username,
            'email' => $email,
            'password' => bcrypt('colepom'),
            'role_id' => $role,
            'is_active' => 0
        ]);

        return $newUser;
    }
}
