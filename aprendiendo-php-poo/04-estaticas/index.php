<?php

require_once 'configuracion.php';

Configuracion::setColor("blue");
Configuracion::setEntorno("localhost");
Configuracion::setNewsletter(true);

echo Configuracion::$color."<br/>";
echo Configuracion::$entorno."<br/>";
echo Configuracion::$newsletter."<br/>";

// Se puede instanciar tambien.

$configuracion = new Configuracion();
$configuracion::$color = "rojo";
echo $configuracion::$color;
var_dump($configuracion);
