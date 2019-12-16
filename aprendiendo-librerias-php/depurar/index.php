<?php

require_once '../vendor/autoload.php';

// Depurador de consola para PHP

$frutas = array("manzanas","naranjas","sandias");
\FB::log($frutas);

echo "Hola mundo";
\FB::log($frutas);
\FB::log("Muestra en consola");