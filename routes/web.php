<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\GaleriaArteController;
use App\Http\Controllers\LoginController;



 Route::get('/home', [GaleriaArteController::class, 'main']) -> name('Galeria.home');
        Route::get('/productos', [GaleriaArteController::class, 'productos']) -> name('Galeria.productos');
        Route::get('/finalizar_pago', [GaleriaArteController::class, 'finalizar_pago']) -> name('Galeria.finalizar_pago');

 Route::get('/catalogo_productos', [GaleriaArteController::class, 'catalogo_productos']) -> name('Galeria.catalogo_productos');
        Route::post('/productos/guardar', [GaleriaArteController::class, 'guardar_producto'])->name('productos.guardar');
        Route::put('/productos/editar/{id}', [GaleriaArteController::class, 'editar_producto'])->name('productos.editar');
        Route::delete('/productos/eliminar/{id}', [GaleriaArteController::class, 'eliminar_producto'])->name('productos.eliminar');

Route::get('/login', [LoginController::class, 'login']) -> name('login');
Route::post('/iniciar_sesion', [LoginController::class, 'iniciar_sesion'])->name('Login.iniciar_sesion');
Route::group(['middleware' => 'auth'], function(){
       
});



