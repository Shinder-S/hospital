<?php

class VistaPacientes{

    public function mostrarPacientes($pacientes){
        require './templates/pacientes.phtml';
    }

    public function mostrarPacientePorID($pacientePorId, $citas) {
        require './templates/verDetallesPaciente.phtml';
    }
    public function mostrarFormuEditar($paciente){
        require './templates/formuEditarPaciente.phtml';
    }
}