<?php

class VistaCitas{
    public function mostrarCitasporPaciente($citas){
        require_once './templates/citasporpaciente.phtml';
    }
    public function mostrarCitas($citas){
        require_once './templates/citastotales.phtml';
    }
}
    /*
     public function mostrarLogin(){
        require_once './templates/login/login.phtml';
    }

    public function mostrarNosotros(){
        require_once './templates/nosotros.phtml';
    }

    

    public function mostrarCitaPorId($cita){
        require_once './templates/citaPorId.phtml';
    }

    public function mostrarCategorias($cita){
        require_once './templates/tablaDeCitas.phtml';
    }
}
    */