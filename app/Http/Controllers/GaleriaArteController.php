<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\Tipos;
use Illuminate\Http\Request;

class GaleriaArteController extends Controller
{

    public function main(){
    $tipos = Tipos::all();
    

    return view('components/galeria_paginaprincipal', ['tipos' => $tipos]);
    }

    function productos(){
        $productos = Productos::all();
        return response()->json($productos);
    }






    //============================//
    /*
        A PARTIR DE ACA ES EL
        CATALOGO DE PRODUCTOS
    
    */
    //===========================//
    // Método para mostrar la vista (Index)
    function catalogo_productos() {
        // Mantenemos su consulta con JOIN para mostrar el nombre del tipo
        $productos = Productos::join('tipos', 'productos.idtipo', '=', 'tipos.id')
            ->select('productos.*', 'tipos.nombre as nombre_tipo')
            ->get();

        $tipos = Tipos::all();

        return view('productos.catalogo_productos', compact('productos', 'tipos'));
    }


    
    // Este método centraliza TODA la lógica (Agregar, Editar, Eliminar)
    function save(Request $r){
        $context = $r->all();
        // dd($context);
        switch($context['operacion']){
            
            case 'Agregar':
                $producto = new Productos();
               
                $producto->idtipo = $context['idtipo'];
                $producto->nombre = $context['nombre'];
                $producto->descripcion = $context['descripcion'];
                $producto->precio = $context['precio'];

                // Manejo básico de foto si viene nulo
                $producto->imagen = $context['foto'] ?? ''; 
                $producto->save();
                 
                break;

            case 'Editar':
                $producto = Productos::find($context['id']);
                $producto->idtipo = $context['idtipo'];
                $producto->nombre = $context['nombre'];
                $producto->precio = $context['precio'];
                $producto->descripcion = $context['descripcion'];
                // Solo actualiza foto si se envía algo nuevo, sino mantiene la anterior (lógica opcional)
                if(!empty($context['foto'])) {
                    $producto->foto = $context['foto'];
                }
                $producto->save();
                break;

            case 'Eliminar':
                $producto = Productos::find($context['id']);
                $producto->delete();
                break;
        }

        return redirect()->route('Galeria.catalogo_productos');
    }
}   