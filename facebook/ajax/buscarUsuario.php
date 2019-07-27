<?php
include("../class/class_conexion.php");
$conexion = new Conexion();

	$sql = sprintf("SELECT  correo, contrasena FROM tbl_usuarios WHERE correo = '%s' AND contrasena = '%s'",
					$_GET["email"],
					$_GET["password"]);
	$resultado = $conexion->ejecutarInstruccion($sql);
             $resultado2 = array();
             while($fila = $conexion->obtenerFila($resultado)){
                $resultado2[] = $fila;
            }

     if($resultado2)
     	echo "Bienvenido has iniciado sesion";
     else
     	echo "no existe tal cuenta";


 ?>