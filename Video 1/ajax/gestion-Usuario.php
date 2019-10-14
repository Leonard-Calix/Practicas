<?php 

	include_once '../clases/clase-usuario.php';

	switch ($_GET["accion"]) {
		
		case 'login':
			
			$usuario = new Usuario($_POST["correo"], $_POST["contrasenia"]);
			$res = $usuario->login();

			echo json_encode( array('resultado' => $res ) );


		break;

		case 'login2':
			$res = Usuario::login_static($_POST["correo"], $_POST["contrasenia"]);
			$salida = array('resultado' => $res );
			echo json_encode($salida);
		break;
		
		default:
			# code...
			break;
	}











 ?>