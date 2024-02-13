<?php

use App\Http\Controllers\Admins\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Student Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth', 'verified'])
    ->prefix('student')->group(function () {
        Route::get('dashboard', [StudentController::class, 'index'])
            ->name('student.dashboard');
    });
