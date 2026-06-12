<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\InscricaoController;
use App\Http\Controllers\UsuarioController;
use App\Models\Inscricao;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('index');

Route::resource('usuario', UsuarioController::class);
Route::resource('evento', EventoController::class);

Route::resource('inscricoes', InscricaoController::class) ;

