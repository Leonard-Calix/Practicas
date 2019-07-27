<?php 

include_once 'conexionOracle.php'; 
$conexion = new Conexion(); 

$nombre = "Juan";
$numero = "1798-7898";
$codigo = "NA08";

$sql = sprintf("INSERT INTO contacto(IDCONTACTO, NOMBRE, NUMERO) VALUES ('$codigo','$nombre','$numero')"); 
$resultado = $conexion->ejecutarConsulta($sql);

if ($resultado) {
	# code...
	echo "Reguistro Exitoso : " .  $conexion->cantidadRegistros($resultado) . " Reguistros Guardado" ;
} else {
# code...
	echo "Reguistro no guardado";
}

$conexion->CerrarConexion();


?>