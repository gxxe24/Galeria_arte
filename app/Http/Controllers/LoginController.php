<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Models\Usuario;

class LoginController extends Controller
{
    function login(){
        return view('Login.login');
    }
    
    public function iniciar_sesion(Request $r){
        //Se valida que los datos que vienen del formulario cumplan con el formato solicitado. 
        $context = $r -> validate(
            ['email' => ['required', 'email'], //required = el campo no puede estar vacio, email= el campo debe tener la sintaxis de un email (@ y dominio ej. @dominio.com)
            'password' => ['required']], //de igual forma, el campo de password no puede estar vacio
        );

        if(Auth::attempt(['email' => $context['email'],
            'password' => $context['password']])){
            $r -> session()-> regenerate() ;
            
            $user = Auth::user();
            //Referencia al id de rol jugador en la base de datos
            if($user -> id_rol == 1 ){
                return redirect() -> route('Galeria.home');
            }
           
        }        
        else{
            return redirect()-> back() -> withError('Email o contraseña incorrectos!', 'error');
        }


    
        //Redireccion de acuerdo al ro;
}

    function registro(Request $r){
        $r->validate([
            ['email' => ['required', 'email'], //required = el campo no puede estar vacio, email= el campo debe tener la sintaxis de un email (@ y dominio ej. @dominio.com)
            'password' => ['required']],
        ]);
        Usuario::create([
            'email'=>$r->email,
            'password'
        ]);
    }
    function logout()
    {
        Auth::logout();     
        Session::flush();     
        return redirect()->route('login'); 
    }   


}