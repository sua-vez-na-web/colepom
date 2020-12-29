<?php

namespace App\Models;

use App\Notifications\UserRedeemCoupon;
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

    public static function createUserAccount($email, $username, $role, $password)
    {
        $newUser = User::create([
            'name' => $username,
            'email' => $email,
            'password' => bcrypt($password),
            'role_id' => $role,
            'is_active' => 0
        ]);

        return $newUser;
    }

    public function coupons()
    {
        return $this->belongsTo(AffiliateCoupom::class, 'user_id');
    }

    public static function redeemCuponToUser($user, $coupon): bool
    {
        #check if user already have this coupom;
        $couponHasRedeem = AffiliateCoupom::where('user_id', $user->id)
            ->where('promotion_id', $coupon->promotion->id)
            ->first();


        if (!$couponHasRedeem) {
            AffiliateCoupom::create(
                [
                    'user_id' => $user->id,
                    'coupon_id' => $coupon->id,
                    'promotion_id' => $coupon->promotion->id,
                    'partner_id' => $coupon->promotion->partner->id,
                    'redeem_at' => now(),
                    'is_used' => 0,
                    'is_active' => 0
                ]
            );

            $coupon->is_used = 1;
            $coupon->used_at = now();
            $coupon->user_id = $user->id;
            $coupon->save();

            $user->notify(new UserRedeemCoupon($user, $coupon));

            return true;
        }
        return false;
    }
}
