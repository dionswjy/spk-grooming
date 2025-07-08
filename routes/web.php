<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SPKController;
use Illuminate\Support\Facades\Auth;
use App\Models\SPKResult;
use App\Http\Controllers\HomeController;



Route::get('/', function () {
    return redirect('/spk');
});

Route::get('/spk', [SPKController::class, 'index']);
Route::post('/spk/process', [SPKController::class, 'process']);

// Tambahan: login dan auth
Auth::routes();
Route::middleware('auth')->group(function () {
    Route::get('/spk', [SPKController::class, 'index']);
    Route::post('/spk/process', [SPKController::class, 'process']);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
