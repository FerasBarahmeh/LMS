<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Enums\Privileges;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        Gate::define('isAdmin', function ($user) {
            return $user->privilege === Privileges::Admin->value;
        });

        Gate::define('isStudent', function ($user) {
            return $user->privilege === Privileges::Student->value;
        });

        Gate::define('isInstructor', function ($user) {
            return $user->privilege === Privileges::Instructor->value;
        });
    }
}
