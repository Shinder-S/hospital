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
    
    public function mostrarLogin(){
        return $this->vista->mostrarLogin();
    }

    public function login(){
        if(!isset($_POST['user']) || empty($_POST['password'])) {
            return $this->vista->mostrarLogin('Alguno de los datos ingresados es incorrecto');
        }

        $email = $_POST['usuario'];
        $password = $_POST['password'];

        $usuarioExistente = $this->modelo->getUsuario($email);

        if($usuarioExistente && password_verify($password, $usuarioExistente->password)){
            session_start();
            $_SESSION['ID_USER'] = $usuarioExistente->id;
            $_SESSION['EMAIL_USER'] = $usuarioExistente->email;
            $_SESSION['LAST_ACTIVITY'] = time();

            header('Location: ' . BASE_URL);
        } else {
            return $this->vista->mostrarLogin('Credenciales incorrectas');
        }        
    }

    public function cerrarSesion() {
        session_start(); 
        session_destroy();
        header('Location: ' . BASE_URL);
    }
}

?>