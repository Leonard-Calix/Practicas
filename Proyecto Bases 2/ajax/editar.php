<?php 

	include_once '../conexion/conexion.php';

	$conexion = new conexion();

	$id = $_GET["id"];
	$marca = $_GET["marca"];
	$filtro = $_GET["filtro"];
	$color = $_GET["color"];
	$clase = $_GET["clase"];
	$mentol = $_GET["mentol"];
	$nicotina = $_GET["nicotina"];
	$alquitran = $_GET["alquitran"];
	$precio_costo = $_GET["precio_costo"];
	$precio_venta = $_GET["precio_venta"];

	/*
	$id = 23;
	$marca = "1";
	$filtro = "1";
	$color = "1";
	$clase = "1";
	$mentol = "1";
	$nicotina = 1;
	$alquitran = 1;
	$precio_costo = 1;
	$precio_venta = 1;

*/	
	$sql = "CALL SP_EDITAR_CIGARRILLO('$id','$marca','$filtro','$color','$clase','$mentol','$nicotina','$alquitran','$precio_costo','$precio_venta');";

	$ingreso = $conexion->ejecutarConsulta($sql);


	if ($ingreso) {

		$dato = array("Salida" => "Actulizado Con Exito");

	}else{

		$dato = array("Salida" => "No Se Pudo Actulizar");
	}

	echo json_encode($dato);
	
	$conexion->cerrarConexion();

 ?>