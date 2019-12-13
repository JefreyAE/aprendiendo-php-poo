<?php

abstract class Ordenador{
    
    public $encendido;
    
    abstract public function encender();
    
    public function apagar(){
        $this->encendido = false;
    }
   
}

class PcAsus extends Ordenador{
    public $software;
    public $encendido;
    
    public function encender(){
        $this->encendido = true;
    }
    
    public function arrancarSoftware(){
        $this->software = true;
    }
}

$ordenador = new PcAsus();

$ordenador->arrancarSoftware();
$ordenador->encender();
$ordenador->apagar();
var_dump($ordenador);