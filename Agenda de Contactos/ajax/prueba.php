<?php 

			$conexion = new PDO("mysql:host=localhost;dbname=contactos", "root", "");
			
    		$nombre = "Calix";
    		$telefono = "33524587";

			$sql = 'CALL insertarContacto(:in_nombre, :in_telefono, @mensaje)';
			$resultado = $conexion->prepare($sql);
			$resultado->bindParam(':in_nombre', $nombre, PDO::PARAM_STR, 100);
			$resultado->bindParam(':in_telefono', $telefono, PDO::PARAM_STR, 100);
			$resultado->execute();
    		$resultado->closeCursor(); 

    		$r = $conexion->query('select @mensaje');
    		$mensaje = $r->fetchColumn();
    		

    		if ($mensaje!=null) {
    			echo '{"resultado": "Agregado", "codigo": 1 }';
    		}else{
    			echo '{"resultado": "Error", "codigo": 0 }';
    		}

	




 ?>