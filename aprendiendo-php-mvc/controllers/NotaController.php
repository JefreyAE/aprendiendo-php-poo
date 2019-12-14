<?php

class NotaController{
    
    public function listar(){
        require_once 'models/nota.php';
        
        //Lógica de la acción del controlador.
        $nota = new Nota();
        $nota->setNombre("Pedro");
        $nota->setContenido("Hola mundo desde php");
        
        // Llamada a la vista.
        require_once 'views/nota/listar.php';
    }
    
    public function crear(){
        
    }
    
    public function borrar(){
        
    }
    
    public function conseguirTodos(){
        return "sacando usuarios";
    }
}

