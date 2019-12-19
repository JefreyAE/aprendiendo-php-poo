<?php

require_once 'models/Usuario.php';

class UsuarioController {

    public function index() {
        echo "Controlador Usuario, Accion Index.";
    }

    public function registro() {
        require_once 'views/usuario/registro.php';
    }

    public function save() {
        if (isset($_POST)) {
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            // Array de errores 
            $errores = Array();

            // Validar los datos antes de guardarlos en la base de datos.
            // Validar campo nombre
            if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
                $_SESSION['loadname'] = $nombre;
            } else {
                $errores['nombre'] = "El nombre no es válido.";
            }

            // Validar apellidos
            if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)) {
                $_SESSION['loadapellidos'] = $apellidos;
            } else {               
                $errores['apellidos'] = "Los apellidos no son válidos.";
            }

            // Validar el email
            if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['loademail'] = $email;
            } else {
                $errores['email'] = "El correo no es válido.";
            }

            // Validar contraseña
            if (!empty($password)) {
                $_SESSION['loadpassword'] = $password;
            } else {
                $errores['password'] = "El password esta vacio.";
            }

            $guardar_usuario = false;
            if (count($errores) == 0) {
                $usuario = new Usuario;
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($password);

                $save = $usuario->save();

                if($save){
                    $_SESSION['register'] = "complete";
                    Utils::deleteSession('loadname');
                    Utils::deleteSession('loadapellidos');
                    Utils::deleteSession('loadpassword');
                    Utils::deleteSession('loademail');
                }else{
                    $_SESSION['register'] = "failed";
                }
            }else{
                $_SESSION['errores'] = $errores;
            }
        } else {
            $_SESSION['register'] = "failed";
        }

        header("Location: " . base_url . "Usuario/registro");
    }
    
    public function login(){
        if(isset($_POST)){
            //Identificar al usuario.          
            //Consulta sql.
            $usuario = new Usuario();
            $usuario->setEmail(trim($_POST['email']));
            $usuario->setPassword(trim($_POST['password']));
            $identity = $usuario->login();   
            //Crear una session.
      
            if($identity && is_object($identity)){
                $_SESSION['identity'] = $identity;
                
                if($identity->rol == 'admin'){
                    $_SESSION['admin'] = true;
                }       
            }else{
                $_SESSION['error_login'] = "Identificación fallida.";
            }        
        }
        header("Location:".base_url);
    }
    
    public function logout(){
        if(isset($_SESSION['identity'])){
            Utils::deleteSession('identity');
        }
         if(isset($_SESSION['admin'])){
            Utils::deleteSession('admin');
        }
        header("Location:".base_url);
    }

}
