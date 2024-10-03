<?php

include_once('modelo/usuario.php');
include_once('modelo/usuario_session.php');

// Crear instancias de las clases
$sessionUsuario = new IniciodeSession();
$usuario = new Usuario(); 

// Comprobar si hay una sesión activa
if (isset($_SESSION['usuario'])) {
    $usuario->configurarUsuario($sessionUsuario->conseguirValor());
    include_once('vistas/home.php');
} else if (isset($_POST['usuario']) && isset($_POST['password'])) {
    $usuarioform = $_POST['usuario'];
    $passform = $_POST['password'];

    if ($usuario->usuarioExistente($usuarioform, $passform)) {
        $sessionUsuario->valorSessionActual($usuarioform);
        $usuario->configurarUsuario($usuarioform);
        include_once('vistas/home.php');
    } else {
        $errorLogin = "Nombre de usuario y/o password incorrecto";
        include_once('vistas/login.php');
    }
} else {
    include_once('vistas/login.php');
}
?>