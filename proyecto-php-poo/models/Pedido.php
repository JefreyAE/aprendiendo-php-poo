<?php

class Pedido {

    private $id;
    private $usuario_id;
    private $provincia;
    private $canton;
    private $distrito;
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;
    //Conexion a la base de datos.
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    function getId() {
        return $this->id;
    }

    function getUsuario_id() {
        return $this->usuario_id;
    }

    function getProvincia() {
        return $this->provincia;
    }

    function getCanton() {
        return $this->canton;
    }

    function getDistrito() {
        return $this->distrito;
    }

    function getLocalidad() {
        return $this->localidad;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function getCoste() {
        return $this->coste;
    }

    function getEstado() {
        return $this->estado;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getHora() {
        return $this->hora;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUsuario_id($usuario_id) {
        $this->usuario_id = $usuario_id;
    }

    function setProvincia($provincia) {
        $this->provincia = $this->db->real_escape_string($provincia);
    }

    function setCanton($canton) {
        $this->canton = $this->db->real_escape_string($canton);
    }

    function setDistrito($distrito) {
        $this->distrito = $this->db->real_escape_string($distrito);
    }

    function setLocalidad($localidad) {
        $this->localidad = $this->db->real_escape_string($localidad);
    }

    function setDireccion($direccion) {
        $this->direccion = $this->db->real_escape_string($direccion);
    }

    function setCoste($coste) {
        $this->coste = $coste;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setHora($hora) {
        $this->hora = $hora;
    }

    public function save() {
        $sql = "INSERT INTO pedidos VALUES (null,'{$this->usuario_id}','{$this->provincia}','{$this->canton}','{$this->distrito}','{$this->localidad}','{$this->direccion}',{$this->coste},'confirm', CURDATE(), CURTIME());";
        $save = $this->db->query($sql);

        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function getAll() {
        $sql = "SELECT * FROM pedidos ORDER BY id DESC;";
        $pedido = $this->db->query($sql);
        return $pedido;
    }

    public function getPedido($id) {
        $sql = "SELECT * FROM pedidos WHERE id=$id;";
        $pedido = $this->db->query($sql);
        return $pedido;
    }

    public function getPedidoByUser($id) {
        $sql = "SELECT p.id, p.coste FROM pedidos p "
                //."INNER JOIN lineas_pedidos lp ON lp.pedido_id = p.id "
                . "WHERE p.usuario_id={$id} ORDER BY id DESC LIMIT 1";
        $pedido = $this->db->query($sql);
        /*echo $sql;
        echo $this->db->error;
        var_dump($pedido);
        die();*/
        return $pedido->fetch_object();
    }
    
    public function getPedidosByUser($id) {
        $sql = "SELECT p.* FROM pedidos p "
                //."INNER JOIN lineas_pedidos lp ON lp.pedido_id = p.id "
                . "WHERE p.usuario_id={$id} ORDER BY id DESC ";
        $pedido = $this->db->query($sql);
        /*echo $sql;
        echo $this->db->error;
        var_dump($pedido);
        die();*/
        return $pedido;
    }
    
    

    public function getProductosByPedido($id) {
        $sql = "SELECT p.*, lp.unidades FROM productos p"
                . " INNER JOIN lineas_pedidos lp ON lp.producto_id = p.id"
                . " WHERE lp.pedido_id = {$id}";
        /*$sql = "SELECT * FROM productos WHERE id IN"
                . " (SELECT producto_id FROM lineas_pedidos WHERE pedido_id='{$id}')";
        */
        $productos = $this->db->query($sql);

        /*echo $sql;
        echo $this->db->error;
        var_dump($productos);
        die();
        */
        return $productos;
    }

    public function save_linea() {
        $sql = "SELECT LAST_INSERT_ID() AS 'pedido';";
        $query = $this->db->query($sql);
        $pedido_id = $query->fetch_object()->pedido;


        if (isset($_SESSION['carrito'])) {
            foreach ($_SESSION['carrito'] as $elemento) {
                $producto = $elemento['producto'];
                $insert = "INSERT INTO lineas_pedidos VALUES (NULL,{$pedido_id},{$producto->id},{$elemento['unidades']});";
                $save = $this->db->query($insert);

                //Para revisar errores
                /* echo $this->db->error
                  die();
                 */
            }
        }
        $result = false;
        if ($save) {
            $result = true;
        }

        return $result;
    }
    
    public function edit($id,$estado){
        $sql = "UPDATE pedidos SET estado='{$estado}' WHERE id='{$id}'";
        $update = $this->db->query($sql);
        return $update;
    }

}
