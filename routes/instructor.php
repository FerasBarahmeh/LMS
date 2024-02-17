<?php

use App\Http\Controllers\Admins\InstructorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Instructor Routes
|--------------------------------------------------------------------------
|
- Here is where you can register web and instructor routes for your application.
| - Assigned to the  (web, instructor) middleware group
|
*/

Route::middleware(['auth', 'verified'])
    ->prefix('instructor')->group(function () {
        Route::get('dashboard', [InstructorController::class, 'dashboard'])
            ->name('instructor.dashboard');
    });
