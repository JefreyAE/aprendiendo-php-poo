<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrutaController extends Controller
{
    public function index(){
        $frutas = DB::table('frutas')
                ->orderBy('id','desc')
                ->get();
        
        return view('frutas.index', array(
            'frutas' => $frutas
        ));
    }
    
    public function detail($id){
        $fruta = DB::table('frutas')->where('id', '=', $id )->first();
             
        return view('frutas.detail', [
            'fruta' => $fruta
        ]);
    }
    
    public function create(){
        return view('frutas.create');
    }
    
    public function save(Request $request){
        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');
        $precio = $request->input('precio');
    
        $fruta = DB::table('frutas')->insert(array(
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'precio' => $precio,
            'fecha' => date('Y-m-d')
        ));
        
        return redirect()->action('FrutaController@index')->with('status','Fruta añadida correctamente.');
    }
    
    public function delete($id){
        $fruta = DB::table('frutas')->where('id',$id)->delete();
        return redirect()->action('FrutaController@index')->with('status','Fruta borrada correctamente.');
    }
    
    public function edit($id){
        //Sacar el registro de la base de datos
        $fruta = DB::table('frutas')->where('id',$id)->first();
        //pasarle la vista al objeto y rellenar el formulario
        
        return view('frutas.create',[
            'fruta' => $fruta]);        
    }
    
    public function update(Request $request){
        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');
        $precio = $request->input('precio');
        $id = $request->input('id');
        
        $fruta = DB::table('frutas')->where('id',$id)
                ->update(array(
                    'nombre' => $nombre,
                    'descripcion' => $descripcion,
                    'precio' => $precio
                ));
                /*var_dump($fruta);
                die();*/
        return redirect()->action('FrutaController@index')->with('status','Fruta modificada correctamente.');
    }
}
