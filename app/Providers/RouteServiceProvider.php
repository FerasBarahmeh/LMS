<?php

namespace App\Providers;

use App\Enums\Privileges;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     */
    public static function determineIntendedHome(): string|null
    {
        $intended = null;
        if (request()->user()->email_verified_at === null) return '/verify-email';

        if (request()->user()->privilege === Privileges::Admin->value) {
            $intended = route('admin.dashboard');
        } elseif(request()->user()->privilege === Privileges::Student->value) {
            $intended = route('student.dashboard');
        } elseif(request()->user()->privilege === Privileges::Instructor->value) {
            $intended = route('instructor.dashboard');
        }
        return $intended;
    }

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            Route::middleware(['web', Privileges::Admin->value])
                ->group(base_path('routes/admin.php'));

            Route::middleware(['web', Privileges::Student->value])
                ->group(base_path('routes/student.php'));

            Route::middleware(['web', Privileges::Instructor->value])
                ->group(base_path('routes/instructor.php'));
        });
    }
}
