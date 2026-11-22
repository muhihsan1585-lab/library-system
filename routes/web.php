<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BorrowingController;

// Route untuk pengguna yang belum login
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');
});

// Route yang wajib login
Route::middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'index'])
        ->middleware('can:manage-users')
        ->name('users.index');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('books', BookController::class)->except(['show']);
    Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');

    Route::get('/dashboard', [
        DashboardController::class,
        'index'
    ])->name('dashboard');

    Route::resource('categories', CategoryController::class)
        ->except(['show']);

    Route::resource('members', MemberController::class)
        ->except(['show']);
});

// Halaman utama
Route::get('/', function () {
    return redirect()->route('login');
});


// Transaksi Peminjaman
Route::get('/borrowings', [
    BorrowingController::class,
    'index'
])->name('borrowings.index');

Route::get('/borrowings/create', [
    BorrowingController::class,
    'create'
])->name('borrowings.create');

Route::post('/borrowings', [
    BorrowingController::class,
    'store'
])->name('borrowings.store');

Route::get('/borrowings/{borrowing}', [
    BorrowingController::class,
    'show'
])->name('borrowings.show');

Route::patch('/borrowings/{borrowing}/return', [
    BorrowingController::class,
    'returnBook'
])->name('borrowings.return');
