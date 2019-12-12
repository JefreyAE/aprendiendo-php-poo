<?php

require_once 'coche.php';

$coche = new Coche("Amarillo","Renault","Clio", 150,200,5);
$coche1 = new Coche("Verde","Seat","Panda", 250,220,4);
//$coche->marca = "Audi"; Variable protected no se puede modificar.
$coche->setMarca("Toyota");

echo $coche->mostrarInformacion($coche1);

// var_dump($coche);


