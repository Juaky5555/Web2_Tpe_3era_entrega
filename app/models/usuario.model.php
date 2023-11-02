<?php
include_once './config/config.php';

class modeloUsuarios{
    protected $db;
    public function __construct() {
        $this->db = new PDO(
        "mysql:host=".DB_HOST
        .";charset=utf8", 
        DB_USER, DB_PASS);
        $this->db->query("CREATE DATABASE IF NOT EXISTS db_veterinaria");
        $this->db->query("USE db_veterinaria");
        $this->_deploy();
    }

    public function _deploy() {
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();
        if(count($tables) == 0) {
            // Se accede a una version del sql sin imagenes, porque la version con imagenes es demasiado pesada
            $sql = file_get_contents("./sql/db_veterinaria_sin_imagenes.sql");
            $this->db->query($sql);
        }
    }
    
    public function obtenerUsuarioPorNombre($usser) {
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE usuario = ?'); 
        $query->execute([$usser]);
        $usuario = $query->fetch(PDO::FETCH_OBJ);
        return $usuario;
    }
}