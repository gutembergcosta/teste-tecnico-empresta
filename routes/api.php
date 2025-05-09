<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstituicaoController;
use App\Http\Controllers\CreditoController;
use App\Http\Controllers\ConvenioController;

Route::get('/listar-instituicoes', [InstituicaoController::class, 'list']);
Route::get('/listar-convenios', [ConvenioController::class, 'list']);
Route::post('/simular-credito', [CreditoController::class, 'simular']);

