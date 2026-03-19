<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Rout::get('registro', [
    AuthController::class, 'registerForm'
])->name('registro');
