<?php

class ModeloCitas {

    private $database;

    public function __construct(){
        $this->database = new PDO('mysql:host=localhost;dbname=hospital;charset=utf8', 'root', '');
    }

    public function obtenerCitas(){
        $seleccionar = $this->database ->prepare('SELECT * FROM citas');
        $seleccionar->execute();
        $turnos = $seleccionar ->fetchAll(PDO::FETCH_OBJ);
        return $turnos;
    }

    public function obtenerCitaPorId($paciente_id) {
        $seleccionar = $this->database->prepare("SELECT * FROM citas WHERE paciente_id = ?");
        $seleccionar->execute([$paciente_id]);
        $cita = $seleccionar->fetch(PDO::FETCH_OBJ);
        return $cita;
    }

    public function agregarCita($paciente_id, $fecha, $hora) {
        $seleccionar = $this->database->prepare("INSERT INTO citas (paciente_id, fecha, hora) VALUES (?, ?, ?)");
        $seleccionar->execute([$paciente_id, $fecha, $hora]);
    }
    public function editar($cita_id, $fecha, $hora) {
        $seleccionar = $this->database->prepare("UPDATE citas SET fecha = ?, hora = ? WHERE id = ?");
        $seleccionar->execute([$fecha, $hora, $cita_id]);
    }
    
    public function eliminar($cita_id) {
        $seleccionar = $this->database->prepare("DELETE FROM citas WHERE id = ?");
        $seleccionar->execute([$cita_id]);
    }

    public function obtenerPacientes(){
        $seleccionar = $this->database->prepare('SELECT * FROM pacientes');
        $seleccionar->execute();
        $categorias = $seleccionar->fetchAll(PDO::FETCH_OBJ);
        return $categorias;
    }

}

?>