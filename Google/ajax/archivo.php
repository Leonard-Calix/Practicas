<?php 

	include_once '../clases/class-archivo.php';

	switch ($_GET["accion"]) {
		case 'agregar':
			# code...
			break;

		case 'obtener':
			echo Archivo::obtenerArchivos($_POST["carpeta"],1);
			break;

		default:
			# code...
			break;
	}












 ?>