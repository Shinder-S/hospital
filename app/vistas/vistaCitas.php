<?php

class VistaCitas{

    public function mostrarError($mensaje){
        require './templates/error.phtml';
    }

    public function mostrarCitaPorPaciente($cita){
        require './templates/citasPorPaciente.phtml';
    }
    public function mostrarCitas($citas){
        require './templates/citasTotales.phtml';
    }

    public function mostrarFormularioCita($cita){
        require './templates/formularioCitas.phtml';
    }   
    public function agregarCita($pacientes){
        require './templates/agregarCita.phtml';
    }

    public function mostrarFormularioEdicion($cita){
        require './templates/admin/editarCita.phtml';
    }
}    