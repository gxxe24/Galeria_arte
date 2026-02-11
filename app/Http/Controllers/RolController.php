<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;


class RolController extends Controller
{
    function index(){
        $roles = Rol::all();
    
      
        return view('rol.rol_index',['roles'=>$roles]);

        
    }



    function save(Request $r){
        $context = $r -> all();

        // dd($context);
        switch($context['operacion']){
            case 'Agregar':  
            //Se incertan datos recibidos de la peticion
            $usuario= new Rol();
            $usuario -> nombre = $context['nombre'];
            $usuario->descripcion=$context['descripcion'];
            $exitoso=$usuario -> save();
            
            

            break;

            case 'Editar':
            $usuario= Rol::find($context['id']);
            $usuario -> nombre = $context['nombre'];
            $usuario -> descripcion = $context['descripcion'];
            $exitoso=$usuario -> save();                        
            break;

            case 'Eliminar':
                $usuario= Rol::find($context['id']);
                $exitoso=$usuario -> delete();    
                break;
        }
        if($exitoso){
            return redirect()->route('Rol.index')->with('success','Operacion exitosa');
        }
        else{
            return redirect()->route('Rol.index')->with('error','Algo salio mal');
        }
         
        //Muestra el ultimo comando sql que se realizo
        //  $queries = DB::getQueryLog();
        //  dd($queries);


    }
}