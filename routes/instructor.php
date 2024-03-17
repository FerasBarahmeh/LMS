<?php

use App\Http\Controllers\Admins\InstructorController;
use App\Http\Controllers\Instructors\CoursesController;
use App\Http\Controllers\Instructors\LectureController;
use App\Http\Controllers\Instructors\SectionController;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
                Route::resource('courses', CoursesController::class)->except('create');
                Route::prefix('courses')
                    ->name('courses.manage.')
                    ->group(function () {
                        Route::get('manage/{course}/curriculum', [CoursesController::class, 'curriculum'])
                            ->name('curriculum');

                        Route::get('manage/{course}/settings', [CoursesController::class, 'settings'])
                            ->name('settings');

                        Route::delete('manage/sections/{section}/delete', [SectionController::class, 'destroy'])
                            ->name('section.delete');

                        Route::delete('manage/lectures/{lecture}/delete', [LectureController::class, 'destroy'])
                            ->name('lecture.delete');
                    });
            });
    });
