<?php

		function peticion_ajax() {
			return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
		}
		$nombre = htmlspecialchars( $_POST['nombre'] );
    $numero = htmlspecialchars( $_POST['numero'] );

		try {
			require_once('class/class-conexion.php');
			$conexion = new conexion();
			$sql = "INSERT INTO `contactos` (`id`, `nombre`, `telefono`) ";
			$sql.= "VALUES (NULL, '$nombre', '$numero'); ";
			$resultado = $conexion->ejecutarConsulta($sql);

			if (peticion_ajax() ) {
				echo json_encode(array(
							'respuesta' => $resultado,
							'nombre'  => $nombre,
							'telefono' => $numero,
							'id' => $conn->insert_id));
			} else {
				exit;
			}
    } catch ( Excepcion $e ){
			$error = $e->getMessage();
		}



   $conexion->cerrarConexion();
?>
