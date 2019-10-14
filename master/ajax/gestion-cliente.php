<?php 

	include_once '../clases/clase-usuario.php';
	
	switch ( $_GET["accion"] ) {
		case 'login':


			// funcion estarica 
			$correo = $_POST["pcorreo"];
			$contrasenia = $_POST["pcontrasenia"];

			$res = Usuario::login( $correo, $contrasenia );

			$data = array('res' => $res );

			echo json_encode($data);

/*
			funciuon normal
			$usuario = new Usuario("unitec", "1234");
			$usuario->login();
*/				
			break;

			case 'agregarCliente':
				# code...
				break;
		
			case 'eliminarCliente':
				# code...
				break;

			case 'compre':
				# code...
				break;
		default:
			# code...
			break;
	}

 ?>