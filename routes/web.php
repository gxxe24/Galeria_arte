<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GaleriaArteController  ;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [GaleriaArteController::class, 'main']) -> name('Galeria.home');
Route::get('/productos', [GaleriaArteController::class, 'productos']) -> name('Galeria.productos');
Route::get('/finalizar_pago', [GaleriaArteController::class, 'finalizar_pago']) -> name('Galeria.finalizar_pago');

