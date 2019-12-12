<?php

// Definir una clase
 class Coche{
     
    public $color; // Desde cualquier lugar
    protected $marca; //Se pueden acceder desde la clase que los define
                      //y desde clases que hereden esta clase.
    private $modelo;  //Unicamente desde esta clase.
    
    
    public $velocidad;
    public $caballaje;
    public $plazas;
    
    
    public function __construct($color, $marca, $modelo, $velocidad, $caballaje, $plazas) {
        $this->color = $color;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->velocidad = $velocidad;
        $this->caballaje = $caballaje;
        $this->plazas = $plazas;
    }
    
    public function getColor(){
        return $this->color;
    }
    public function setColor($color){
        $this->color = $color;
    }
    
    public function setMarca($marca){
        $this->marca = $marca;
    }
    
    public function acelerar(){
        $this->velocidad++;
    }
    
    public function frenar(){
        $this->velocidad--;          
    }
    
    public function getVelocidad(){
        return $this->velocidad;
    }
    
    public function setModelo($modelo){
        $this->modelo = $modelo;
    }
    
    public function getModelo(){
        return $this->modelo;
    }
    
    public function mostrarInformacion(Coche $miObjeto){
        
        if(is_object($miObjeto)){
            $informacion = "<h1>Informacion del coche</h1><br/>";
            $informacion .="Color: ".$miObjeto->color."<br/>";
            $informacion .="Modelo: ".$miObjeto->modelo."<br/>";
            $informacion .="Velocidad: ".$miObjeto->velocidad."<br/>";
        }else{
            $informacion = "Tu dato es: ".$miObjeto;
        }
        return $informacion;
    }
}// Fin de la clase
