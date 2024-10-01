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
Route::get('/aprobaciones/empleado', [App\Http\Controllers\EmpleadoController::class, 'index'])->name('aprobaciones.empleado.index')->middleware('auth');
Route::post('/aprobaciones/empleado', [App\Http\Controllers\EmpleadoController::class, 'store'])->name('aprobaciones.empleado.store')->middleware('auth');


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

//Rutas para roles
Route::get('/admin/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('admin.roles.index')->middleware('auth');
Route::get('/admin/roles/create', [App\Http\Controllers\RoleController::class, 'create'])->name('admin.roles.create')->middleware('auth');
Route::post('/admin/roles/create', [App\Http\Controllers\RoleController::class, 'store'])->name('admin.roles.store')->middleware('auth');
Route::get('/admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'show'])->name('admin.roles.show')->middleware('auth');
Route::get('/admin/roles/{id}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('admin.roles.edit')->middleware('auth');
Route::put('/admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'update'])->name('admin.roles.update')->middleware('auth');
Route::delete('/admin/roles/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('admin.roles.destroy')->middleware('auth');

//Rutas para TAREAS
Route::get('/tareas', [App\Http\Controllers\TareaController::class, 'index'])->name('tareas.index')->middleware('auth');
Route::get('/tareas/create', [App\Http\Controllers\TareaController::class, 'create'])->name('tareas.create')->middleware('auth');
Route::post('/tareas/create', [App\Http\Controllers\TareaController::class, 'store'])->name('tareas.store')->middleware('auth');
Route::get('/tareas/{id}', [App\Http\Controllers\TareaController::class, 'show'])->name('tareas.show')->middleware('auth');
Route::get('/tareas/{id}/edit', [App\Http\Controllers\TareaController::class, 'edit'])->name('tareas.edit')->middleware('auth');
Route::put('/tareas/{id}', [App\Http\Controllers\TareaController::class, 'update'])->name('tareas.update')->middleware('auth');
Route::delete('/tareas/{id}', [App\Http\Controllers\TareaController::class, 'destroy'])->name('tareas.destroy')->middleware('auth');

//Rutas para SUBTAREAS
Route::get('/subtareas', [App\Http\Controllers\SubtareaController::class, 'index'])->name('subtareas.index')->middleware('auth');
Route::get('/subtareas/create', [App\Http\Controllers\SubtareaController::class, 'create'])->name('subtareas.create')->middleware('auth');
Route::post('/subtareas/create', [App\Http\Controllers\SubtareaController::class, 'store'])->name('subtareas.store')->middleware('auth');
Route::get('/subtareas/{id}', [App\Http\Controllers\SubtareaController::class, 'show'])->name('subtareas.show')->middleware('auth');
Route::get('/subtareas/{id}/edit', [App\Http\Controllers\SubtareaController::class, 'edit'])->name('subtareas.edit')->middleware('auth');
Route::put('/subtareas/{id}', [App\Http\Controllers\SubtareaController::class, 'update'])->name('subtareas.update')->middleware('auth');
Route::delete('/subtareas/{id}', [App\Http\Controllers\SubtareaController::class, 'destroy'])->name('subtareas.destroy')->middleware('auth');