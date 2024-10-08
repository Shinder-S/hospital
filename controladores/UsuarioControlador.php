<?php
include 'Usuario.php';

class UsuarioControlador {

    public function guardarUsuario() {
        try {
            // Obtener los valores del formulario
            $nombre = trim($_POST['nombre']);
            $apellido = trim($_POST['apellido']);
            $usuario = trim($_POST['usuario']);
            $password = $_POST['password'];

            // Validar datos
            if (empty($nombre) || empty($apellido) || empty($usuario) || empty($password)) {
                throw new Exception('Todos los campos son requeridos.');
            }

            // Conectar a la base de datos
            $db = new PDO('mysql:host=localhost;dbname=hospital', 'root', '');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Verificar si el usuario ya existe
            $stmt = $db->prepare('SELECT COUNT(*) FROM pacientes WHERE usuario = ?');
            $stmt->execute([$usuario]);
            if ($stmt->fetchColumn() > 0) {
                throw new Exception('El usuario ya existe.');
            }

            // Encriptar la contraseña
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Guardar el nuevo usuario en la base de datos
            $stmt = $db->prepare('INSERT INTO pacientes (nombre, apellido, usuario, password) VALUES (?, ?, ?, ?)');
            $stmt->execute([$nombre, $apellido, $usuario, $hashedPassword]);

            // Redirigir al login una vez registrado
            header('Location: ' . BASE_URL . 'login');
            exit();
        } catch (Exception $e) {
            // Manejar errores
            echo 'Error al registrar el usuario: ' . $e->getMessage();
        }
    }
}
?>
