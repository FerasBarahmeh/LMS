<?php

use App\Http\Controllers\Admins\UnifiedController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemporaryFileController;
use App\Models\TemporaryFile;
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
    Route::post('/change-profile-picture', [ProfileController::class, 'changeProfilePicture'])->name('profile.change.profile.picture');


    /**
     * Temporary Files
     */
    Route::post('/tmp-upload', [TemporaryFileController::class, 'upload'])
        ->name('tmp.upload');
    Route::delete('/tmp-delete', [TemporaryFileController::class, 'delete'])
        ->name('tmp.delete');


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
