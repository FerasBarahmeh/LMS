<?php

use App\Http\Controllers\Admins\InstructorController;
use App\Http\Controllers\Instructors\InstructorCoursesController;
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

        Route::middleware(['auth', 'verified'])->prefix('instructor')->name('instructor.')->group(function () {

            Route::get('dashboard', [InstructorController::class, 'dashboard'])
                ->name('dashboard');

            /**
             * Courses
             */
            Route::resource('courses', InstructorCoursesController::class)->except('create', 'show', 'destroy');
            Route::prefix('courses')->name('courses.manage.')->group(function () {
                /**
                 * In course controller
                 */
                Route::controller(InstructorCoursesController::class)->group(function () {
                    Route::get('manage/{course}/curriculum', 'curriculum')
                        ->name('curriculum');

                    Route::get('manage/{course}/settings', 'settings')
                        ->name('settings');

                    Route::get('manage/{course}/messages', 'messages')
                        ->name('messages');

                    Route::patch('manage/course-image/{course}', 'updateImage')
                        ->name('image');

                    Route::patch('manage/course-promotional/{course}', 'updatePromotional')
                        ->name('promotional');

                    Route::put('manage/publish/{course}', 'publish')
                        ->name('publish');

                    Route::put('manage/updateMessages/{course}', 'updateMessages')
                        ->name('updateMessages');

                    Route::put('manage/updatePrice/{course}', 'updatePrice')
                        ->name('price');
                });

                /**
                 * Section Controller
                 */
                Route::controller(SectionController::class)->group(function () {
                    Route::delete('manage/sections/{section}/delete', 'destroy')
                        ->name('section.delete');
                });

                /**
                 * Lecture Controller
                 */
                Route::controller(LectureController::class)->group(function () {
                    Route::delete('manage/lectures/{lecture}/delete', 'destroy')
                        ->name('lecture.delete');
                });
            });
        });
    });
