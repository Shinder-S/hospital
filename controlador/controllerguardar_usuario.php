<?php
require_once "../modelo/db.php";
require_once "../modelo/guardar_usuario.php";
var_dump(class_exists('GuardarUsuario'));
$guardarUsuario= new GuardarUsuario();

$guardarUsuario->agregarUsuario();

?>