<?php

class Utils {

    public static function deleteSession($name) {
        if (isset($_SESSION[$name])) {
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }
        return $name;
    }

    public static function showError($errores, $campo) {
        $alerta = '';
        if (isset($errores[$campo]) && !empty($campo)) {
            $alerta = "<div class='alert alert-error'>" . $errores[$campo] . "</div>";
        }
        return $alerta;
    }

    public static function deleteError() {
        if (isset($_SESSION['errores'])) {
            $_SESSION['errores'] = null;
            unset($_SESSION['errores']);
            $borrado = true;
        }
    }

    public static function isAdmin() {

        if (!isset($_SESSION['admin'])) {
            header("Location:" . base_url);
        } else {
            return true;
        }
    }
    
    public static function showCategorias(){
        require_once 'models/Categoria.php';
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        return $categorias;
    }

}
