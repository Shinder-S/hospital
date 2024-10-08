<?php
//Primero que nada definimos nuestra URL base del proyecto

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

//Este $action nos sirve para determinar cual sera la acción por defecto si no se envia nada
$action = 'home';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

//Definimos nuestra tabla de ruteo

switch ($params[0]) {
    case 'home':
        echo 'Estamos en el home!';
        break;
    case 'guardar-usuario':
            sessionAuthMiddleware($res); 
            $controller = new UsuarioControlador(); // Cambia AuthController a UsuarioControlador
            $controller->guardarUsuario();
            break;
    case 'crearturno':
            sessionAuthMiddleware($res); 
            $controller = new CitasControlador();
            $controller->crearTurno();
            break;
    
    case 'pacientes':
            sessionAuthMiddleware($res);
            $controller = new PacientesControl();
            $controller->getPacientes();
            break;
    
    case 'paciente':
            sessionAuthMiddleware($res);
            $controller = new PacientesControl();
            $controller->getPacientetById($params[1]);
            break;
    
        case 'crearpaciente':
            sessionAuthMiddleware($res); 
            $controller = new PacientesControl();
            $controller->crearPaciente(); 
            break;
    
        case 'editarpaciente':
            sessionAuthMiddleware($res); 
            $controller = new PacientesControl();
            $controller->updatePaciente($params[1]);
            break;
    
        case 'eliminarpaciente':
            sessionAuthMiddleware($res); 
            $controller = new PacientesControl();
            $controller->deletePaciente($params[1]);
            break;
    
        case 'login':
            $controller = new LoginControlador();
            $controller->login();
            break;
    
        case 'showLogin':
            $controller = new LoginControlador();
            $controller->showLogin();
            break;
    
            default:
            echo "404 - Página no encontrada";
            break;
    }
    ?>
  