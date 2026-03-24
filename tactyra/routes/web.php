<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AttendanceController;

/*
|--------------------------------------------------------------------------
| LANDING
|--------------------------------------------------------------------------
*/

Route::view('/', 'welcome');


/*
|--------------------------------------------------------------------------
| ZONA PRIVADA
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','verified'])->group(function () {

    /*
    | Dashboard
    */

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');


    /*
    | Perfil
    */

    Route::view('/profile', 'profile')
        ->name('profile');


    /*
    | CRUD jugadores
    */

    Route::resource('players', PlayerController::class);


    /*
    | Equipos
    */

    Route::resource('teams', TeamController::class);


    /*
    | ASISTENCIA ENTRENAMIENTOS
    */

    Route::post('/attendance', [AttendanceController::class, 'store'])
        ->name('attendance.store');

});


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';