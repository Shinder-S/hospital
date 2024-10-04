<?php

class Paciente {
    public static function obtenerTodos() {
        $db = Database::getConnection();
        $stmt = $db->query("SELECT * FROM pacientes");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function agregar($nombre, $apellido, $usuario, $contrasena) {
        $db = Database::getConnection();
        $stmt = $db->prepare("INSERT INTO pacientes (nombre, apellido, usuario, contrasena) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nombre, $apellido, $usuario, password_hash($contrasena, PASSWORD_DEFAULT)]);
    }

    public static function obtenerPorId($id) {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM pacientes WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Otros métodos como editar, eliminar, etc.
}

?>