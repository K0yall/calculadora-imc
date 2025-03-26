<?php

use App\Http\Controllers\CalculoController;

Route::get('/imc', [CalculoController::class, 'calcularIMC'])->name('imc');  // Adiciona o nome 'imc' à rota GET
Route::post('/imc', [CalculoController::class, 'processarIMC'])->name('calcular.imc'); // Nome para a rota POST

Route::get('/sono', [CalculoController::class, 'avaliarSono'])->name('sono');
Route::post('/sono', [CalculoController::class, 'processarSono'])->name('calcular.sono');


Route::get('/viagem', [CalculoController::class, 'calculoGastoViagem'])->name('viagem');
Route::post('/viagem', [CalculoController::class, 'processarViagem'])->name('calcular.viagem');


Route::get('/', function () {
    return view('dashboard');
});
