<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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

        //User policy
        Gate::resource('users','App\Policies\UserPolicy');
        //Admin policy
        Gate::resource('admins','App\Policies\AdminPolicy');
        //Product policy
        Gate::resource('products','App\Policies\ProductPolicy');
        //Role policy
        Gate::resource('roles','App\Policies\RolePolicy');
        //MessageBox policy
        Gate::define('messages','App\Policies\MessagePolicy@view');
        //Orders policy
        Gate::define('orders','App\Policies\OrderPolicy@view');
        //Customize policy
        Gate::resource('customizes','App\Policies\CustomizePolicy');
    }
}
