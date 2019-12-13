<?php

require_once 'clases.php';

$persona = new Persona();


$informatico = new Informatico();
var_dump($informatico);



$tecnico = new TecnicoRedes();
$tecnico->setNombre("Paco");
var_dump($tecnico);