<?php
include_once 'modelo/db.php';


//echo $hash;

class Usuario extends DB{
    private $usuario;
    private $password;


    public function usuarioExistente($usuario,$password){
     $query=$this->connect()->prepare('SELECT * FROM pacientes WHERE usuario=:usuario AND password=:password ');
    $query->execute(['usuario'=>$usuario,'password'=>$password]);
    if ($query->rowCount() > 0) {
        $usuarioActual = $query->fetch(PDO::FETCH_ASSOC);

        // Verifica la contraseña usando MD5 si aún no ha sido actualizada
        if ($usuarioActual['password'] === md5($password)) {
            // Si la contraseña es correcta, actualiza a password_hash()
            $nuevoHash = password_hash($password, PASSWORD_DEFAULT);
            $this->actualizarContraseña($usuario, $nuevoHash);
            return true; // Contraseña correcta
        }

        // Verifica si la contraseña actual está usando password_hash
        if (password_verify($password, $usuarioActual['password'])) {
            return true; // Contraseña correcta
        }
    }
    return false; // Usuario no encontrado o contraseña incorrecta
}

private function actualizarContraseña($usuario, $nuevoHash) {
    $query = $this->connect()->prepare('UPDATE pacientes SET password = :password WHERE usuario = :usuario');
    $query->execute(['password' => $nuevoHash, 'usuario' => $usuario]);
}

    public function configurarUsuario($usuario){
        $query=$this->connect()->prepare('SELECT *FROM pacientes WHERE usuario=:usuario');
        $query->execute(['usuario'=>$usuario]);

        foreach($query as $usuarioActual){
            $this->usuario=$usuarioActual['usuario'];
            $this->password=$usuarioActual['password'];
        }
    }

        public function getUsuario(){
            return $this->usuario;

        }
    }



?>
