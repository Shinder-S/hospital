<?php

class ModeloUsuario {
    private $database;

    public function __construct() {
        $this->database = new PDO('mysql:host=localhost;dbname=hospital;charset=utf8', 'root',  '');
    }

    public function getUsuario($email){
        $seleccionar = $this->database->prepare("SELECT * FROM usuario WHERE email = ?");
        $seleccionar->execute([$email]);

        $usuario = $seleccionar->fetch(PDO::FETCH_OBJ);

        return $usuario;
    }
}
