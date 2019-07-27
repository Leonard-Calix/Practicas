
<?php

  if($_GET['id']){
		$id = $_GET['id'];
  }

	try {
		require_once('class/class-conexion.php');
		$conexion = new conexion();
    $sql = "DELETE FROM `contactos` WHERE `id` = '{$id}'; ";
		$resultado = $conexion->ejecutarConsulta($sql);
    } catch ( Excepcion $e ){
		$error = $e->getMessage();
	}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Agenda de Contactos PHP</title>
	<meta charset="utf-8">
  <link rel="icon" type="image/png" href="img/icono.png" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
	<div class="contenedor">
		<div class="contenido">
			   <h2>Agenda De Contactos</h2><br>
				<?php
				    if($resultado){
                        echo "Contacto Borrado";
					}else{
						echo "Error";
					}
					$conexion->cerrarConexion();
				?>
			<br><a class="volver" href="index.php">Volver</a>
		</div>
	</div>

</body>
</html>
