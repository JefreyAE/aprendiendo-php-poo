<?php

class Persona {
    
    public $nombre;
    public $apellidos;
    public $altura;
    public $edad;
    
    public function getNombre(){
        return $this->nombre;
    }
    
    public function getApellidos() {
        return $this->apellidos;
    }

    public function getAltura() {
        return $this->altura;
    }

    public function getEdad() {
        return $this->edad;
    }
    
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    public function setAltura($altura) {
        $this->altura = $altura;
    }

    public function setEdad($edad) {
        $this->edad = $edad;
    }

    public function hablar(){
        return "Estoy hablando.";
    }
    
    public function caminar(){
        return "Estoy caminando.";
    }
      
}

class Informatico extends Persona{
    
    public $lenguajes;
    public $experienciaProgramador;
    
    public function __construct() {
        $this->lenguajes = "HTML, CSS";
        $this->experienciaProgramador = 10;
    }
    
    public function sabeLenguajes($lenguajes){
        $this->lenguajes = $lenguajes;
        
        return $this->lenguajes;
    }
    
    public function getLenguajes(){
        return $this->lenguajes;
    }
    
    public function setLenguajes($lenguajes){
        $this->lenguajes = $lenguajes;
    }
    
    public function programar(){
        return "Programa";
    }
    
    public function repararOrdenador(){
        return "Reparar";
    }
    
    public function  hacerOfimatica(){
        return "Ofimatica";
    }
    
    
}

//Heredar constructores
class TecnicoRedes extends Informatico{
    public $testearRedes;
    public $experienciaRedes;
    
    public function __construct() {
        parent::__construct();
        
        $this->testearRedes = "Experto";
        $this->experienciaRedes = 5;
    }

    public function auditoria(){
        return "Auditando";
    }
}