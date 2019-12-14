<?php

// Capturar excepciones en código suceptible a errores.
try{
    if(isset($_GET['id'])){
        echo "<h1>El parametro es {$_GET['id']}.</h1";
    }else{
        throw new Exception('El parametro no a llegado.');
    }
} catch (Exception $e) {
    echo "Ha habido un error: ".$e->getMessage();
}
