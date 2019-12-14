<?php
namespace MisClases;

class Usuario{
    
    public $nombre;
    public $email;
    
    public function __construct() {
        $this->nombre = "Jefrey";
        $this->email = "jef.com";
    }
}
