<?php

class UsuarioControlador {
    public function crearUsuario() {
        // Cargar la vista de creación de usuario
        include '../vistas/crearUsuario.phtml';
    }

    public function guardarUsuario() {
        // Obtener los valores del formulario
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $usuario = $_POST['usuario'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encriptar la contraseña

        // Guardar el nuevo usuario en la base de datos (asumiendo una conexión PDO)
        $db = new PDO('mysql:host=localhost;dbname=hospital', 'root', '');
        $stmt = $db->prepare('INSERT INTO pacientes (nombre, apellido, usuario, password) VALUES (?, ?, ?, ?)');
        $stmt->execute([$nombre, $apellido, $usuario, $password]);

        // Redirigir al login una vez registrado
        header('Location: /login');
    }
}


?>