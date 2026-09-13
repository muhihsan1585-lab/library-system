<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\BookController;
use App\http\Controllers\CategoryController;
use App\http\Controllers\MemberController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/books', [BookController::class, 'index']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/members', [MemberController::class, 'index']);
