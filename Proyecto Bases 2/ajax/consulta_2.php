
<?php 

$host="localhost";
$dbname="cigarros";
$username="root";
$password="";

try {   

	$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

	$sql = 'CALL SP_CONSULTA2(@monto)';
	$stmt = $conn->prepare($sql);
	$stmt->execute();
    $stmt->closeCursor(); //permite limpiar y ejecutar la segunda query

 // este codigo es para recuperar un valor

    $r = $conn->query('select @monto'); 
    $monto = $r->fetchColumn();

    $dato = array("monto" => $monto);

    echo json_encode($dato);

}catch (PDOException $pe) {
	die("Error occurred:" . $pe->getMessage());
} 


?>