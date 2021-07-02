<?php

namespace App\Providers;

use App\Models\User;
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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\User' => 'App\Policies\UserPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        Gate::before(function (User $user, $ability) {
            return $user->hasRole('super_admin') ? true : null;
        });

        // Checks for authenticated user in the backend. Used to hide auth routes from guests in frontend
        Gate::define('auth user', function(User $user){
            return $user ? true : false; // Gate identifies $user as auth user so no need for auth()->user() or request()->user()
        });

         // isAdmin
         Gate::define('isAdmin', function(User $user){
            return $user->hasRole('admin') ? true : false; 
        });

        // isSuperAdmin
        Gate::define('isSuperAdmin', function(User $user){
            return $user->hasRole('super_admin') ? true : false; 
        });
    }
}
