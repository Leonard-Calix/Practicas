<?php 
class Conexion{
    private static $conexion;

    public static function abrirConexion(){
        if(!isset(self::$conexion)){
            try {
                $usuario = 'root';
                $contrasena = '';
                $dsn = 'mysql:host=localhost;dbname=AgenciaViajes';
                self::$conexion = new PDO($dsn,$usuario,$contrasena);
                self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $ex) {
                echo 'Ha surgido un error'.$ex->getMessage().'</br>';
                die();
            }
        }
    }

    public static function cerrarConexion(){
        if(isset(self::$conexion)){
          self::$conexion = null;
        }
    }

    public static function obtenerConexion(){
        return self::$conexion;
    }
    
}
?>