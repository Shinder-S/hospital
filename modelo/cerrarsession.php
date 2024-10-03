<?php
include_once('../includes/usuario_session.php');

$usuariosession= new IniciodeSession();
$usuariosession->cerrarsession();

header("location: ../index.php");
?>