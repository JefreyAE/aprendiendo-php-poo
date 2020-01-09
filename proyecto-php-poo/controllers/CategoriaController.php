<?php

require_once 'models/Categoria.php';
require_once 'models/Producto.php';

class CategoriaController {

    public function index() {
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getAll();

        require_once 'views/categoria/index.php';
    }
    
    public function ver(){
        if(isset($_GET['id'])){
            $cat = new Categoria();
            $products = new Producto();
            $categoria = $cat->getCategoria($_GET['id']);
            $listProducts = $products->getProductsByCategoria($_GET['id']);
        }
        require_once('views/categoria/ver.php');
    }

    public function create() {
        Utils::isAdmin();
        require_once 'views/categoria/create.php';
    }

    public function save() {
        Utils::isAdmin();
        
        //Guardar a categoria.
        if(isset($_POST) && isset($_POST['nombre'])){
            $categoria = new Categoria();
            $categoria->setNombre(trim($_POST['nombre']));
            $categoria->save();
        }
        
        header("Location:".base_url."Categoria/index");
        
    }

}
