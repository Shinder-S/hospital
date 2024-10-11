<?php
require_once './app/modelos/ModeloCitas.php';
require_once './app/vistas/VistaCitas.php';

class CitasControlador {

    private $vista;
    private $modelo;
    
    public function __construct() {
        $this->vista = new VistaCitas();
        $this->modelo = new ModeloCitas();
    }

    public function mostrarCitasPorPaciente($idPaciente) {
        $citas = $this->modelo->citasPorPaciente($idPaciente); 
        $this->vista->mostrarCitas($citas); 
    }
    public function obtenerCitas(){
        $citas = $this->modelo->obtenerCitas();
        $this->vista->mostrarCitas($citas);
    }
}
   /* public function obtenerCitaPorId($id){
        $cita = $this->modelo->obtenerCitaPorId($id);
        $this->vista->mostrarCitaPorId($cita);
    }

    public function obtenerPacientes(){
        $especialidades = $this->modelo->obtenerPacientes();

    }
}*/