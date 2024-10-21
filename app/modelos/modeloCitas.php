<?php

class ModeloCitas {

    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=hospital;charset=utf8', 'root', '');
    }

    // Obtener todas las citas, incluyendo el nombre y apellido del paciente
    public function obtenerCitas(){
        $query = $this->db->prepare('SELECT c.*, p.nombre, p.apellido FROM citas c 
                                     JOIN pacientes p ON c.paciente_id = p.id');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    // Obtener una cita específica por su ID
    public function obtenerCitaPorId($id) {
        $query = $this->db->prepare("SELECT * FROM citas WHERE id = ?");
        $query->execute([$id]);
        return $query->fetch(PDO::FETCH_OBJ);  // Devuelve un solo resultado
    }

    // Obtener todas las citas de un paciente
    public function obtenerCitasPorPaciente($paciente_id) {
        $query = $this->db->prepare("SELECT * FROM citas WHERE paciente_id = ?");
        $query->execute([$paciente_id]);
        return $query->fetchAll(PDO::FETCH_OBJ);  // Devuelve todas las citas del paciente
    }

    // Agregar una nueva cita
    public function agregarCita($paciente_id, $fecha, $hora){
        $query = $this->db->prepare('INSERT INTO citas (paciente_id, fecha, hora) VALUES (?, ?, ?)');
        $query->execute([$paciente_id, $fecha, $hora]);
        return $this->db->lastInsertId();  // Devuelve el ID de la nueva cita
    }

    // Actualizar una cita existente (edición)
    public function actualizarCita($id, $paciente_id, $fecha, $hora){
        $query = $this->db->prepare('UPDATE citas SET paciente_id=?, fecha=?, hora=? WHERE id=?');
        $query->execute([$paciente_id, $fecha, $hora, $id]);
    }

    // Eliminar una cita por su ID
    public function eliminarCita($id){
        $query = $this->db->prepare('DELETE FROM citas WHERE id=?');
        $query->execute([$id]);
    }
}