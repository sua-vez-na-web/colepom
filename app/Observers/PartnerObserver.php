<?php

namespace App\Observers;

use App\Models\Partner;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;

class PartnerObserver
{
    /**
     * Handle the partner "created" event.
     *
     * @param  \App\App\Models\Partner  $partner
     * @return void
     */
    public function creating(Partner $partner)
    {
        $user = User::create(
            [
                'name' => Str::kebab($partner->fantasy_name),
                'email' => $partner->email,
                'password' =>  bcrypt('colepom'),
                'role_id' => Role::PARTNER
            ]
        );  

        $partner->user_id = $user->id;
    }

    /**
     * Handle the partner "updated" event.
     *
     * @param  \App\App\Models\Partner  $partner
     * @return void
     */
    public function updated(Partner $partner)
    {
        //
    }

    /**
     * Handle the partner "deleted" event.
     *
     * @param  \App\App\Models\Partner  $partner
     * @return void
     */
    public function deleted(Partner $partner)
    {
        //
    }

    /**
     * Handle the partner "restored" event.
     *
     * @param  \App\App\Models\Partner  $partner
     * @return void
     */
    public function restored(Partner $partner)
    {
        //
    }

    /**
     * Handle the partner "force deleted" event.
     *
     * @param  \App\App\Models\Partner  $partner
     * @return void
     */
    public function forceDeleted(Partner $partner)
    {
        //
    }
}
