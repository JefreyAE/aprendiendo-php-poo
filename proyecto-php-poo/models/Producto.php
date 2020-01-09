<?php

class Producto{
    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;
    private $db;
    
    public function __construct() {
        $this->db = Database::connect();
    }
    
    function getId() {
        return $this->id;
    }

    function getCategoria_id() {
        return $this->categoria_id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getStock() {
        return $this->stock;
    }

    function getOferta() {
        return $this->oferta;
    }

    function getFecha() {
        return $this->fecha;
    }

    function getImagen() {
        return $this->imagen;
    }

    function setId($id) {
        $this->id = $this->db->real_escape_string($id);
    }

    function setCategoria_id($categoria_id) {
        $this->categoria_id = $this->db->real_escape_string($categoria_id);
    }

    function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    function setPrecio($precio) {
        $this->precio = $this->db->real_escape_string($precio);
    }

    function setStock($stock) {
        $this->stock = $this->db->real_escape_string($stock);
    }

    function setOferta($oferta) {
        $this->oferta = $this->db->real_escape_string($oferta);
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    function setImagen($imagen) {
        $this->imagen = $imagen;
    }
    
    public function getAll(){      
        $sql = "SELECT * FROM productos ORDER BY id DESC;";
        $products = $this->db->query($sql);
        return $products;
    }
    
    public function getProduct($id){      
        $sql = "SELECT * FROM productos WHERE id=$id;";
        $product = $this->db->query($sql);
        return $product;
    }
    
    public function getProductsByCategoria($id){      
        $sql = "SELECT p.*, c.nombre AS cat_nombre FROM productos p "
               ."INNER JOIN categorias c ON c.id=p.categoria_id "
               ."WHERE categoria_id=$id "
               ."ORDER BY id DESC";
        $product = $this->db->query($sql);
        return $product;
    }
    
    public function getRandom($limit){
        $sql = "SELECT * FROM productos ORDER BY RAND() LIMIT $limit;";
        $products = $this->db->query($sql);
        return $products;               
    }
    
    public function save(){                                                                  
        $sql = "INSERT INTO productos VALUES (null,'$this->categoria_id','$this->nombre','$this->descripcion','$this->precio','$this->stock','$this->oferta',CURDATE(),'$this->imagen');";
        $save = $this->db->query($sql);
        
        // Para revisar errores en la consulta.
        // echo $this->db->error;
        // die();
        
        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }
    public function edit(){
        $sql = "UPDATE productos SET nombre='$this->nombre',descripcion='$this->descripcion', categoria_id='$this->categoria_id', precio='$this->precio', stock='$this->stock', oferta='$this->oferta',fecha=CURDATE()";
       
        
        if($this->getImagen() != null){
            $sql .= ", imagen='{$this->getImagen()}' ";
        }
        
        $sql .=" WHERE id='{$this->id}';";
        /*echo $this->db->error;
        echo $sql;
        die();*/
         
        $update = $this->db->query($sql);
        
        $result = false;
        if($update){
            $result = true;
        }
        return $result;
    }
    public function delete(){
        $sql = "DELETE FROM productos WHERE id='$this->id'";
        $delete = $this->db->query($sql);
        
        $result = false;
        if($delete){
            $result = true;
        }
        return $result;
    }


}
