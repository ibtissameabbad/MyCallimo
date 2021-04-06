<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //

        Gate::define('isAdmin', function($user) {
            return $user->role->name == 'admin';
         });
        
         /* define a supeviseur user role */
         Gate::define('isSuperviseur', function($user) {
             return $user->role->name == 'superviseur';
         });
       
         /* define a coller role */
         Gate::define('isColler', function($user) {
             return $user->role->name == 'coller';
         });
    }
}
