<?php

namespace App\Observers;

use App\Models\Promotion;
use Illuminate\Support\Facades\Auth;

class PromotionObserver
{
    /**
     * Handle the promotion "created" event.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return void
     */
    public function creating(Promotion $promotion)
    {
        $user = Auth::user();        
       
        $partner = $user->partner;
     
        $promotion->partner_id = $partner->id;
    }
        
    

    /**
     * Handle the promotion "updated" event.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return void
     */
    public function updated(Promotion $promotion)
    {
        //
    }

    /**
     * Handle the promotion "deleted" event.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return void
     */
    public function deleted(Promotion $promotion)
    {
        //
    }

    /**
     * Handle the promotion "restored" event.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return void
     */
    public function restored(Promotion $promotion)
    {
        //
    }

    /**
     * Handle the promotion "force deleted" event.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return void
     */
    public function forceDeleted(Promotion $promotion)
    {
        //
    }
}
