<?php

use App\Http\Controllers\Admins\AdminController;
use App\Http\Controllers\Admins\SocialMediaAccountsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::middleware(['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])
    ->prefix(LaravelLocalization::setLocale())
    ->group(function () {


        Route::middleware(['auth', 'verified'])
            ->prefix('admin')
            ->name('admin.')
            ->group(function () {

                Route::get('dashboard', [AdminController::class, 'index'])
                    ->name('dashboard');

                Route::prefix('users')->group(function () {
                    Route::get('', [AdminController::class, 'users'])
                        ->name('users.all');

                    Route::get('instructors', [AdminController::class, 'instructors'])
                        ->name('users.instructors');

                    Route::get('students', [AdminController::class, 'students'])
                        ->name('users.students');

                    Route::put('/toggle-status/{id}', [AdminController::class, 'toggleStatus'])
                        ->name('user.toggle.status');

                    Route::put('/migrate-student-to-instructor/{id}', [AdminController::class, 'migrateToInstructor'])
                        ->name('migrate.student.to.instructor');

                    Route::put('/migrate-instructor-to-student/{id}', [AdminController::class, 'migrateToStudent'])
                        ->name('migrate.instructor.to.student');

                });


                /**
                 * Social media account for platform
                 */
                Route::resource('platforms', SocialMediaAccountsController::class)
                    ->only('index', 'store', 'update', 'destroy');
            });

    });

