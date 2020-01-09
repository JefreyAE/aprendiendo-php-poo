<?php

//require_once 'models/Carrito.php';
require_once 'models/Producto.php';

class CarritoController {

    public function index() {
        require_once 'views/carrito/index.php';
    }

    public function add() {
        if (isset($_GET['id'])) {
            $producto_id = $_GET['id'];
        } else {
            header("Location:" . base_url);
        }

        if (isset($_SESSION['carrito'])) {
            $counter = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['id_producto'] == $producto_id) {
                    $_SESSION['carrito'][$indice]['unidades']++;
                    $counter++;
                }
            }
        }
        if (!isset($counter) || $counter == 0) {
            $producto = new Producto();
            $producto = $producto->getProduct($producto_id)->fetch_object();
            if (is_object($producto)) {
                $_SESSION['carrito'][] = array(
                    "id_producto" => $producto->id,
                    "precio" => $producto->precio,
                    "unidades" => 1,
                    "producto" => $producto
                );
            }
        }
        header('Location:' . base_url . "Carrito/index");
    }

    public function remove() {
        if(isset($_SESSION['carrito']) && isset($_GET['indice'])){
            $indice = $_GET['indice'];
            unset($_SESSION['carrito'][$indice]);
        }
        header('Location:' . base_url . "Carrito/index");
    }

    public function delete_all() {
        unset($_SESSION['carrito']);
        header('Location:' . base_url . "Carrito/index");
    }
    
    public function up(){
        if(isset($_SESSION['carrito']) && isset($_GET['indice'])){
            $indice = $_GET['indice'];
            $_SESSION['carrito'][$indice]['unidades']++;
        }
        header('Location:' . base_url . "Carrito/index");
    }
    
    public function down(){
        if(isset($_SESSION['carrito']) && isset($_GET['indice'])){
            $indice = $_GET['indice'];
            $_SESSION['carrito'][$indice]['unidades']--;
            if($_SESSION['carrito'][$indice]['unidades']==0){
                unset($_SESSION['carrito'][$indice]);
            }
        }
        header('Location:' . base_url . "Carrito/index");
    }
    

}
