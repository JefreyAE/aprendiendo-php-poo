<?php

class Utils {

    public static function deleteSession($name) {
        if (isset($_SESSION[$name])) {
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }
        return $name;
    }

    public static function showError($errores, $campo) {
        $alerta = '';
        if (isset($errores[$campo]) && !empty($campo)) {
            $alerta = "<div class='alert alert-error'>" . $errores[$campo] . "</div>";
        }
        return $alerta;
    }

    public static function deleteError() {
        if (isset($_SESSION['errores'])) {
            $_SESSION['errores'] = null;
            unset($_SESSION['errores']);
            $borrado = true;
        }
        
         if (isset($_SESSION['erroresProducto'])) {
            $_SESSION['erroresProducto'] = null;
            unset($_SESSION['erroresProducto']);
            $borrado = true;
        }
    }

    public static function isAdmin() {

        if (!isset($_SESSION['admin'])) {
            header("Location:" . base_url);
        } else {
            return true;
        }
    }
    
     public static function isIdentity() {

        if (!isset($_SESSION['identity'])) {
            header("Location:" . base_url);
        } else {
            return true;
        }
    }
    
    public static function showCategorias(){
        require_once 'models/Categoria.php';
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        return $categorias;
    }
    
    public static function showProducto($id){
        require_once 'models/Producto.php';
        $producto = new Producto();
        $producto = $producto->getProduct($id);
        return $producto;
    }
    
    public static function statsCarrito(){
        $stats = array(
            'count' => 0,
            'total' => 0
        );
               
        if(isset($_SESSION['carrito'])){
            foreach($_SESSION['carrito'] as $elemento){
                $stats['count'] += $elemento['unidades'];
                $stats['total'] += $elemento['unidades'] * $elemento['producto']->precio;
            }
        }
        
        return $stats;
    }
    
    public static function showStatus($status){
        $value = 'Pendiente';
        if($status == 'confirm'){
            $value = 'Pendiente';
        }elseif($status == 'preparation'){
            $value = 'En preparación';
        }elseif($status == 'ready'){
            $value = 'Preparado para enviar';
        }elseif($status == 'sended'){
            $value = 'Enviado';
        }
        return $value;
    }

}
