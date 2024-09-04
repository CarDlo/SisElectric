<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rutas aprobaciones
Route::get('/aprobaciones/empleados', [App\Http\Controllers\EmpleadoController::class, 'index'])->name('aprobaciones.empleados.index')->middleware('auth');
Route::post('/aprobaciones/empleados', [App\Http\Controllers\EmpleadoController::class, 'store'])->name('aprobaciones.empleados.index')->middleware('auth');
