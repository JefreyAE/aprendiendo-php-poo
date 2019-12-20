<?php

require_once 'models/Categoria.php';

class CategoriaController {

    public function index() {
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getAll();

        require_once 'views/categoria/index.php';
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
