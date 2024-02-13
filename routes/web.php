<?php

use App\Http\Controllers\Admins\AdminController;
use App\Http\Controllers\Admins\InstructorController;
use App\Http\Controllers\Admins\StudentController;
use App\Http\Controllers\ProfileController;
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

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])
        ->name('admin.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin', 'verified'])->prefix('admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'index'])
        ->name('admin.dashboard');
});

Route::middleware(['auth', 'student', 'verified'])->prefix('student')->group(function () {
    Route::get('dashboard', [StudentController::class, 'index'])
        ->name('student.dashboard');
});

Route::middleware(['auth', 'instructor', 'verified'])->prefix('instructor')->group(function () {
    Route::get('dashboard', [InstructorController::class, 'index'])
        ->name('instructor.dashboard');
});

require __DIR__ . '/auth.php';
