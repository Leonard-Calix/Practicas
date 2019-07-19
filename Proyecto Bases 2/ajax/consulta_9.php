<?php 

$host="localhost";
$dbname="cigarros";
$username="root";
$password="";

try {   

	$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

	$sql = 'CALL SP_Consulta_9(@idEstanco, @Estanco)';
	$stmt = $conn->prepare($sql);
	$stmt->execute();
    $stmt->closeCursor(); //permite limpiar y ejecutar la segunda query

 // este codigo es para recuperar un valor

    $r = $conn->query('select @idEstanco, @Estanco')->fetch();

    $estanco = $r['@Estanco']; 
    $id = $r['@idEstanco']; 

    $datos = array("id" => $id, "estanco" => $estanco);

    echo json_encode($datos);

}catch (PDOException $pe) {
	die("Error occurred:" . $pe->getMessage());
} 


?>