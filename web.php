<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// Halaman login
Route::get('/', [PageController::class, 'login'])->name('login');

// Menerima data form login (POST)
Route::post('/login', [PageController::class, 'authenticate'])->name('login.process');

// Halaman setelah login (menerima ?username=...)
Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/pengelolaan', [PageController::class, 'pengelolaan'])->name('pengelolaan');
Route::get('/profile', [PageController::class, 'profile'])->name('profile');
Route::get('/', [PageController::class, 'login'])->name('login');
