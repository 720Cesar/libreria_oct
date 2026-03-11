<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('libros', LibroController::class);
});

Route::get('/libros/{id}/edit', [
    LibroController::class, 'edit'
])->name('libros.edit');

Route::get('/libros/{id}', [
    LibroController::class, 'update'
])->name('libros.update');

// Ruta para ver libros desde la API
Route::get('/home', [
    LibroController::class, 'home'
])->name('home');

Route::get('/registro', [
    AuthController::class, 'registerForm'
])->name('registro');

Route::post('/registro', [
    AuthController::class, 'register'
])->name('registro.store');

Route::get('/acceso',[
    AuthController::class, 'loginForm'
])->name('acceso');

Route::post('/acceso', [
    AuthController::class, 'login'
])->name('acceso.store');

// Ruta para cerra sesión
Route::post('/cerrar', [
    AuthController::class, 'logout'
])->name('cerrar');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin-dashboard', [
        AuthController::class, 'adminDashboard'
    ])->name('admin-dashboard');
});