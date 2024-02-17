<?php

use App\Http\Controllers\Admins\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| - Here is where you can register web and admin routes for your application.
| - Assigned to the  (web, admin) middleware group
|
*/

Route::middleware(['auth', 'verified'])
    ->prefix('admin')->group(function () {
        Route::get('dashboard', [AdminController::class, 'index'])
            ->name('admin.dashboard');

        Route::get('instructors', [AdminController::class, 'instructors'])
            ->name('admin.instructors');
    });
