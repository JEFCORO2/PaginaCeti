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

Route::get('/editar-perfil', [PerfilController::class, 'editar'])->name('perfil.editar');
Route::post('/editar-perfil', [PerfilController::class, 'store'])->name('perfil.store');

Route::get('/{user:username}', [PerfilController::class, 'index'])->name('perfil.index');


