<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipos;


class TiposController extends Controller
{
    function main(){
        $tipos = Tipos::all();
        return view('tipos.tipos_catalogo',['tipos'=>$tipos]);

        
    }
    function save(Request $r){
        $context = $r -> all();

        // dd($context);
        switch($context['operacion']){
            case 'Agregar':  
            //Se incertan datos recibidos de la peticion
            $tipos= new Tipos();
            $tipos -> nombre = $context['nombre'];
            $exitoso=$tipos -> save();
            
            

            break;

            case 'Editar':
            $tipos= Tipos::find($context['id']);
            $tipos -> nombre = $context['nombre'];
            $exitoso=$tipos -> save();                        
            break;

            case 'Eliminar':
                $tipos= Tipos::find($context['id']);
                $exitoso=$tipos -> delete();    
                break;
        }
        if($exitoso){
            return redirect()->route('catalogo_tipos')->with('success','Operacion exitosa');
        }
        else{
            return redirect()->route('catalogo_tipos')->with('error','Algo salio mal');
        }
         
        //Muestra el ultimo comando sql que se realizo
        //  $queries = DB::getQueryLog();
        //  dd($queries);


    }
}