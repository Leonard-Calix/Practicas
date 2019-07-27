<?php
include("../class/class_conexion.php");
	$conexion = new Conexion();

	$sql = "SELECT codigo_usuario, ". 
			 "nombre_usuario, correo, ".
			 "contrasena, url_imagen_perfil ".
			 "FROM tbl_usuarios";
             $resultado = $conexion->ejecutarInstruccion($sql);
             $resultadoUsuarios = array();
             while($fila = $conexion->obtenerFila($resultado)){
                $resultadoUsuarios[] = $fila;
            }
        
            echo json_encode($resultadoUsuarios);
            
            $conexion->cerrarConexion();
?>