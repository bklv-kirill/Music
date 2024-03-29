<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define("group-update", function(User $user) {
            return $user->role_id === 1 || $user->role_id === 2;
        });
        Gate::define("album-update", function(User $user) {
            return $user->role_id === 1 || $user->role_id === 3;
        });
        Gate::define("track-update", function(User $user) {
            return $user->role_id === 1 || $user->role_id === 4;
        });
    }
}
