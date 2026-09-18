<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\BookController;
use App\http\Controllers\CategoryController;
use App\http\Controllers\MemberController;
use App\http\Controllers\DashboardController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/books', [BookController::class, 'index']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/members', [MemberController::class, 'index']);
Route::get('/books/{id}', [BookController::class, 'show']);
Route::get('/members{id}', [MemberController::class, 'show']);
Route::get('/dashboard', [DashboardController::class, 'index']);
