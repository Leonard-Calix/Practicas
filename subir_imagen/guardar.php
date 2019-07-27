<?php 



$file = $_FILES["file"];
$carpeta = "imagenes/";
$nombre = $file["name"];
$src = $carpeta.$nombre;
$ruta_provisional = $file["tmp_name"];
$archivos = json_decode(file_get_contents("archivo.json"),true);


$t["codigoArchivo"]=( $archivos[count($archivos)-1]["codigoArchivo"] )+1;
$t["nombre"]=$nombre;
$t["tipo"]=$file["type"];
$t["carpeta"]="imagenes";
move_uploaded_file($ruta_provisional, $src);



$archivos[] = $t;
$archivo = fopen("archivo.json","w");
fwrite($archivo, json_encode($archivos));


echo "<img src='$src'>";

echo $_GET["accion"];

echo $_GET["usuario"];

echo $_GET["carpeta"];






























?>


