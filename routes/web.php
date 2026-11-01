<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

// Route untuk pengguna yang belum login
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');
});

// Route yang wajib login
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('books', BookController::class)->except(['show']);
    Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');

    Route::resource('categories', CategoryController::class);
    Route::resource('members', MemberController::class);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

// Halaman utama
Route::get('/', function () {
    return redirect()->route('login');
});
