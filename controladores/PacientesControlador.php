<?php

class PacientesControlador {
    public function listar() {
        $pacientes = Paciente::obtenerTodos();
        include 'views/pacientes/lista.phtml';
    }

    public function agregar() {
        if ($_POST) {
            Paciente::agregar($_POST['nombre'], $_POST['apellido'], $_POST['usuario'], $_POST['contrasena']);
            header('Location: /admin/pacientes');
        } else {
            include 'views/pacientes/agregar.phtml';
        }
    }

    // Métodos para editar, eliminar pacientes
}

?>