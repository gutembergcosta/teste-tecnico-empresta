<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/teste01', function () {
    return ['mensagem' => 'ok'];
});