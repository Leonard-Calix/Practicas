<?php 

	include_once '../conexion/conexion.php';

	$conexion = new conexion();

	$id = $_GET["id"];



	$sql = "SELECT * FROM cigarrillos WHERE idcigarrillos=$id";

	$resultado = $conexion->ejecutarConsulta($sql);
    $arregloResultadoCigarros = array();

    while($fila = $conexion->obtenerFila($resultado)){             
    	$arregloResultadoCigarros[] = $fila;
               
    }

    echo json_encode($arregloResultadoCigarros);


 ?>