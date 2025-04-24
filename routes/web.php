<?php

use App\Http\Controllers\CalculosController;
use Illuminate\Support\Facades\Route;

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