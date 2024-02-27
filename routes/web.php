<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemporaryFileController;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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


Route::middleware(['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])
    ->prefix(LaravelLocalization::setLocale())
    ->group(function () {
        /**
         * Livewire
         */
        Livewire::setUpdateRoute(function ($handle) {
            return Route::post('/livewire/update', $handle);
        });


        Route::get('/test', function () {
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
    });



