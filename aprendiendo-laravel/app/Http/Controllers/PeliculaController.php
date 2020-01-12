<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    public function index($pagina = 1){
        $titulo = 'Listado de mis peliculas';
        return view('pelicula.index',[
            'titulo'=> $titulo,
            'pagina'=> $pagina
        ]);
    }
    
    public function detalle($year = null){
       return view('peliculas.detalle');
    }
    
    //REDIRECCIONES
    public function redirigir(){
        //return redirect()->action('PeliculaController@detalle');
        //return redirect('/peliculas');
        return redirect()->route('detalle.peliculas');
    }
    
    public function formulario(){
        return view('peliculas.formulario');
    }
    
    public function recibir(Request $request){
        $name = $request->input('nombre');
        $email = $request->input('email');
        echo $email;
        die();
    }
}
