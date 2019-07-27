<?php

	if ( isset($_GET['id']) ) {
		$id = $_GET['id'];
	}

	try {
		require_once('class/class-conexion.php');
		$conexion = new conexion();
		$sql = "SELECT * FROM contactos";
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
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>
	<div class="contenedor">
		<h1>Agende de Contactos</h1>
		<div class="contenido">
			<h4>Nuevo contacto</h4><br>
			<form action="crear.php" method="post" id="formularioCrearUsuario">
				<div class="campo">
					<label for="Nombre">Nombre<input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre"></label>
				</div>
				<div class="campo">
          <label for="Numero">Numero<input class="form-control" type="text" name="numero" id="numero" placeholder="Numero"></label>
				</div>
				<input id="btnAgregar" class="btn btn-primary" type="submit" name="" value="Agregar">
			</form>
			<div class="contenido existentes">
			   <p> Contactos Existentes  <?php echo $resultado->num_rows; ?> </p>

				<table class="table">
					<thead class="thead-dark">
						<tr>
							<th> Nombre </th>
							<th> Numero </th>
							<th> Borrar </th>
							<th> Editar </th>
						</tr>
					</thead>
					<tbody>
						<?php while( $registros = $resultado->fetch_assoc() ){ ?>
						    <tr>
									<td> <?php echo $registros['nombre'];  ?> </td>
									<td> <?php echo $registros['telefono'];  ?> </td>
									<td class="borrar" class="borrar" > <a href="borrar.php?id= <?php echo $registros['id']; ?> ">Borrar</a> </td>
									<td class="editar" > <a href="editar.php?id=<?php echo $registros['id']; ?> ">Editar</a> </td>
							  </tr>
						<?php }?>
					</tbody>
				</table>
			</div>
		</div>
		<?php $conexion->cerrarConexion(); ?>
	</div>
		<script type="text/javascript" src="js/api.js">

		</script>
</body>
</html>
