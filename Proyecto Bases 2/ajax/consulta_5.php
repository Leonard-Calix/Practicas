
<?php 

$host="localhost";
$dbname="cigarros";
$username="root";
$password="";

try {   

	$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

	$sql = 'CALL SP_IngresosPorMarca(@pcIngreso)';
	$stmt = $conn->prepare($sql);
	$stmt->execute();
    $stmt->closeCursor(); //permite limpiar y ejecutar la segunda query

 // este codigo es para recuperar un valor

    $r = $conn->query('select @pcIngreso'); 
    $monto = $r->fetchColumn();

    $dato = array("ingresos" => $monto);

    echo json_encode($dato);

}catch (PDOException $pe) {
	die("Error occurred:" . $pe->getMessage());
} 


?>