<?php
session_start();

require_once "./app/controladores/citasControlador.php";
require_once "./app/controladores/authControlador.php";
require_once './app/controladores/pacientesControlador.php';

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

if (!empty($_GET['action'])) {
    $accion = $_GET['action'];
} else {
    $accion = 'home';
}

$params = explode('/', $accion);

$publicRoutes = ['home', 'login', 'logout', 'pacientes','citas'];  // Definimos las rutas públicas

// Proteger las rutas privadas, asegurando que el usuario esté logueado
if (!in_array($params[0], $publicRoutes) && !isset($_SESSION['USER_EMAIL'])) {
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
    case 'pacientesPorId':
        $PacientesControlador = new PacientesControlador();
        $id = $params[1];
        $PacientesControlador->mostrarPacientePorId($id);
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
        break;
    case 'agregarCita':
        $citasControlador = new CitasControlador();
        $citasControlador->agregarCita();  
        break;
    case 'editarCita':
        $citasControlador = new CitasControlador();
        $id = $params[1];
        $citasControlador->editarCita($id);  
        break;
    case 'mostarCitaPorId':
        $citasControlador = new CitasControlador();
        $id = $params[1];
        $citasControlador->citaPorPaciente($id);
        break;
    case 'eliminarCita':
        $citasControlador = new CitasControlador();
        $id = $params[1];
        $citasControlador->eliminarCita($id);  
        break;
    case 'login':
        $authController = new AuthControlador();
        $authController->login();
        break;
    case 'mostrarLogin':
        $authController = new AuthControlador();
        $authController->showLoginForm();
        break;
    case 'logout':
        $authController = new AuthControlador();
        $authController->logout();
        break;
    case 'verDetallesPaciente':
        $PacientesControlador = new PacientesControlador();
        $id = $params[1]; 
        $PacientesControlador->mostrarPacientePorId($id); 
         break;
    default:
        echo "404 - Página no encontrada";
        break;
}
