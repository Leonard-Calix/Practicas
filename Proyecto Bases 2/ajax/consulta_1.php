<?php 

include_once '../conexion/conexion.php';

$conexion = new conexion();

$sql = "SELECT * FROM vw_marcasextranjeras";

$resultado = $conexion->ejecutarConsulta($sql);
$datos= array();

while($fila = $conexion->obtenerFila($resultado)){             
	$datos[] = $fila;

}

echo json_encode($datos);


?>