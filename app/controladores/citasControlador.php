<?php
require_once './app/modelos/modeloCitas.php';
require_once './app/vistas/vistaCitas.php';

class CitasControlador {

    private $vista;
    private $modelo;
    
    public function __construct() {
        $this->vista = new VistaCitas();
        $this->modelo = new ModeloCitas();
    }

    public function citaPorPaciente($idPaciente) {
        $citas = $this->modelo->obtenerCitasPorPaciente($idPaciente); 
        $this->vista->mostrarCitas($citas); 
    }
    public function obtenerCitas(){
        $citas = $this->modelo->obtenerCitas();
        $this->vista->mostrarCitas($citas);
    }

    public function agregarCita(){
        $paciente_id = $_POST['paciente_id'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $this->modelo->agregarCita($paciente_id, $fecha, $hora);
        header('Location: ' . BASE_URL . 'citas');
        exit();
    }

    public function editarCita($id){
        $cita = $this->modelo->mostrarCitaPorPaciente($id);
        if(!$cita) {
            header("Location: " . BASE_URL . "citas");
            exit();
        }
        $this->vista->mostrarCitaPorPaciente($cita);
    }

    public function eliminarCita(){

    }
}