<?php 

include_once '../conexion/conexion.php';

$conexion = new conexion();

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

	$sql = "CALL SP_AGREGAR_CIGARRILLO('$marca','$filtro','$color','$clase','$mentol','$nicotina','$alquitran','$precio_costo','$precio_venta')";

	$ingreso = $conexion->ejecutarConsulta($sql);


	if ($ingreso) {

		$dato = "SELECT * FROM cigarrillos WHERE idCigarrillos =  ( SELECT MAX(idcigarrillos) FROM cigarrillos );";

		$resultado = $conexion->ejecutarConsulta($dato);
		$cigarro  = array();

		while( $usuario = $conexion->obtenerFila($resultado) ){
			$cigarro[] = $usuario;
		}

		echo json_encode($cigarro);

	}else{

		echo "Fallo";
	}

	
	$conexion->cerrarConexion();

	?>