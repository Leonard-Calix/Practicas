<?php 


include_once '../clases/class-carpeta.php';
include_once '../clases/class-archivo.php';



//$car = new Carpeta(null, "home", 1, "Unah", "12-10-19" );

//$arrayCarpetas = json_decode(file_get_contents("../data/carpetaData.json"),true);
		
/*
		$carpetas = json_decode(file_get_contents("../data/carpeta.json"),true);
                
        $t["codigoCarpeta"]=1;
        $t["carpeta"]="home";
        $t["CodigoUsuario"]=1;
        $t["nombre"]="Rubio";

                
        $carpetas[] = $t;
        $archivo = fopen("../data/carpeta.json","w");
        fwrite($archivo, json_encode($carpetas));


*/

        echo Archivo::obtenerArchivos("home",1);
        

       // $carpeta = Carpeta::obtenerId("Zayra",1);

        //echo $carpeta;


        //echo Archivo::obenerArchivos(1, $carpeta);
?>
