<?php
//Primero que nada definimos nuestra URL base del proyecto

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');


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
    default:
        echo '404 page not found';
        break;
}