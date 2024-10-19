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
    public function agregarCita($pacientes){
        require './templates/agregarCita.phtml';
    }
}    