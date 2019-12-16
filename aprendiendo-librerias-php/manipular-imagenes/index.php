<?php

require_once '../vendor/autoload.php';

// Directorio de la imagen,
$foto_original = 'mifoto.jpg';
$guardar_en = 'fotomodificada.png';

// Creando el objeto a partir de la libreria.
$thumb = new PHPThumb\GD($foto_original);

// Redimensionar la imagen.
$thumb->resize(250,250);

// Recortar la imagen.
//$thumb->crop(50, 50, 120, 120);
$thumb->cropFromCenter(100, 200);


$thumb->show();
$thumb->save($guardar_en,'png');



