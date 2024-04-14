<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemporaryFileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::middleware(['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])
    ->prefix(LaravelLocalization::setLocale())
    ->group(function () {


        Route::get('/test', function () {
            $payment = \App\Models\Payment::first();
            return 'test';
        });

        Route::middleware('auth')->group(function () {
            /**
             * Profile
             */
            Route::prefix('profile')->controller(ProfileController::class)->group(function () {
                Route::get('/', 'index')->name('profile.index');

                Route::get('/edit', 'edit')->name('profile.edit');

                Route::patch('', 'update')->name('profile.update');

                Route::delete('', 'destroy')->name('profile.destroy');

                Route::post('/change-profile-picture', 'changeProfilePicture')->name('profile.change.profile.picture');

                Route::put('/change-theme', 'changeTheme')->name('user.change.theme');

            });

            /**
             * Course enrollment
             */


            /**
             * Temporary Files
             */
            Route::controller(TemporaryFileController::class)->group(function () {
                Route::post('/tmp-upload', 'upload')->name('tmp.upload');
                Route::delete('/tmp-delete', 'delete')->name('tmp.delete');
            });


        });

        require __DIR__ . '/auth.php';
    });
