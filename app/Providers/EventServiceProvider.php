<?php

namespace App\Providers;

use App\Models\Affiliate;
use App\Models\Partner;
use App\Models\Promotion;
use App\Models\Store;
use App\Observers\SyndicateObserver;
use App\Models\Syndicate;
use App\Observers\AffiliateObserver;
use App\Observers\PartnerObserver;
use App\Observers\PromotionObserver;
use App\Observers\StoreObserver;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        Syndicate::observe(SyndicateObserver::class);
        Affiliate::observe(AffiliateObserver::class);
        Partner::observe(PartnerObserver::class);
        Store::observe(StoreObserver::class);
        Promotion::observe(PromotionObserver::class);
    }
}
