<?php

require_once 'app/modelos/ModeloPacientes.php';
require_once 'app/vistas/VistaPacientes.php';

class PacientesControlador {
    private $model;
    private $view;

    public function __construct(){
        $this->model = new ModeloPacientes();
        $this->view = new VistaPacientes();

    }

    public function mostrarPacientes(){
        $pacientes = $this->model->obtenerPacientes();
        $this->view->mostrarPacientes($pacientes);
    }

    public function mostrarPacientePorID($id){
        $pacienteporid = $this->model->obtenerPacientePorID($id);
        $this->view->mostrarPacientePorID($pacienteporid);
    }
    public function agregarPaciente(){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $foto = $_POST['foto'] ?? null;
        $this->model->agregarPaciente($nombre, $apellido, $foto);
        header('Location: ' . BASE_URL . 'pacientes');
    }
    public function actualizarPaciente($id){
        if (!empty($_POST['nombre']) && !empty($_POST['apellido'])) {
            $this->model->actualizarPaciente($id, $_POST['nombre'], $_POST['apellido']);
            header('Location: ' . BASE_URL . 'pacientesporid/' . $id);
        } else {
            echo "Error: Faltan campos por completar";
        }
    }
    public function editarPaciente($id){
        $pacienteporid = $this->model->obtenerPacientePorID($id);
        $this->view->mostrarPacientePorID($pacienteporid);
    }
    public function eliminarPaciente($id){
        $this->model->eliminarPaciente($id);
        header('Location: ' . BASE_URL . 'pacientes');
    }
    
}