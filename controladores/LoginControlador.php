<?php

class LoginControlador {
    public function login() {
        if ($_POST) {
            $usuario = $_POST['usuario'];
            $contrasena = $_POST['contrasena'];
            $admin = Usuario::validar($usuario, $contrasena);
            if ($admin) {
                $_SESSION['admin'] = true;
                header('Location: /admin');
            } else {
                $error = "Usuario o contraseña incorrecta";
                include '../vistas/login/login.phtml';
            }
        } else {
            include '../vistas/login/login.phtml';
        }
    }

    public function logout() {
        session_destroy();
        header('Location: /login');
    }
}

?>