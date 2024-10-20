<?php

class VistaPacientes{

    public function mostrarPacientes($pacientes){
        require './templates/pacientes.phtml';
    }

    public function mostrarPacientePorID($pacientePorId){
        require './templates/pacientePorId.phtml';
    }
    public function mostrarFormuEditar($paciente){
        require './templates/formuEditarPaciente.phtml';
    }
}