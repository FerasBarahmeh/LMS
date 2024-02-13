<?php

use App\Http\Controllers\Admins\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth', 'verified'])
    ->prefix('admin')->group(function () {
        Route::get('dashboard', [AdminController::class, 'index'])
            ->name('admin.dashboard');
    });
