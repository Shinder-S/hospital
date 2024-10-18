<?php

class VistaCitas{
    public function mostrarCitaPorPaciente($cita){
        require './templates/citasPorPaciente.phtml';
    }
    public function mostrarCitas($citas){
        require './templates/citasTotales.phtml';
    }

    public function mostrarFormularioCitas($cita){
        require './templates/formularioCitas.phtml';
    }   
}    