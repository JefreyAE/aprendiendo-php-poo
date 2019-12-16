<?php

require_once '../vendor/autoload.php';

// Conexión a la base de datos.
$conexion = new mysqli("localhost","root","","notas_master");
$conexion->query("SET NAMES 'utf-8'");

// Consulta para contar el número de elementos totales.
$consulta = $conexion->query("SELECT COUNT(id) as 'total' FROM notas");
$numero_elementos = $consulta->fetch_object()->total;
$numero_elementos_pagina = 2;
//var_dump($numero_elementos);

// Hacer la paginación
$pagination = new Zebra_Pagination();

// Número total de elementos a paginar
$pagination->records($numero_elementos);

// Número de elementos por pagina.
$pagination->records_per_page($numero_elementos_pagina);

$page = $pagination->get_page();
$empieza = ($page-1)*$numero_elementos_pagina;

$sql = "SELECT * FROM notas LIMIT $empieza, $numero_elementos_pagina";
$notas = $conexion->query($sql);

 echo '<link rel="stylesheet" href="../vendor/stefangabos/zebra_pagination/public/css/zebra_pagination.css" type="text/css">';
while($nota=$notas->fetch_object()){
    echo "<h1>$nota->titulo</h1>";
    echo "<h3>$nota->descripcion</h3>";
}

$pagination->render();