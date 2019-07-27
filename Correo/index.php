<!DOCTYPE html>
<html>
<head>
	<title>Correo</title>
</head>
<body>
	<?php 

		$asunto = "Prueba";
		$destino = "bcalixvelasquez@gmail.com";
		$desde = "From:" . "LeoanardCalix";
		$mensaje = "Funciona Prrr!";

		mail($destino, $asunto, $mensaje);

		echo "Correo Enviado.....";



	 ?>

</body>
</html>