<?php

include 'config.php';

class Cita {
    public static function obtenerPorPaciente($paciente_id) {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM citas WHERE paciente_id = ?");
        $stmt->execute([$paciente_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function agregar($paciente_id, $fecha, $hora) {
        $db = Database::getConnection();
        $stmt = $db->prepare("INSERT INTO citas (paciente_id, fecha, hora) VALUES (?, ?, ?)");
        $stmt->execute([$paciente_id, $fecha, $hora]);
    }
    public static function editar($cita_id, $fecha, $hora) {
        $db = Database::getConnection();
        $stmt = $db->prepare("UPDATE citas SET fecha = ?, hora = ? WHERE id = ?");
        $stmt->execute([$fecha, $hora, $cita_id]);
    }
    
    public static function eliminar($cita_id) {
        $db = Database::getConnection();
        $stmt = $db->prepare("DELETE FROM citas WHERE id = ?");
        $stmt->execute([$cita_id]);
    }

    // Otros métodos como eliminar, editar.
}

?>