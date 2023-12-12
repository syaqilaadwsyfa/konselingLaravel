<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
        Gate::define('isAdmin', function($users) {
            return $users->role_id === 1;
        });
        Gate::define('isGuruBK', function($users) {
            return $users->role_id === 2;
        });
        Gate::define('isSiswa', function($users) {
            return $users->role_id === 3;
        });
    }
}
