

<?php 

$host="localhost";
$dbname="cigarros";
$username="root";
$password="";

try {   

	$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

	$sql = 'CALL SP_VentasDucados(@pcventas, @pcMarcas)';
	$stmt = $conn->prepare($sql);
	$stmt->execute();
    $stmt->closeCursor(); //permite limpiar y ejecutar la segunda query

 // este codigo es para recuperar un valor

    $r = $conn->query('select @pcventas, @pcMarcas')->fetch();

    $marca = $r['@pcMarcas']; 
    $venta = $r['@pcventas']; 

    $datos = array("marca" => $marca, "venta" => $venta);

    echo json_encode($datos);

}catch (PDOException $pe) {
	die("Error occurred:" . $pe->getMessage());
} 


?>