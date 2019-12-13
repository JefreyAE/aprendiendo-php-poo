<?php

require_once 'Usuario.php';

// Acceder a la constante. Como instancia
$usuario = new Usuario();
echo $usuario::URL_COMPLETA;
var_dump($usuario);

// Sin instanciar.

echo Usuario::URL_COMPLETA;
