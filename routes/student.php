<?php

use App\Http\Controllers\Admins\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Student Routes
|--------------------------------------------------------------------------
|
- Here is where you can register web and student routes for your application.
| - Assigned to the  (web, student) middleware group
|
*/

Route::middleware(['auth', 'verified'])
    ->prefix('student')->group(function () {
        Route::get('dashboard', [StudentController::class, 'index'])
            ->name('student.dashboard');
    });
