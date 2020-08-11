<?php

namespace App\Observers;

use App\Models\Syndicate;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Str;
class SyndicateObserver
{
    /**
     * Handle the syndicate "created" event.
     *
     * @param  \App\App\Models\Syndicate  $syndicate
     * @return void
     */
    public function creating(Syndicate $syndicate)
    {        
        //Create a User for syndicate
        $user = User::create(
            [
                'name' => Str::kebab($syndicate->fantasy_name),
                'email' => $syndicate->email,
                'password' =>  bcrypt('colepom'),
                'role_id' => Role::SYNDICATE
            ]
        );  

        $syndicate->user_id = $user->id;
    }

    /**
     * Handle the syndicate "updated" event.
     *
     * @param  \App\App\Models\Syndicate  $syndicate
     * @return void
     */
    public function updated(Syndicate $syndicate)
    {
        //
    }

    /**
     * Handle the syndicate "deleted" event.
     *
     * @param  \App\App\Models\Syndicate  $syndicate
     * @return void
     */
    public function deleted(Syndicate $syndicate)
    {
        //
    }

    /**
     * Handle the syndicate "restored" event.
     *
     * @param  \App\App\Models\Syndicate  $syndicate
     * @return void
     */
    public function restored(Syndicate $syndicate)
    {
        //
    }

    /**
     * Handle the syndicate "force deleted" event.
     *
     * @param  \App\App\Models\Syndicate  $syndicate
     * @return void
     */
    public function forceDeleted(Syndicate $syndicate)
    {
        //
    }
}
