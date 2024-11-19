<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\LogueoController;

Route::get('/', InicioController::class)->name('inicio');

Route::get('/login', [LogueoController::class , 'index'])->name('login');
Route::post('/login', [LogueoController::class , 'store']);

