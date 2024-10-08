<?php
function sessionAuthMiddleware() {
    session_start();
    if (isset($_SESSION['usuario'])) {
        return true; // O puedes devolver el objeto de usuario si es necesario
    } else {
        header('Location: ' . BASE_URL . 'showLogin');
        die();
    }
}
?>