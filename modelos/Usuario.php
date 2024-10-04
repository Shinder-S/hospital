<?php

class Usuario {
    public static function validar($usuario, $contrasena) {
        $db = Database::getConnection();
        $stmt = $db->prepare("SELECT * FROM usuarios WHERE usuario = ?");
        $stmt->execute([$usuario]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($contrasena, $user['contrasena'])) {
            return true;
        }
        return false;
    }
}

?>
