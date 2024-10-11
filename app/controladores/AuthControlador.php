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
    
    public function showLoginForm()
    {
        // Si el usuario ya está logueado, redirigir a otra parte (por ejemplo, al home)
        if (isset($_SESSION['USER_EMAIL'])) {
            header("Location: " . BASE_URL . "home");
            die(); // Evita que el resto del código se ejecute
        }

        // Mostrar el formulario de login si no está logueado
        require './templates/home.phtml';
    }

    public function login() {
        // Captura los datos del formulario
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        // Validar y autenticar al usuario (simulación)
        if ($email === 'admin@example.com' && $password === 'password') {
            $_SESSION['email'] = $email;  // Guardamos el email en la sesión
            header('Location: ' . BASE_URL . 'pacientes');  // Redirige a la página de pacientes
            exit();  // Detener la ejecución del script para evitar el bucle
        } else {
            // Si falla la autenticación, mostrar un mensaje de error
            echo "Usuario o contraseña incorrectos";
        }
    }
    

    public function logout() {
        session_start(); 
        session_destroy();
        header('Location: ' . BASE_URL . 'home');
    }
}

?>