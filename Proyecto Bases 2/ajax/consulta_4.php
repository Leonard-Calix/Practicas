
<?php 

$host="localhost";
$dbname="cigarros";
$username="root";
$password="";

try {   

	$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

	$sql = 'CALL SP_Consulta_4(@TipoMarca, @monto)';
	$stmt = $conn->prepare($sql);
	$stmt->execute();
    $stmt->closeCursor(); //permite limpiar y ejecutar la segunda query

 // este codigo es para recuperar un valor

    $r = $conn->query('select @TipoMarca, @monto')->fetch();

    $monto = $r['@monto']; 
    $marca = $r['@TipoMarca']; 

    $datos = array("marca" => $marca, "monto" => $monto);

    echo json_encode($datos);

}catch (PDOException $pe) {
	die("Error occurred:" . $pe->getMessage());
} 


?>