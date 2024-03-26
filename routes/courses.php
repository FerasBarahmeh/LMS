<?php

use App\Http\Controllers\CoursesController;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::middleware(['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'])->prefix(LaravelLocalization::setLocale())->group(function () {
    Livewire::setUpdateRoute(function ($handle) {
        return Route::post('/custom/livewire/update', $handle);
    });

    Route::prefix('courses')->name('courses.')->controller(CoursesController::class)->group(function () {
        Route::get('', 'all')->name('all');
    });
});
