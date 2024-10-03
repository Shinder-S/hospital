<?php
include_once('../modelo/db.php');
include_once('../controlador/controllerguardar_usuario.php');


 var_dump($_POST);
 
   class GuardarUsuario extends DB{

    private $nombre;
    private $apellido;
    private $historial;
    private $usuario;
    private $password;

    public function agregarUsuario(){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $usuario=$_POST['usuario'];
    $password=$_POST['password'];
   


 if(isset($nombre) && isset($apellido) && isset($usuario) && isset($password)){

    $passwordhash=password_hash($password, PASSWORD_DEFAULT);
    $query="INSERT INTO pacientes (nombre,apellido,usuario,password) VALUES (?,?,?,?)";
    $respuesta=$this->connect()->prepare($query);

    //ejecutamos

    if($respuesta->execute([$nombre,$apellido,$usuario,$passwordhash])){
        echo"Nuevo registro creado";
    }else{
        echo"Error al cargar el registro" . implode(", ", $respuesta->errorInfo());
    }
}else{
    echo"Todos los campos deben estar completos" . implode(", ", $this->connect()->errorInfo());
}

    }
    
   }
}



?>