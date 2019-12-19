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
        $this->nombre = $nombre;
    }

    public function getAll(){
        
        $sql = "SELECT * FROM categorias;";
        $categorias = $this->db->query($sql);
        return $categorias;
    }
    
    
}