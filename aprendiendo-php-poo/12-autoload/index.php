<?php

require_once 'autoload.php';
/*
$usuario = new Usuario();

echo $usuario->nombre;
echo "<br/>";
echo $usuario->email;
echo "<br/>";

$categoria = new Categoria();
echo $categoria->nombre;
echo "<br/>";
echo "<hr/>";
 
 */

// ESPACIOS DE NOMBRES Y PAQUETES.

use MisClases\Usuario;
use MisClases\Categoria;
use MisClases\Entrada;
use PanelAdministrador\Usuario as UsuarioAdmin;

class Principal{
    public $usuario;
    public $categoria;
    public $entrada;
    
    public function __construct() {
        $this->usuario = new Usuario();  
        $this->categoria = new Categoria();
        $this->entrada = new Entrada();             
    }
    
    function getUsuario() {
        return $this->usuario;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function getEntrada() {
        return $this->entrada;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    function setEntrada($entrada) {
        $this->entrada = $entrada;
    }
    
    function informacion(){
        echo __CLASS__;
    }
}

// Otro paquete
//$usuario = new UsuarioAdmin();
//var_dump($usuario);

// Objeto principal
$principal = new Principal();
$principal->informacion();
$metodos = get_class_methods($principal);

$busqueda = array_search('setEntrada', $metodos);
var_dump($busqueda); //Devuelve un número indicando el indice del arreglo.

var_dump($principal->usuario);
var_dump($principal->categoria);
var_dump($principal->entrada);

$us = $principal->usuario;
echo $us->email;

// Comprobar si existe una clase.
$clase = @class_exists('MisClases\Usuario');
$clase = @class_exists('PanelAdministrador\Usuardio');
// El aroba para que no muestre los warnings.

if($clase){
    echo "<h1>La clase si existe</h1>";
}else{
    echo "<h1>La clase no existe</h1>";
}