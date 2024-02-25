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
    \Illuminate\Support\Facades\DB::enableQueryLog();
    $queries = \Illuminate\Support\Facades\DB::getQueryLog();
    \Illuminate\Support\Facades\DB::disableQueryLog();
    return 'test';
});

Route::middleware('auth')->group(function () {
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])
            ->name('profile.index');

        Route::get('/edit', [ProfileController::class, 'edit'])
            ->name('profile.edit');

        Route::patch('', [ProfileController::class, 'update'])
            ->name('profile.update');

        Route::delete('', [ProfileController::class, 'destroy'])
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
         * Experience
         */
        Route::prefix('experience')->group(function () {
            Route::post('/add', [ProfileController::class, 'addExperience'])
                ->name('user.add.experience');
            Route::put('/edit/{experience}', [ProfileController::class, 'editExperience'])
                ->name('user.edit.experience');
            Route::delete('/delete/{experience}', [ProfileController::class, 'deleteExperience'])
                ->name('user.delete.experience');
        });

        /**
         * Education
         */
        Route::prefix('education')->group(function () {
            Route::post('/add', [ProfileController::class, 'addEducation'])
                ->name('user.add.education');
            Route::put('/edit/{education}', [ProfileController::class, 'editEducation'])
                ->name('user.edit.education');
            Route::delete('/delete/{education}', [ProfileController::class, 'deleteEducation'])
                ->name('user.delete.education');
        });
    });








    /**
     * Temporary Files
     */
    Route::post('/tmp-upload', [TemporaryFileController::class, 'upload'])
        ->name('tmp.upload');
    Route::delete('/tmp-delete', [TemporaryFileController::class, 'delete'])
        ->name('tmp.delete');


});

require __DIR__ . '/auth.php';
