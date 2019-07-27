<?php 
	
	switch ($_GET["accion"]) {

		case 'agregar':

			$conexion = new PDO("mysql:host=localhost;dbname=contactos", "root", "");
			
    		$nombre = $_POST["nombre"];
    		$telefono = $_POST["numero"];

			$sql = 'CALL insertarContacto(:in_nombre, :in_telefono, @mensaje)';
			$resultado = $conexion->prepare($sql);
			// enviando parametros al procedimiento
			$resultado->bindParam(':in_nombre', $nombre, PDO::PARAM_STR, 100);
			$resultado->bindParam(':in_telefono', $telefono, PDO::PARAM_STR, 100);
			// ejecutando la consulta
			$resultado->execute();
    		$resultado->closeCursor(); 

    		// recuperando el parametro de salida del procediiento
    		$salida = $conexion->query('select @mensaje');
    		$mensaje = $salida->fetchColumn();
    		

    		if ($mensaje!=null) {
    			echo '{"resultado": "Agregado", "codigo": 1 }';
    		}else{
    			echo '{"resultado": "Error", "codigo": 0 }';
    		}
    	   
		break;
		

		case 'mostrar':
			include '../class/class-conexion.php';
			$conexion = new Conexion();

			$sql = "SELECT * FROM view_contacto";
			$resultado = $conexion->ejecutarConsulta($sql);

			$registo = array();

			while ( $contacto = $conexion->obtenerFila($resultado) ) {
				$registo[] = $contacto; 
			}

			echo json_encode($registo);

		break;
	}




 ?>