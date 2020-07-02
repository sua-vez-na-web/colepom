<?php

namespace App\Observers;

use App\Models\Affiliate;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AffiliateObserver
{
    /**
     * Handle the affiliate "created" event.
     *
     * @param  \App\App\Models\Affiliate  $affiliate
     * @return void
     */
    public function creating(Affiliate $affiliate)
    {
       $user = Auth::user();        
       //Create a User for affiliates
       $newUser = User::create(
        [
            'name' => Str::kebab($affiliate->first_name),
            'email' => $affiliate->email,
            'password' =>  bcrypt('colepom'),
            'role_id' => Role::AFFILIATE
        ]);
        
        $affiliate->user_id = $newUser->id;
        $affiliate->syndicate_id = $user->syndicate->id;
    }

    /**
     * Handle the affiliate "updated" event.
     *
     * @param  \App\App\Models\Affiliate  $affiliate
     * @return void
     */
    public function updated(Affiliate $affiliate)
    {
        //
    }

    /**
     * Handle the affiliate "deleted" event.
     *
     * @param  \App\App\Models\Affiliate  $affiliate
     * @return void
     */
    public function deleted(Affiliate $affiliate)
    {
        //
    }

    /**
     * Handle the affiliate "restored" event.
     *
     * @param  \App\App\Models\Affiliate  $affiliate
     * @return void
     */
    public function restored(Affiliate $affiliate)
    {
        //
    }

    /**
     * Handle the affiliate "force deleted" event.
     *
     * @param  \App\App\Models\Affiliate  $affiliate
     * @return void
     */
    public function forceDeleted(Affiliate $affiliate)
    {
        //
    }
}
