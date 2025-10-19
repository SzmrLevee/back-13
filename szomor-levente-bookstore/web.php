<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\BookController;

Route::get('/api/books', [BookController::class, 'index']);
Route::get('/api/books/{id}', [BookController::class, 'show'])->whereNumber('id');
Route::get('/api/books/genre/{genre}', [BookController::class, 'genre']);
Route::get('/api/books/most-expensive', [BookController::class, 'mostExpensive']);
Route::get('/api/books/random', [BookController::class, 'random']);
Route::get('/api/books/popular', [BookController::class, 'popular']);

