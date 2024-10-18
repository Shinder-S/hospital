<?php

class ModeloCitas {

    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=hospital;charset=utf8', 'root', '');
    }

   public function obtenerCitas(){
        $query = $this->db ->prepare('SELECT c.*, p.nombre, p.apellido FROM citas c 
                                     JOIN pacientes p ON c.paciente_id = p.id');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
   }

    public function obtenerCitasPorPaciente($paciente_id) {
        $query = $this->db->prepare("SELECT * FROM citas WHERE paciente_id = ?");
        $query->execute([$paciente_id]);
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function crearCita($paciente_id, $fecha, $hora){
        $query = $this->db->prepare('INSERT INTO citas (paciente_id, fecha, hora) VALUES (?, ?, ?)');
        $query->execute([$paciente_id, $fecha, $hora]);
        return $this->db->lastInsertId();
    }

    public function editarCita($paciente_id, $fecha, $hora, $id){
        $query = $this->db->prepare('UPDATE citas SET paciente_id=?, fecha=?, hora=? WHERE id=?');
        $query->execute([$paciente_id, $fecha, $hora, $id]);
    }

    public function eliminarCita($id){
        $query = $this->db->prepare('DELETE FROM citas WHERE id=?');
        $query->execute([$id]);
    }
}
