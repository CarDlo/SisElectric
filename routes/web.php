<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//home
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rutas empleados
Route::get('/aprobaciones/empleados', [App\Http\Controllers\EmpleadoController::class, 'index'])->name('aprobaciones.empleados.index')->middleware('auth');
Route::post('/aprobaciones/empleados', [App\Http\Controllers\EmpleadoController::class, 'store'])->name('aprobaciones.empleados.store')->middleware('auth');


//Rutas Log de empleados
Route::get('/aprobaciones/logempleados', [App\Http\Controllers\LogempleadoController::class, 'index'])->name('aprobaciones.logempleados.index')->middleware('auth');
Route::post('/aprobaciones/logempleados', [App\Http\Controllers\LogempleadoController::class, 'store'])->name('aprobaciones.logempleados.store')->middleware('auth');

//Rutas para usuarios
Route::get('/admin/usuarios', [App\Http\Controllers\UsuarioController::class, 'index'])->name('admin.usuarios.index')->middleware('auth');
Route::get('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'create'])->name('admin.usuarios.create')->middleware('auth');
Route::post('/admin/usuarios/create', [App\Http\Controllers\UsuarioController::class, 'store'])->name('admin.usuarios.store')->middleware('auth');
Route::get('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'show'])->name('admin.usuarios.show')->middleware('auth');
Route::get('/admin/usuarios/{id}/edit', [App\Http\Controllers\UsuarioController::class, 'edit'])->name('admin.usuarios.edit')->middleware('auth');
Route::put('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'update'])->name('admin.usuarios.update')->middleware('auth');
Route::delete('/admin/usuarios/{id}', [App\Http\Controllers\UsuarioController::class, 'destroy'])->name('admin.usuarios.destroy')->middleware('auth');

//Rutas para empresas
Route::get('/admin/empresas', [App\Http\Controllers\EmpresaController::class, 'index'])->name('admin.empresas.index')->middleware('auth');
Route::get('/admin/empresas/create', [App\Http\Controllers\EmpresaController::class, 'create'])->name('admin.empresas.create')->middleware('auth');
Route::post('/admin/empresas/create', [App\Http\Controllers\EmpresaController::class, 'store'])->name('admin.empresas.store')->middleware('auth');
Route::get('/admin/empresas/{id}', [App\Http\Controllers\EmpresaController::class, 'show'])->name('admin.empresas.show')->middleware('auth');
Route::get('/admin/empresas/{id}/edit', [App\Http\Controllers\EmpresaController::class, 'edit'])->name('admin.empresas.edit')->middleware('auth');
Route::put('/admin/empresas/{id}', [App\Http\Controllers\EmpresaController::class, 'update'])->name('admin.empresas.update')->middleware('auth');
Route::delete('/admin/empresas/{id}', [App\Http\Controllers\EmpresaController::class, 'destroy'])->name('admin.empresas.destroy')->middleware('auth');