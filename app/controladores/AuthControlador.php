<?php

require_once './app/modelos/ModeloUsuario.php';
require_once './app/vistas/AuthVista.php';

class AuthControlador {

    private $modelo;
    private $vista;

    public function __construct() {
        $this->modelo = new ModeloUsuario();
        $this->vista = new AuthVista();
    }
    
    public function showLoginForm(){
            if (isset($_SESSION['USER_EMAIL'])) {
                header("Location: " . BASE_URL . "pacientes");
                die(); 
            }
            require './templates/home.phtml';
        }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            var_dump($_POST); 
            $email = $_POST['email'] ?? null; 
            $password = $_POST['password'] ?? null;
    
            if (empty($email) || empty($password)) {
                echo "Los campos no pueden estar vacíos.";
                return;
            }
    
            $usuario = $this->modelo->getUsuario($email);
            if ($usuario && password_verify($password, $usuario->password)) {
                $_SESSION['USER_EMAIL'] = $usuario->email;
                header('Location: ' . BASE_URL . 'pacientes');
                exit();
            } else {
                echo "Usuario o contraseña incorrectos";
            }
        }
    }

    public function logout() {
        session_start(); 
        session_destroy();
        header('Location: ' . BASE_URL . 'home');
    }
}

?>