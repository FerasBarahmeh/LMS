<?php

use App\Http\Controllers\Admins\InstructorController;
use App\Http\Controllers\Instructors\CoursesController;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Instructor Routes
|--------------------------------------------------------------------------
|
| - Here is where you can register web and instructor routes for your application.
| - Assigned to the  (web, instructor) middleware group
|
*/
Route::middleware(['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])
    ->prefix(LaravelLocalization::setLocale())
    ->group(function () {

        Livewire::setUpdateRoute(function ($handle) {
            return Route::post('/custom/livewire/update', $handle);
        });

        Route::middleware(['auth', 'verified'])
            ->prefix('instructor')
            ->name('instructor.')
            ->group(function () {

                Route::get('dashboard', [InstructorController::class, 'dashboard'])
                    ->name('dashboard');

                /**
                 * Courses
                 */
                Route::resource('courses', CoursesController::class)->except('create, destroy');
                Route::prefix('courses')
                    ->name('courses.')
                    ->group(function () {

                        Route::name('manage.')
                            ->group(function () {

                                Route::get('manage/{course}/curriculum', [CoursesController::class, 'curriculum'])
                                    ->name('curriculum');

                                Route::get('manage/{course}/settings', [CoursesController::class, 'settings'])
                                    ->name('settings');

                                Route::delete('manage/sections/{section}/delete', [CoursesController::class, 'deleteSection'])
                                    ->name('section.delete');

                                Route::delete('manage/lectures/{lecture}/delete', [CoursesController::class, 'deleteLecture'])
                                    ->name('lecture.delete');
                            });
                    });
            });

    });
