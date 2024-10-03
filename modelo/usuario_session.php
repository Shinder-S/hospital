<?php

class IniciodeSession{
    public function __construct(){
        session_start();
    }

    public function valorSessionActual($usuario){
        $_SESSION['usuario']=$usuario;
    }
    public function conseguirValor(){
        return isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;
    }
    public function cerrarSession(){
        session_unset();
        session_destroy();
    }
}
?>