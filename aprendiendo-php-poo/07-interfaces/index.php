<?php

interface ordenador{
    public function encender();
    public function apagar();
    public function reiniciar();
    public function defragmentar();
    public function detectarUSB();
}

class iMac implements ordenador{
    
    private $modelo;
    
    function getModelo() {
        return $this->modelo;
    }

    function setModelo($modelo) {
        $this->modelo = $modelo;
    }  
    
    public function encender(){
        
    }
    public function apagar(){
        
    }
    public function reiniciar(){
        
    }
    public function defragmentar(){
        
    }
    public function detectarUSB(){
        
    }
}

$maquintos = new iMac();
$maquintos->setModelo("Cualquiera");
echo $maquintos->getModelo();
//var_dump($maquintos);