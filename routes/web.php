<?php

use App\Http\Controllers\EventoController;
use App\Http\Controllers\InscricaoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('usuario', UsuarioController::class);
Route::resource('evento', EventoController::class);

Route::post('/inscricoes', [InscricaoController::class, 'store'])->name('inscricoes.store');

