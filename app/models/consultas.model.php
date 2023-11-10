<?php
include_once './config/config.php';
require_once './app/models/model.php';

class consultasModel extends model{
    
    function obtenerConsultas() {
        $query = $this->db->prepare('SELECT c.consulta, i.nombre FROM consultas c JOIN individuos i ON c.fk_id_individuo = i.id');
        $query->execute();
        
        $consulta = $query->fetchAll(PDO::FETCH_OBJ);
        return $consulta;
    }
    
    function obtenerConsultaPorID($id) {
        $query = $this->db->prepare('SELECT c.consulta, i.nombre FROM consultas c JOIN individuos i ON c.fk_id_individuo = i.id WHERE i.id = ?');
        $query->execute([$id]);
        $consulta = $query->fetch(PDO::FETCH_OBJ);
        return $consulta;
    }
    
    function insertarConsulta($consulta, $fk_id_individuo) {
        $query = $this->db->prepare('INSERT INTO consultas (consulta, fk_id_individuo) VALUES(?, ?)');
        $query->execute([$consulta, $fk_id_individuo]);
        return $this->db->lastInsertId();
    }

    function deleteConsulta($id) {
        $query = $this->db->prepare('DELETE FROM consultas WHERE id = ?');
        $query->execute([$id]);
    }

    function updateConsulta($id, $consulta, $fk_id_individuo){
        $query = $this->db->prepare('UPDATE consultas SET consulta = ?, fk_id_individuo = ? WHERE id = ?');
        $query->execute([$consulta, $fk_id_individuo, $id]);
    }
}
