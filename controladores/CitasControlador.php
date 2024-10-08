<?php
include 'Cita.php';

class CitasControlador {
    public function listarPorPaciente($paciente_id) {
        $citas = Cita::obtenerPorPaciente($paciente_id);
        include 'views/citas/lista.phtml';
    }

    public function agregar($paciente_id) {
        if ($_POST) {
            // Validar que la fecha y la hora no estén vacías
            if (empty($_POST['fecha']) || empty($_POST['hora'])) {
                echo 'La fecha y la hora son requeridas.';
                return; // Salir del método si hay un error
            }

            // Intentar agregar la cita
            try {
                Cita::agregar($paciente_id, $_POST['fecha'], $_POST['hora']);
                header('Location: /admin/citas');
                exit(); // Asegúrate de salir después de redirigir
            } catch (Exception $e) {
                // Manejar errores al agregar la cita
                echo 'Error al agregar la cita: ' . $e->getMessage();
            }
        } else {
            include 'views/citas/agregar.phtml';
        }
    }
}

?>