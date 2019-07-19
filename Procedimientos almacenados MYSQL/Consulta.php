<!DOCTYPE html>
<html>
<head>
	<title>Procedimientos Almacenados</title>
</head>
<body>
	<h3>Procedimiento Almacenados</h3>

	<?php 
	require_once 'conexion.php';
	$conexion = new conexion();
	
/*		$nombre = "Kathy";
		$usuario = "j000";
		$contrasena = "j000";

		$sql = "Call ingresarDatos ('$nombre', '$usuario', '$contrasena') ";
		$resultado = $conexion->ejecutarConsulta($sql);

		if ($resultado) {
			# code...
			echo "listo";
		}
*/
		echo " Datos " . "<br>" . "<br>";


		$datos = "Call Dates";
		$resultado = $conexion->ejecutarConsulta($datos);
		$usuarios  = array();

		while( $usuario = $conexion->obtenerFila($resultado) ){
			$usuarios[] = $usuario;
		}

		echo json_encode($usuarios)

		?>

	 <!--
	 	Procedimiento almacenada
		CREATE PROCEDURE `ingresarDatos` (IN `nombre` varchar(45), `usuario` varchar(45), `contrasena` varchar(45) ) INSERT INTO persona (nombre, usuario, contrasena) VALUES (`nombre`,`usuario`, `contrasena`)

		Call ingresarDatos ("bryan", "calix1994", "calix2014")

		CREATE PROCEDURE Dates () SELECT * FROM `persona`
	-->
</body>
</html>

