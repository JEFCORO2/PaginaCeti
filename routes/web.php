<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\LogueoController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\RegistroController;

Route::get('/', InicioController::class)->name('inicio');

Route::get('/login', [LogueoController::class , 'index'])->name('login');
Route::post('/login', [LogueoController::class , 'store']);

Route::post('/logout', [LogoutController::class , 'store'])->name('logout');

Route::get('/register', [RegistroController::class , 'index'])->name('register');
Route::post('/register', [RegistroController::class , 'store']);

Route::get('/{user:username}', [PerfilController::class, 'index'])->name('perfil.index');
