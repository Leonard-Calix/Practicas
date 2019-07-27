<?php
include("../class/class_conexion.php");
$conexion = new Conexion();
  
	$sql="SELECT a.codigo_usuario, a.comentario, b.nombre_usuario, b.url_imagen_perfil ".
		"FROM tbl_comentarios a ".
		"INNER JOIN tbl_usuarios b ".
		"ON a.codigo_usuario = b.codigo_usuario ".
		"WHERE codigo_publicacion =". $_GET["codigo_publicacion"];

             $resultado = $conexion->ejecutarInstruccion($sql);
             $resultadoUsuarios = array();
             while($fila = $conexion->obtenerFila($resultado)){
                $resultadoUsuarios[] = $fila;
            }
        
       
         echo json_encode($resultadoUsuarios);
            
            $conexion->cerrarConexion();
 ?>
