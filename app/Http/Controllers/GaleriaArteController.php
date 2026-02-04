<?php

namespace App\Http\Controllers;
use  App\Models\Productos;
class GaleriaArteController extends Controller
{
    public function main()
    {
        return view('components/master_coffee_shop');
    }

    function productos(){
        $productos=Productos::all();
        return response()->json($productos);
        dd(json($productos));
    }
    function finalizar_pago(){
        return view('components/pago');
    }
}
