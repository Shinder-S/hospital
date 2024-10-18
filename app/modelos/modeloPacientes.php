<?php
class ModeloPacientes {
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=hospital;charset=utf8', 'root', '');
    }

    public function obtenerPacientes(){
        $query = $this->db->prepare('SELECT * FROM pacientes');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function obtenerPacientePorId($id){
        $query = $this->db->prepare('SELECT * FROM pacientes WHERE id=?');
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function insertarPaciente($nombre, $apellido, $foto){
        $query = $this->db->prepare('INSERT INTO pacientes (nombre, apellido, foto) VALUES (?, ?, ?)');
        $query->execute([$nombre, $apellido, $foto]);
        return $this->db->lastInsertId();
    }

    public function editarPaciente($id, $nombre, $apellido, $foto){
        $query = $this->db->prepare('UPDATE pacientes SET nombre=?, apellido=?, foto=? WHERE id=?');
        $query->execute([$nombre, $apellido, $foto, $id]);
    }
    public function actualizarPaciente($id, $nombre, $apellido,$foto){
        $query = $this->db->prepare('UPDATE pacientes SET nombre = ?, apellido = ?,foto = ? WHERE id = ?');
        $query->execute([$nombre, $apellido, $foto, $id]);
    }

    public function eliminarPaciente($id){
        $query = $this->db->prepare('DELETE FROM pacientes WHERE id=?');
        $query->execute([$id]);
    }
}


