<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

Route::get('/', function () {
    return view('welcome');
});

// Route Week 09: Form Pendaftaran Kursus
Route::get('/register-course', [CourseController::class, 'create'])->name('course.register');
Route::post('/register-course', [CourseController::class, 'store'])->name('course.store');