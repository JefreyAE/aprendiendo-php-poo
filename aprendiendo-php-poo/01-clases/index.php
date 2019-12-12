<h1>Carga<h1/>
<?php

// Clases Metodos y Objetos

// Programacion orientada a objetos en php

// Definir una clase
 class Coche{
    public $color = "Rojo";
    public $marca = "Ferrari";
    public $modelo = "Aventador";
    public $velocidad = 300;
    public $caballaje = 500;
    public $plazas = 2;
    
    public function getColor(){
        return $this->color;
    }
    public function setColor($color){
        $this->color = $color;
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
    
    
}// Fin de la clase

//Crear un objeto o instanciar la clase

$coche = new Coche();
$coche2 = new Coche();

//Usar un metodo

echo "Velocidad: ".$coche->getVelocidad();

$coche->setColor("verde");
$coche->setModelo("Murcielago");
echo "<br/>";

echo "Color: ".$coche->getColor();
echo "<br/>";

$coche->acelerar();
$coche->acelerar();
$coche->acelerar();

$coche2->setColor("colorado");

var_dump($coche);
var_dump($coche2);