<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\LogueoController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\SeguidorController;
use App\Http\Controllers\PublicacionController;

Route::get('/', InicioController::class)->name('inicio');

Route::get('/login', [LogueoController::class , 'index'])->name('login');
Route::post('/login', [LogueoController::class , 'store']);

Route::post('/logout', [LogoutController::class , 'store'])->name('logout');

Route::get('/register', [RegistroController::class , 'index'])->name('register');
Route::post('/register', [RegistroController::class , 'store']);

Route::get('/editar-perfil', [PerfilController::class, 'editar'])->name('perfil.editar');
Route::post('/editar-perfil', [PerfilController::class, 'store'])->name('perfil.store');

Route::get('/post/crear', [PublicacionController::class, 'crear'])->name('publi.crear');
Route::post('/post/crear', [PublicacionController::class, 'store'])->name('publi.store');

Route::post('/imagenes', [ImagenController::class, 'store'])->name('imagenes.store');

Route::post('/{user:username}/seguidor', [SeguidorController::class, 'store'])->name('usuario.seguir');
Route::delete('/{user:username}/dejar', [SeguidorController::class, 'destroy'])->name('usuario.dejar');

Route::get('/{user:username}', [PerfilController::class, 'index'])->name('perfil.index');


