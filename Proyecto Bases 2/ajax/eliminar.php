<?php 

	include_once '../conexion/conexion.php';

	$conexion = new conexion();

	$id = $_GET["id"];

	$sql = "CALL SP_ELIMINAR_CIGARRILLO('$id')";

	$ingreso = $conexion->ejecutarConsulta($sql);

	if ($ingreso) {
		$dato = array("Salida" => "Registro Elmininado");
	} else {
		$dato = array("Salida" => "No Se Pudo Elmininar");
	}
	
	echo json_encode($dato);

	
    

 ?>