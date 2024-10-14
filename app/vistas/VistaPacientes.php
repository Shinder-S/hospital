<?php

class VistaPacientes{

    public function mostrarPacientes($pacientes){
        require './templates/pacientes.phtml';
    }

    public function mostrarPacientePorID($pacienteporid){
        require './templates/pacienteporid.phtml';
    }
    public function mostrarformueditar($paciente){
        require './templates/formueditarpaciente.phtml';
    }
}