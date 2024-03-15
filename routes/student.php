<?php

use App\Http\Controllers\Admins\StudentController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])
    ->prefix('student')->group(function () {
        Route::get('dashboard', [StudentController::class, 'index'])
            ->name('student.dashboard');
    });
