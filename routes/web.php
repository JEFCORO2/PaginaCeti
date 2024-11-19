<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\PrincipalController;

Route::get('/', InicioController::class)->name('inicio');





