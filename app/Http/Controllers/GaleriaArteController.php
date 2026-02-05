<?php

namespace App\Http\Controllers;
use  App\Models\Productos;
use  App\Models\Tipos;
use Illuminate\Http\Request;
class GaleriaArteController extends Controller
{
    public function main()
    {
        $tipos=Tipos::all();
        $data['tipos']=$tipos;
        return view('components/master_coffee_shop')->with($data);
    }

    function productos(){
        $productos=Productos::all();
        return response()->json($productos);
        
    }
    function finalizar_pago(){
        return view('components/pago');
    }

function catalogo_productos() {
    
        $productos = Productos::join('tipo', 'productos.idtipo', '=', 'tipo.id')
            ->select('productos.*', 'tipo.nombre as nombre_tipo') // Alias para no sobrescribir el nombre del producto
            ->get();

       
        $tipos = Tipos::all();
        // dd($tipos);

        return view('catalogo_productos', compact('productos', 'tipos'));
    }

    public function guardar_producto(Request $request) {
    $producto = new Productos();
    $producto->idtipo = $request->idtipo;
    $producto->nombre = $request->nombre;
    $producto->precio = $request->precio;
    $producto->descripcion = $request->descripcion;
    $producto->foto = $request->foto; // Aquí podrías implementar lógica de subida de archivos
    $producto->save();

    return redirect()->back();
}
public function editar_producto(Request $request, $id) {
    $producto = Productos::find($id);
    $producto->idtipo = $request->idtipo;
    $producto->nombre = $request->nombre;
    $producto->precio = $request->precio;
    $producto->descripcion = $request->descripcion;
    $producto->foto = $request->foto;
    $producto->save();

    return redirect()->back();
}
public function eliminar_producto($id) {
    Productos::destroy($id);
    return redirect()->back();
}
}
