<?php

class VistaCitas{
    
    public function mostrarLogin(){
        require_once './templates/login/login.phtml';
    }

    public function mostrarNosotros(){
        require_once './templates/nosotros.phtml';
    }

    public function mostrarCitas($citas){
        require_once './templates/tablaCitas.phtml';
    }

    public function mostrarCitaPorId($cita){
        require_once './templates/citaPorId.phtml';
    }

    public function mostrarCategorias($cita){
        require_once './templates/tablaDeCitas.phtml';
    }
}