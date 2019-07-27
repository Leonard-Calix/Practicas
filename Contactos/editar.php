<?php

	if ( isset($_GET['id']) ) {
		$id = $_GET['id'];
	}

	try {
		require_once('class/class-conexion.php');
		$conexion = new conexion();
		$sql = "SELECT * FROM contactos WHERE `id` = {$id}";
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
		<h1>Agende de Contactos</h1>

    <?php while( $registros = $resultado->fetch_assoc() ){ ?>
		<div class="contenido">
			<h2>Editar contacto</h2>
			<form action="actualizar.php" method="get">
				<div class="campo">
					Nombre<input class="form-control" type="text" name="nombre" id="nombre"  placeholder="Nombre" value=" <?php echo  $registros['nombre']; ?>">
				</div>
				<div class="campo">
          Numero<input class="form-control" type="text" name="numero" id="numero" placeholder="Numero"  value="<?php echo  $registros['telefono']; ?>" >
				</div>
				<input type="hidden" id="" name="id" value="<?php echo  $registros['id']; ?>">
				<input class="btn btn-primary" type="submit" name="" value="Modificar">
			</form>
			</div>
		</div>
	    <?php } ?>
		<?php $conexion->cerrarConexion(); ?>
	</div>

</body>
</html>
