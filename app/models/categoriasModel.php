<?php
include_once './config/config.php';

class categoriasModel{
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
    

    function obtenerCategorias() {
        $query = $this->db->prepare('SELECT * FROM especies');
        $query->execute();
        
        $especie = $query->fetchAll(PDO::FETCH_OBJ);
        return $especie;
    }

    function insertarCategoria($especie, $descripcion) {
        $query = $this->db->prepare('INSERT INTO especies (especie, descripcion) VALUES(?,?)');
        $query->execute([$especie, $descripcion]);
        return $this->db->lastInsertId();
    }

    function borrarCategoria($id_especie) {
        $query = $this->db->prepare('DELETE FROM especies WHERE id_especie = ?');
        $query->execute([$id_especie]);
    }

    function seleccionarEspecie($id_especie) {
        $query = $this->db->prepare('SELECT * FROM especies WHERE id_especies = ?');
        $query->execute([$id_especie]);
        $especie = $query->fetch(PDO::FETCH_OBJ);
        return $especie;
    }
    
    function modificarCategoria($especie, $descripcion, $id_especie){
        $query = $this->db->prepare('UPDATE especies SET especie = ?, descripcion = ? WHERE id_especie = ?');
        $query->execute([$especie, $descripcion, $id_especie]);
    }

    function obtenerCategoriaPorId($id_especie){
        $query = $this->db->prepare('SELECT * FROM especies WHERE id_especie = ?');
        $query->execute([$id_especie]);
        $animales = $query->fetch(PDO::FETCH_OBJ);
        return $animales;
    }

}
?>