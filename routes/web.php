<?php

use App\Http\Controllers\Admins\InstructorController;
use App\Http\Controllers\Admins\UnifiedController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return 'test';
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /**
     * Unified
     */
    Route::put('/toggle-status/{id}', [UnifiedController::class, 'toggleStatus'])
        ->name('user.toggle.status')
        ->middleware('admin');

    Route::put('/change-theme', [UnifiedController::class, 'changeTheme'])
        ->name('user.change.theme');
});

require __DIR__ . '/auth.php';
