<?php
//Primero que nada definimos nuestra URL base del proyecto
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

require_once "./app/controladores/CitasControlador.php";
require_once "./app/controladores/AuthControlador.php";
require_once "./libs/response.php";
require_once "./middleware/auth.middleware.php";

if (!empty($_GET['action'])) {
    $accion = $_GET['action'];
} else {
    $accion = 'home';
}

$res = new Response();

$params = explode('/', $accion);

//Definimos nuestra tabla de ruteo

switch ($params[0]) {
    case 'home':
        sessionAuthMiddleware($res);
        $controlador = new CitasControlador();
        $controlador->mostrarHome();
        break;
    case 'guardar-usuario':
        sessionAuthMiddleware($res);
        $controlador = new UsuarioControlador(); 
        $controlador->guardarUsuario();
        break;
        
    case 'citas':
        $controlador = new CitasControlador();
        $controlador-> obtenerCitas();
        $controlador->obtenerPacientes();
        break;

    case 'citaElegida':
        $controlador = new CitasControlador();
        $controlador->obtenerCitaPorId($params[1]);
        break;

    case 'login':
        $controlador = new AuthControlador();
        $controlador->login();
        break;

    case 'mostrarLogin':
        $controlador = new AuthControlador();
        $controlador->mostrarLogin();
        break;

    default:
        echo "404 - Página no encontrada";
        break;
}
