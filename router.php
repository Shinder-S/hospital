<?php
session_start();  

require_once "./app/controladores/CitasControlador.php";
require_once "./app/controladores/AuthControlador.php";
require_once './app/controladores/PacientesControlador.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

if (!empty($_GET['action'])) {
    $accion = $_GET['action'];
} else {
    $accion = 'home';
}

$params = explode('/', $accion);

$publicRoutes = ['home', 'login', 'logout', 'pacientes'];  // Definimos las rutas públicas

// Proteger las rutas privadas, asegurando que el usuario esté logueado
if (!in_array($params[0], $publicRoutes) && !isset($_SESSION['email'])) {
    header('Location: ' . BASE_URL . 'home');  // Redirigir al home/login si no está autenticado
    exit();
}

// Manejamos la tabla de ruteo
switch ($params[0]) {
    case 'home':
        $authController = new AuthControlador();
        $authController->showLoginForm();
        break;
    case 'pacientes':
        $PacientesControlador = new PacientesControlador();
        $PacientesControlador->mostrarPacientes();
        break;
    case 'pacientesporid':
        $PacientesControlador = new PacientesControlador();
        $id = $params[1];
        $PacientesControlador->mostrarPacientePorID($id);
        break;
    case 'agregarPaciente':
        $PacientesControlador = new PacientesControlador();
        $PacientesControlador->agregarPaciente();
        break;
    case 'editarPaciente':
        $PacientesControlador = new PacientesControlador();
        $id = $params[1];
        $PacientesControlador->editarPaciente($id);
         break;
    case 'actualizarPaciente':
        $PacientesControlador = new PacientesControlador();
        $id = $params[1];
        $PacientesControlador->actualizarPaciente($id);
        break;
    case 'eliminarPaciente':
        $PacientesControlador = new PacientesControlador();
        $id = $params[1];
        $PacientesControlador->eliminarPaciente($id);
        break;
    case 'citas':
        $controlador = new CitasControlador();
        $controlador->obtenerCitas();
        $controlador->obtenerPacientes();
        break;
    case 'mostarcitasporID':
        $citasControlador= new CitasControlador();
        $id=$param[1];
        $citasControlador=mostrarCitasPorPaciente($id);
    case 'login':
        $authController = new AuthControlador();
        $authController->login();  // Procesar el login
        break;
    case 'mostrarLogin':
        $authController = new AuthControlador();
        $authController->showLoginForm();  // Mostrar el formulario de login
        break;
    case 'logout':  // Ruta para cerrar sesión
        $authController = new AuthControlador();  // Usamos AuthControlador, no AuthController
        $authController->logout();  // Procesar el logout
        break;
    default:
        echo "404 - Página no encontrada";
        break;
}
