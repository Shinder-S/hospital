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

    public function mostrarPacientePorId($id){
        $pacienteporid = $this->model->obtenerPacientePorId($id);
        if (!$pacienteporid) {
            header('Location: ' . BASE_URL . 'pacientes');
            exit();
        }

        $this->view->mostrarPacientePorId($pacienteporid);
    }

    public function agregarPaciente(){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $foto = $_POST['foto'] ?? null;
        $this->model->insertarPaciente($nombre, $apellido, $foto);
        header('Location: ' . BASE_URL . 'pacientes');
        exit();
    }

    public function eliminarPaciente($id){
        $this->model->eliminarPaciente($id);
        header('Location: ' . BASE_URL . 'pacientes');
        exit();
    }

    public function editarPaciente($id){
        $paciente = $this->model->obtenerPacientePorId($id);
        if (!$paciente) {
            header("Location: " . BASE_URL . "pacientes");
            exit();
        }
        $this->view->mostrarformueditar($paciente);
    }

    public function actualizarPaciente(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $foto = $_POST['foto'] ?? null; 

            if ($id && $nombre && $apellido) { 
                $this->model->actualizarPaciente($id, $nombre, $apellido, $foto);
                header("Location: " . BASE_URL . "pacientes");
                exit();
            }
        }
        header("Location: " . BASE_URL . "pacientes");
        exit();
    }
}
