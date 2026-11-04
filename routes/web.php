<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Resource Route untuk CRUD Course
Route::resource('courses', CourseController::class);

// Route untuk Halaman Pendaftaran (Mengarah ke register.blade.php)
Route::get('/pendaftaran', function () {
    return view('register');
})->name('pendaftaran');