<?php

class Persona{
    
    private $nombre;
    private $edad;
    private $ciudad;
    
    public function __construct($nombre, $edad, $ciudad) {
        $this->nombre = $nombre;
        $this->ciudad = $ciudad;
        $this->edad = $edad;
    }
    
    public function __call($name, $arguments){
        
        // Sección que hace la función de los getters.
        $prefix_metodo = substr($name,0,3);       
        if($prefix_metodo == 'get'){
            $nombre_metodo = substr(strtolower($name),3);
            if(!isset($this->$nombre_metodo)){
               return "El método que estas invocando no existe."; 
            }
            
            return $this->$nombre_metodo;
        }else{
            // Sección que hace la función de los setters.
             $prefix_metodo = substr($name,0,3);       
                if($prefix_metodo == 'set'){
                    $nombre_metodo = substr(strtolower($name),3);
                    if(!isset($this->$nombre_metodo)){
                       return "El método que estas invocando no existe."; 
                    }

                    $this->$nombre_metodo = $arguments[0];
                }else{
                    return "El método que estas invocando no existe."; 
                }
        }        
    }
}

$persona = new Persona("Juan",32,"San Jose");
echo $persona->getNombre()."</br>";
echo $persona->getCiudad()."</br>";
echo $persona->getEdad()."</br>";
echo $persona->getApellido()."</br>";

$persona->setNombre("Federico"); 
echo $persona->getNombre()."</br>";
$persona->setCualquierCosa("Federico"); 