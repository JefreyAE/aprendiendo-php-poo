<?php

require_once 'models/Pedido.php';

class PedidoController {

    public function index() {

        require_once 'views/pedido/index.php';
    }

    public function add() {
        if (isset($_POST) && isset($_SESSION['identity'])) {

            $usuario_id = $_SESSION['identity']->id;
            $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
            $canton = isset($_POST['canton']) ? $_POST['canton'] : false;
            $distrito = isset($_POST['distrito']) ? $_POST['distrito'] : false;
            $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;

            $stats = Utils::statsCarrito();
            $coste = $stats['total'];
            $estado = '';

            // Array de errores 
            $errores = Array();

            // Validar los datos antes de guardarlos en la base de datos.

            if (!empty($provincia) && !is_numeric($provincia) && !preg_match("/[0-9]/", $provincia)) {
                $_SESSION['loadprovincia'] = $provincia;
            } else {
                $errores['provincia'] = "La provincia no es válida.";
            }

            if (!empty($canton) && !is_numeric($canton) && !preg_match("/[0-9]/", $canton)) {
                $_SESSION['loadcanton'] = $canton;
            } else {
                $errores['canton'] = "El nombre del cantón no es válido.";
            }

            if (!empty($distrito) && !is_numeric($distrito) && !preg_match("/[0-9]/", $distrito)) {
                $_SESSION['loaddistrito'] = $distrito;
            } else {
                $errores['distrito'] = "El nombre del distrito no es válido.";
            }

            if (!empty($localidad) && !is_numeric($localidad) && !preg_match("/[0-9]/", $localidad)) {
                $_SESSION['loadlocalidad'] = $localidad;
            } else {
                $errores['localidad'] = "El nombre de la localidad no es válido.";
            }

            if (!empty($direccion)) {
                $_SESSION['loaddireccion'] = $direccion;
            } else {
                $errores['direccion'] = "La direccion no es válida.";
            }

            $guardar_pedido = false;
            if (count($errores) == 0) {

                $pedido = new Pedido();
                $pedido->setUsuario_id($usuario_id);
                $pedido->setProvincia($provincia);
                $pedido->setCanton($canton);
                $pedido->setDistrito($distrito);
                $pedido->setLocalidad($localidad);
                $pedido->setDireccion($direccion);
                $pedido->setCoste($coste);
                $pedido->setEstado($estado);

                $save = $pedido->save();

                //Guardar linea pedido
                $save_linea = $pedido->save_linea();

                if ($save && $save_linea) {
                    $_SESSION['pedido'] = "complete";
                    Utils::deleteSession('loadprovincia');
                    Utils::deleteSession('loadcanton');
                    Utils::deleteSession('loaddistrito');
                    Utils::deleteSession('loadlocalidad');
                    Utils::deleteSession('loaddireccion');
                    header("Location: " . base_url . "Pedido/confirmado");
                } else {
                    $_SESSION['pedido'] = "failed";
                }
            } else {
                $_SESSION['errores'] = $errores;
                $_SESSION['pedido'] = "failed";
                header("Location: " . base_url . "Pedido/index");
            }
        } else {
            $_SESSION['pedido'] = "failed";
            header("Location: " . base_url . "Pedido/index");
        }
    }

    public function confirmado() {
        if (isset($_SESSION['identity'])) {
            $id = $_SESSION['identity']->id;
            $pedido = new Pedido();
            $pedido = $pedido->getPedidoByUser($id);
            $pro = new Pedido();
            $lista_productos = $pro->getProductosByPedido($pedido->id);
        }

        require_once 'views/pedido/confirmado.php';
    }

    public function mis_pedidos() {
        Utils::isIdentity();
        $gestion = false;
        $pedidos = new Pedido();
        $lista_pedidos = $pedidos->getPedidosByUser($_SESSION['identity']->id);


        require_once 'views/pedido/mis_pedidos.php';
    }

    public function detalle() {
        Utils::isIdentity();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $pedido = new Pedido();
            $pedido = $pedido->getPedido($id)->fetch_object();
            $pro = new Pedido();
            $lista_productos = $pro->getProductosByPedido($id);
        } else {
            header("Location: " . base_url . 'Pedido/mis_pedidos');
        }

        require_once 'views/pedido/detalle.php';
    }

    public function gestion() {
        Utils::isAdmin();
        $gestion = true;
        $pedidos = new Pedido();
        $lista_pedidos = $pedidos->getAll();
 
        require_once 'views/pedido/mis_pedidos.php';
    }
    
    public function estado(){
        Utils::isAdmin();
        if(isset($_POST)){
            $pedido = new Pedido();
            $pedido->edit($_POST['pedido_id'], $_POST['estado']);
            header("Location:".base_url."Pedido/detalle&id={$_POST['pedido_id']}");
        }else{
            
        }
    }

}
