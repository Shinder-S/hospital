<?php

class AuthVista {
    private $user = null;

    public function mostrarLogin($error = '') {
        require './templates/login/login.phtml';
    }

    public function cerrarSesion($error = '') {
        require './templates/';          
    }
}