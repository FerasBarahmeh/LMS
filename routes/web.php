<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemporaryFileController;
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
    $platform = \App\Models\AvailablePlatform::find(1);

    \Illuminate\Support\Facades\DB::enableQueryLog();

    $queries = \Illuminate\Support\Facades\DB::getQueryLog();
    \Illuminate\Support\Facades\DB::disableQueryLog();

    return 'test';
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])
        ->name('profile.index');

    Route::get('/profile/edit', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    Route::post('/change-profile-picture', [ProfileController::class, 'changeProfilePicture'])
        ->name('profile.change.profile.picture');

    Route::put('/toggle-status/{id}', [ProfileController::class, 'toggleStatus'])
        ->name('user.toggle.status')
        ->middleware('admin');

    Route::put('/change-theme', [ProfileController::class, 'changeTheme'])
        ->name('user.change.theme');

    Route::put('/social-media-account/{platform}', [ProfileController::class, 'socialMediaAccount'])
        ->name('user.social.media.account');

    /**
     * Temporary Files
     */
    Route::post('/tmp-upload', [TemporaryFileController::class, 'upload'])
        ->name('tmp.upload');
    Route::delete('/tmp-delete', [TemporaryFileController::class, 'delete'])
        ->name('tmp.delete');


});

require __DIR__ . '/auth.php';
