<?php

class CitasControlador {
    public function listarPorPaciente($paciente_id) {
        $citas = Cita::obtenerPorPaciente($paciente_id);
        include 'views/citas/lista.phtml';
    }

    public function agregar($paciente_id) {
        if ($_POST) {
            Cita::agregar($paciente_id, $_POST['fecha'], $_POST['hora']);
            header('Location: /admin/citas');
        } else {
            include 'views/citas/agregar.phtml';
        }
    }
}

?>