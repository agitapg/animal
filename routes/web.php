<?php

use Illuminate\Support\Facades\Route;
use App\Agit;

Route::get('/sports', [App\Http\Controllers\AnimalController::class, 'index']);
Route::get('/log-greetings', [App\Http\Controllers\AnimalController::class, 'logGreetings']);

Route::get('/julian', function() {
    return Agit::capitalize('Agit...'); // result => My Name Is Name
});

Auth::routes();

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
