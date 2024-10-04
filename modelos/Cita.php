<?php

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

    // Otros métodos como eliminar, editar.
}

?>