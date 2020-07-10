<?php

namespace App\Observers;

use App\Models\Partner;
use Illuminate\Support\Facades\Auth;
use App\Models\Store;

class StoreObserver
{
    /**
     * Handle the partner "created" event.
     *
     * @param  \App\Models\Partner  $partner
     * @return void
     */
    public function creating(Store $store)
    {
       $user = Auth::user();        
       
       $partner = $user->partner;
       $store->partner_id = $partner->id;
       $store->syndicate_id = 1;
    }

    /**
     * Handle the partner "updated" event.
     *
     * @param  \App\Models\Partner  $partner
     * @return void
     */
    public function updated(Partner $partner)
    {
        //
    }

    /**
     * Handle the partner "deleted" event.
     *
     * @param  \App\Models\Partner  $partner
     * @return void
     */
    public function deleted(Partner $partner)
    {
        //
    }

    /**
     * Handle the partner "restored" event.
     *
     * @param  \App\Models\Partner  $partner
     * @return void
     */
    public function restored(Partner $partner)
    {
        //
    }

    /**
     * Handle the partner "force deleted" event.
     *
     * @param  \App\Models\Partner  $partner
     * @return void
     */
    public function forceDeleted(Partner $partner)
    {
        //
    }
}
