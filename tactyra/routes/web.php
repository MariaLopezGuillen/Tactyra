<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::view('/', 'welcome')->name('welcome');

Route::middleware('auth')->group(function () {
    Route::view('dashboard', 'dashboard')
        ->middleware('verified')
        ->name('dashboard');
    
    Route::view('profile', 'profile')->name('profile');
    
    // RUTA IMPORTANTE: POST para logout
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});

require __DIR__.'/auth.php';