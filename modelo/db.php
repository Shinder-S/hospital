<?php

class DB{
    private  $host;
    private $db;
    private $user;
    private $password;
    private $charset;

    public function __construct(){
        $this->host = 'localhost';
        $this->db= 'hospital';
        $this->user= 'root';
        $this->password= '';
        $this->charset= 'utf8mb4';
    }
    public function connect(){
        try{
            $connect="mysql:host=".$this->host.";dbname=".$this->db.";charset=".$this->charset;
            $options=[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
                       PDO::ATTR_EMULATE_PREPARES=>false];
            $pdo= new PDO($connect,$this->user,$this->password,$options);
            return $pdo;
        }catch(PDOException $e){
            die("Error connection:".$e->getMessage());
        }
    }
}

?>