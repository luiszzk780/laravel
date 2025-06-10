<?php

use App\Http\Controllers\CalculosController;
use App\Http\Controllers\Empresa;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProdutoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teste', function () {
    return 'O teste funcionoou';
});

Route::get('/teste', function ($valor) {
    return "Você digitou:($valor)";
});

Route::get('/calc/somar/{x}/{y}', [CalculosController::class, 'somar']);


Route::get('/funcionario', [Empresa::class, 'index']);

Route::post('/funcionario', [Empresa::class, 'gravar']);

Route::resource('users', UserController::class);

Route::resource('produtos', ProdutoController::class);

