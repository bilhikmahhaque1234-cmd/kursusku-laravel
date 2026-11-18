<?php

use Illuminate\Support\Facades\Route;
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