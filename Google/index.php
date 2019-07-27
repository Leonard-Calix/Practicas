<?php
  //Esta linea verifica que si no hay un parametro en GET con la carpeta actual lo redireccione a home:
if(!isset($_GET['carpeta']))
	header("location: index.php?carpeta=home");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Probando</title>
	<!--- Estilos De Bootstrap-->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
	<!--- Estilos fontawesome -->
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
	<!--- Estilos Css -->
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>
	<!-- Inicio de Codificacion-->
	<div class="m-2">
		<input type="text" id="carpetaActual" class="form-control" value="<?php echo isset($_GET['carpeta'])?$_GET['carpeta']:''; ?>" disabled>
		<input type="hidden" name="usuario" id="usuario">
	</div>

	<div class="container-fluid">
		<!--Carpetas-->
		<div class="row mt-5" >
			<div class="col-md-2">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
					Carpeta
				</button>
			</div>
			<div class="col-md-10">
				<div class="row" id="carpetas">
					<div id="mensaje"></div>
					<!--
					<div class="col-md-3 carpeta m-2">
						<a href="index.php?carpeta=nombre"><i class="fas fa-folder tamanio"></i> <span class="nombre">Fotos</span> </a>
					</div>
				-->
			</div>
		</div>
	</div>
	<!--Archivos-->
	<div class="row mt-5" >
		<div class="col-md-2">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Archivo</button>
		</div>
		<div class="col-md-10">
			<div class="row" id="archivos">
				<div id="mensaje"></div>
					<!--
					<div class="col-md-3 carpeta m-2">
						<a href="index.php?carpeta=nombre"><i class="fas fa-folder tamanio"></i> <span class="nombre">Fotos</span> </a>
					</div>
				-->
			</div>
		</div>
		<div class="row">

			<div class="col-md-12" >
				<!-- Dropdown Trigger -->
				<a class='dropdown-triggers btnc' href='#' data-target='dropdown1'>Drop Me!</a>

				<!-- Dropdown Structure -->
				<ul id='dropdown1' class='dropdown-contentc'>
					<li><a class="dropdown-item" href="#!">one</a></li>
					<li><a class="dropdown-item" href="#!">two</a></li>
					<li class="divider" tabindex="-1"></li>
					<li><a class="dropdown-item" href="#!">three</a></li>
					<li><a  class="dropdown-item" href="#!"><i class="material-icons">view_module</i>four</a></li>
					<li><a class="dropdown-item" href="#!"><i class="material-icons">cloud</i>five</a></li>
				</ul>

			</div>

		</div>
	</div>
	<br><br>
	
	<div class="dropdown "  >
		<a class="btn btn-secondary dropdown-toggle bg-light" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: black; background: white;">
			Mas
		</a>

		<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
			<button type="button" class="btn btn-primary dropdown-item" data-toggle="modal" data-target="#exampleModal">
				Carpeta
			</button>
			<div class="custom-file">
				<input type="file" width="25px" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
				<label class="custom-file-label" for="inputGroupFile04">Subir</label>
			</div>
		</div>
	</div>

	<br><br>


</div>






<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Nombre carpeta</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="text" class="form-control" name="" id="nombreC">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				<button type="button" class="btn btn-primary" id="btn-crear" data-dismiss="modal">Crear</button>
			</div>
		</div>
	</div>
</div>
<!-- Fin Modal -->

<!-- Fin de codificacion-->

<!--- JQuery-->	
<script type="text/javascript" src="js/jquery.js"></script>
<!---bootstrap JQuery-->
<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
<!--- Contrsolador JS-->	
<script type="text/javascript" src="js/Controlador.js"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script type="text/javascript">
	
	document.addEventListener('DOMContentLoaded', function() {
		var elems = document.querySelectorAll('.dropdown-triggers');
		var instances = M.Dropdown.init(elems, options);
	});

  // Or with jQuery

  $('.dropdown-triggers').dropdown();
</script>


</body>
</html>