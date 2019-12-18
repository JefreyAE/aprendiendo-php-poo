<?php
require_once 'controllers_autoload.php';

if(isset($_GET['controller'])){
    $nombre_controlador = $_GET['controller']."Controller";
}else{
    echo "La página que buscas no existe";
    exit();
}

if(class_exists($_GET['controller'].'Controller')){
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

/*
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
*/




