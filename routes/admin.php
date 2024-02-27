<?php

use App\Http\Controllers\Admins\AdminController;
use App\Http\Controllers\Admins\SocialMediaAccountsController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| - Here is where you can register web and admin routes for your application.
| - Assigned to the  (web, admin) middleware group
|
*/

Route::middleware(['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])
    ->prefix(LaravelLocalization::setLocale())
    ->group(function () {


        Route::middleware(['auth', 'verified'])
            ->prefix('admin')->group(function () {
                Route::get('dashboard', [AdminController::class, 'index'])
                    ->name('admin.dashboard');

                Route::prefix('users')->group(function () {
                    Route::get('', [AdminController::class, 'users'])
                        ->name('admin.users.all');

                    Route::get('instructors', [AdminController::class, 'instructors'])
                        ->name('admin.users.instructors');


                    Route::get('students', [AdminController::class, 'students'])
                        ->name('admin.users.students');

                });


                /**
                 * Social media account for platform
                 */
                Route::resource('platforms', SocialMediaAccountsController::class)
                    ->only('index', 'store', 'update', 'destroy');
            });

    });

