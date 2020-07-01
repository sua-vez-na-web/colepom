<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Role;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('administrator',function($user){
            return $user->role_id == Role::ADMINISTRATOR;
         });
        
        Gate::define('affiliate',function($user){
            return $user->role_id == Role::AFFILIATE;
        });

        Gate::define('partner',function($user){
            return $user->role_id == Role::PARTNER;
        });

        Gate::define('syndicate',function($user){
            return $user->role_id == Role::SYNDICATE;
        });

        Gate::define('guest',function($user){
            return $user->role_id == Role::GUEST;
        });
         
    }
}
