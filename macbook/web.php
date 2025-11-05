<?php

use App\Http\Controllers\MacbookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/macbooks', [MacbookController::class, 'index'])->name('macbooks.index');
Route::get('/api/macbooks/{id}', [MacbookController::class, 'show'])
    ->where('id', '[0-9]+')
    ->name('macbooks.show');
