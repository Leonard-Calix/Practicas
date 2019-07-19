<?php 

	include_once '../conexion/conexion.php';

	$conexion = new conexion();

	$sql = "SELECT * FROM cigarrillos";

	$resultado = $conexion->ejecutarConsulta($sql);
    $arregloResultadoCigarros = array();

    while($fila = $conexion->obtenerFila($resultado)){             
    	$arregloResultadoCigarros[] = $fila;
               
    }

    echo json_encode($arregloResultadoCigarros);


 ?>