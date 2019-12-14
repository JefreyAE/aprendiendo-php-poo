<h1>Bienvenido a mi web MVC</h1>
<?php 

require_once 'autoload.php';
//
if(isset($_GET['controller']) && class_exists($_GET['controller'].'Controller')){
    $nombre_controlador = $_GET['controller']."Controller";
    $controlador = new $nombre_controlador;
    
    if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
        $action = $_GET['action'];

        $controlador->$action();    
    }else{
        echo "La página que buscas no existe Action.";
    }  
}else{
        echo "La página que buscas no existe Controller.";
    }


