<?php

class Usuario{
    
    public $nombre;
    public $email;
    
    public function __construct() {
        $this->nombre = "Jefrey";
        $this->email = "jefariasbj.com";
        echo "Creando el objeto.<br/>";
    }
    
    public function __destruct() {
        echo "Destruyendo el objeto.";
    }
    
    public function __toString() {
        return "Hola {$this->nombre} este es tu email: {$this->email}"."<br/>";
    }
}

$usuario = new Usuario();

echo $usuario;

