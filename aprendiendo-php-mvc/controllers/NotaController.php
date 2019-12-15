<?php

class NotaController{
    
    
    public function listar(){
        require_once 'models/nota.php';
        
        //Lógica de la acción del controlador.
        $nota = new Nota();    
        $notas = $nota->conseguirTodos("notas");
        
        
        // Llamada a la vista.
        require_once 'views/nota/listar.php';
    }
    
    public function crear(){
        require_once 'models/nota.php';
        
        $nota = new Nota();
        $nota->setUsuario_id(1);
        $nota->setTitulo("Nota desde MVX");
        $nota->setDescripcion("Descripcion de la nota.");
        
        $guardar = $nota->guardar();
        // Para revisar errores
        // echo $nota->db->error;
        
        header("Location: index.php?controller=Nota&action=listar");
    }
    
    public function borrar(){
        
    }
    
    
}

