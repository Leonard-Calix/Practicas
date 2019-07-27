<!DOCTYPE html>
<html>
<head>
	<title>Probando Conexion</title>
</head>
<body>
	<?php

	include_once 'conexionOracle.php'; 
	$conexion = new Conexion(); 
/*
	echo "Conexion a Oracle Lista" . "<br>";


	//ultimo id
	//$sql = "SELECT * FROM persona WHERE idpersona = ( SELECT MAX(idpersona) FROM persona )";

	$sql = "SELECT * FROM persona ";

	$resultado = $conexion->ejecutarConsulta($sql);

    //echo $sql;

    //echo  "<br>" . "<br>";

	$resultadoUsuarios = array();
	while( $fila = $conexion->obtenerFila($resultado) ){
		$resultadoUsuarios[] = $fila;
	}
	echo json_encode($resultadoUsuarios);



	//echo  "<br>" . "<br>";

	echo $conexion->cantidadRegistros($resultado);




$conexion->CerrarConexion();

*/
?>




</body>
</html>