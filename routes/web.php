<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\RegistrationController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Resource Route untuk CRUD Course
Route::resource('courses', CourseController::class);

// Halaman & proses Pendaftaran (membuat Participant + Enrollment)
Route::get('/pendaftaran', [RegistrationController::class, 'create'])->name('pendaftaran');
Route::post('/pendaftaran', [RegistrationController::class, 'store'])->name('pendaftaran.store');

// Endpoint kuota kursus (dipakai fetch di halaman pendaftaran)
Route::get('/api/course-availability', [RegistrationController::class, 'availability'])
    ->name('course.availability');

// Resource Route untuk Enrollment (Pertemuan 12)
Route::resource('enrollments', EnrollmentController::class)
    ->only(['index', 'create', 'store']);

// Route Autentikasi (Login, Logout, Forgot & Reset Password)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/forgot-password', [AuthController::class, 'showForgotPassword'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'showResetPassword'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

// Halaman Profil Saya / Dashboard setelah login
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
});