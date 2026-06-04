<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;

// ── PUBLIC ──────────────────────────────────────────────────────────────────────

// Homepage — course listing
Route::get('/', [CourseController::class, 'index'])->name('courses.index');

// ── AUTH (guests only) ───────────────────────────────────────────────────────────

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

// ── AUTHENTICATED ────────────────────────────────────────────────────────────────

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [EnrollmentController::class, 'index'])->name('dashboard');

    // Enrollment CRUD
    Route::post('/enrollments', [EnrollmentController::class, 'store'])->name('enrollments.store');
    Route::put('/enrollments/{enrollment}', [EnrollmentController::class, 'update'])->name('enrollments.update');
    Route::delete('/enrollments/{enrollment}', [EnrollmentController::class, 'destroy'])->name('enrollments.destroy');
});
