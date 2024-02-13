<?php

use App\Http\Controllers\Admins\InstructorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Instructor Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth', 'verified'])
    ->prefix('instructor')->group(function () {
        Route::get('dashboard', [InstructorController::class, 'index'])
            ->name('instructor.dashboard');
    });
