<?php


class Usuario{
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $rol;
    private $image;
    
    //  Conexion a la base de datos;
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

    function getApellidos() {
        return $this->apellidos;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
    }

    function getRol() {
        return $this->rol;
    }

    function getImage() {
        return $this->image;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function setApellidos($apellidos) {
        $this->apellidos = $this->db->real_escape_string($apellidos);
    }

    function setEmail($email) {
        $this->email = $this->db->real_escape_string($email);
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setRol($rol) {
        $this->rol = $rol;
    }

    function setImage($image) {
        $this->image = $this->db->real_escape_string($image);
    }

    public function save(){
        $sql = "INSERT INTO usuarios VALUES (null,'{$this->nombre}','{$this->apellidos}','{$this->email}','{$this->getPassword()}','user', null);";
        $save = $this->db->query($sql);   
        
        $result = false;
        if($save){
            $result = true;
        } 
            return $result;        
    }
    
    public function login(){
        $result = false;
        
        //Comprobar si existe el usuario.   
        $sql = "SELECT * FROM usuarios WHERE email = '$this->email'";
        $login = $this->db->query($sql);
        
        if($login && $login->num_rows == 1){
            $usuario =$login->fetch_object();
            //Verificar la constraseña.
            $verify = password_verify($this->password, $usuario->password);
            
            if($verify){               
                $result = $usuario;
            }
        }else{
            $result = false;
        }     
        return $result;
    }
}
