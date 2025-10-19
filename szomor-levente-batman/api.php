<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BatmanController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Batman API routes
Route::get('/batman', [BatmanController::class, 'index'])->name('batman.index');
Route::get('/batman/opponents', [BatmanController::class, 'opponents'])->name('batman.opponents');
Route::get('/batman/shortest', [BatmanController::class, 'shortest'])->name('batman.shortest');
Route::get('/batman/hardest', [BatmanController::class, 'hardest'])->name('batman.hardest');
Route::get('/batman/winrate', [BatmanController::class, 'winrate'])->name('batman.winrate');
Route::get('/batman/avg-diff', [BatmanController::class, 'avg_diff'])->name('batman.avgDiff');
Route::get('/batman/location/{location}', [BatmanController::class, 'location'])->name('batman.location');
Route::get('/batman/{id}', [BatmanController::class, 'show'])->whereNumber('id')->name('batman.show');
