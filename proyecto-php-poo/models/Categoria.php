<?php

class Categoria{
    
    private $id;
    private $nombre;
    
    //Conexion a la base de datos;
    private $db;
    
    public function __construct() {
        $this->db = Database::connect();
    }
    
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    public function getAll(){
        
        $sql = "SELECT * FROM categorias ORDER BY id DESC;";
        $categorias = $this->db->query($sql);
        return $categorias;
    }
    
     public function getCategoria($id){        
        $sql = "SELECT * FROM categorias WHERE id='$id';";
        $categoria = $this->db->query($sql);
        return $categoria->fetch_object();
    }
    
    public function save(){
        $sql = "INSERT INTO categorias VALUES(null,'$this->nombre');";
        $save = $this->db->query($sql);
        
        $result = false;
        if($save){
            $result = true;
        }   
        return $result;
    }
}