<?php

class ModeloCitas {

    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=hospital;charset=utf8', 'root', '');
    }

   public function obtenerCitas(){
        $citasTotales = $this->db ->prepare('SELECT * FROM citas');
        $citasTotales->execute();
        $turnosTotales = $citastotales ->fetchAll(PDO::FETCH_OBJ);
        return $turnosTotales;
   }

    public function mostrarCitasPorPaciente($paciente_id) {
        $idPaciente = $this->db->prepare("SELECT * FROM citas WHERE paciente_id = ?");
        $idPaciente->execute([$paciente_id]);
        $cita = $idPaciente->fetch(PDO::FETCH_OBJ);
        return $cita;
    }
}
