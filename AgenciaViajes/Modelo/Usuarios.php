<?php 
class Usuarios{
    private $idUsuarios;
    private $nombreUsuario;
    private $email;
    private $contrasena;

    public function __construct($idUsuarios, $nombreUsuario,$email,$contrasena){
        $this -> idUsuarios = $idUsuarios;
        $this -> nombreUsuario = $nombreUsuario;
        $this -> email = $email;
        $this -> contrasena = $contrasena;
    }

    public function obtener_id(){
        return $this -> idUsuarios;
    }

    public function obtener_nombre(){
        return $this -> nombreUsuario;
    }

    public function obtener_email(){
        return $this -> email;
    }

    public function obtener_contrasena(){
        return $this -> contrasena;
    }

}
?>