<!DOCTYPE html>
<html>
<head>
<title> Registro de Usuarios </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Registration Forms"/>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="../Includes/css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="//fonts.googleapis.com/css?family=Cormorant+SC:300,400,500,600,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>
<?php $optPerfil = null; ?>
<body>
	<div class="padding-all">
		<div class="header">
			<h1>Registro Form</h1>
		</div>

		<div class="design-w3l">
			<div class="mail-form-agile">
				<form id="frmRegistro"action="#" method="post">
                    <input type="text" name="name" id="name" placeholder="Nombre de Usuario"/>
                    <input type="text" name="email" id="email" placeholder="Correo Electronico">
					<input type="password"  name="password1" id="password1" class="padding" placeholder="Contraseña"/>
					<input type="password" name="password2" id="password2"  placeholder="Repite la Contraseña">
                	<br/>
					<label for="tipoUsuario" class="radio-inline">Perfil de Usuario</label>
                    <br/>
					<br/>
                    <label class="radio-inline"><input type="radio"  name="optPerf" value="1">Admin</label>
                    <label class="radio-inline"><input type="radio"  name="optPerf" value="2">Turista</label>
                    <label class="radio-inline"><input type="radio"  name="optPerf" value="3">GuiaTuristico</label>
					<br/>
					<br>
					<br>
					<input type="submit" name="acceder" value="Registrarse">
				</form>
			</div>
		  <div class="respuesta"> </div>
		</div>
		
		<div class="footer">
		<p>© 2019  Registrar Usuario. Agency of Tours | Design by <a href="#">  Ingenieria de Software </a></p>
		</div>
	</div>
	<script src="../Includes/js/jquery.js"></script>
	<script type="text/javascript">
		function redireccionar(){
    		document.location.href='index.php';
		}

    	$('#frmRegistro').on("submit",function(e){
      		e.preventDefault();
      		var nombre = $("#name").val();
      		var email = $("#email").val();
      		var password1 = $("#password1").val();
      		var password2 = $("#password2").val();
      		if ($('input[name="optPerf"]').is(':checked')) {
          		var optPerf = $('input[name="optPerf"]:checked').val();
      		} else {
        		alert('Se debe seleccionar un perfil de usuario');
      		}

      		var datos = {
        		"nombreUsuario":nombre,
        		"email":email,
        		"password1":password1,
        		"password2":password2,
        		"optPerf": optPerf
      		};
        //var data = datos.serialize();
        console.log( datos )
      	$.ajax({
        	method:"POST",
        	url: "../Controlador/registroUsuarios.php",
        	data: datos
      		}).done(function(info){
        		$('#respuesta').addClass("mostrar");
        		$('#respuesta').html(info);

        		$("#name").val('');
        		$("#email").val('');
        		$("#password1").val('');
        		$("#password2").val('');

        		setTimeout ("redireccionar()", 3000);
      		});
  		});
	</script>
</body>
</html>