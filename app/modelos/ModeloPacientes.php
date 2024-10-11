<?php

class ModeloPacientes {
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=hospital;charset=utf8', 'root', '');
    }

    public function obtenerPacientes(){
        $query = $this->db->prepare('SELECT * FROM pacientes');
        $query->execute();

        $pacientes = $query->fetchAll(PDO::FETCH_OBJ);
        return $pacientes;
    }

    public function obtenerPacientePorID($id){
        $query = $this->db->prepare('SELECT * FROM pacientes WHERE id=?');
        $query->execute([$id]);

        $pacienteporid = $query->fetch(PDO::FETCH_OBJ);
        return $pacienteporid;
    }
        // Función para agregar un nuevo paciente
        public function agregarPaciente($nombre, $apellido, $foto){
            $query = $this->db->prepare('INSERT INTO pacientes (nombre, apellido, foto) VALUES (?, ?, ?)');
            $query->execute([$nombre, $apellido, $foto]);
        }
    
        // Función para editar un paciente existente
        public function editarPaciente($id, $nombre, $apellido, $foto){
            $query = $this->db->prepare('UPDATE pacientes SET nombre=?, apellido=?, foto=? WHERE id=?');
            $query->execute([$nombre, $apellido, $foto, $id]);
        }
    
        // Función para eliminar un paciente
        public function eliminarPaciente($id){
            $query = $this->db->prepare('DELETE FROM pacientes WHERE id=?');
            $query->execute([$id]);
        }
    }
    


