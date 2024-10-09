<?php
    function sessionAuthMiddleware($res) {
        session_start();
        if(isset($_SESSION['ID_USER'])){
            $res->usuario = new stdClass();
            $res->usuario->id = $_SESSION['ID_USER'];
            $res->usuario->email = $_SESSION['EMAIL_USER'];
            return;
        } else {
            header('Location: ' . BASE_URL . 'mostrarLogin');
            die();
        }
    }
?>