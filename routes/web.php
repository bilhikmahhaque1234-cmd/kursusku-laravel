<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Resource Route untuk CRUD Course
Route::resource('courses', CourseController::class);

// Route untuk Halaman Pendaftaran (Mengarah ke register.blade.php)
Route::get('/pendaftaran', function () {
    return view('register');
})->name('pendaftaran');

// Resource Route untuk Enrollment (Pertemuan 12)
Route::resource('enrollments', EnrollmentController::class)
    ->only(['index', 'create', 'store']);