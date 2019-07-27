<?php
include("../class/class_conexion.php");
	$conexion = new Conexion();
  
    $sql = 	sprintf("INSERT INTO tbl_publicaciones(" .
    	"codigo_usuario, titulo_publicacion, texto_publicacion,fecha_publicacion) ".
    	 "VALUES (%s,'%s','%s',curdate())",
    	 $_GET["codigoUsuarioComento"],
    	 $_GET["txt-titulo-publicacion"],
    	 $_GET["txt-publicacion"]
		); 
     echo $sql;
     $conexion->ejecutarInstruccion($sql);
     $conexion->cerrarConexion();
?>