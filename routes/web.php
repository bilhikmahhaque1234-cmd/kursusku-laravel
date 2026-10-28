<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// (Mengarahkan URL '/' ke HomeController)
Route::get('/', [HomeController::class, 'index'])->name('home');