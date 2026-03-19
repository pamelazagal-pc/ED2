<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\pedidoController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('pedido', pedidoController::class);
});

Route::get('index', [
    AuthController::class, 'index'
])->name('index');



Route::get('registro', [
    AuthController::class, 'registerForm'
])->name('registro');

//ruta para registrar usuarios
Route::post('/registro', [ //el post es para mandar informacion, el get solo para solicitar la vista
    AuthController::class, 'register'
])->name('registro.store'); //el .store ahorita no es mas que una referencia para saber que significa guardar

//ruta para regresar vista de inicio de sesion
Route::get('/acceso', [
    AuthController::class, 'loginForm'
])->name('acceso');

//ruta para iniciar sesion
Route::post('/acceso', [
    AuthController::class, 'login'
])->name('acceso.store');

//ruta para cerrar sesion
Route::post('/cerrar', [
    AuthController::class, 'logout'
])->name('cerrar');


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin.dashboard', [
        AuthController::class, 'adminDashboard'
    ])->name('admin.dashboard');

});
