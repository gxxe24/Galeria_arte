<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GaleriaArteController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


        Route::post('/venta/save', [VentaController::class, 'RecibirVenta'])->name('venta_save');  
