<?php

	class Archivo{

		private $codigoArchivo	;
		private $codigoCarpeta;
		private $nombre;

		public function getCodigoArchivo	(){
			return $this->codigoArchivo	;
		}
		public function setCodigoArchivo	($codigoArchivo	){
			$this->codigoArchivo	 = $codigoArchivo	;
		}
		public function getCodigoCarpeta(){
			return $this->codigoCarpeta;
		}
		public function setCodigoCarpeta($codigoCarpeta){
			$this->codigoCarpeta = $codigoCarpeta;
		}
		public function getNombre(){
			return $this->nombre;
		}
		public function setNombre($nombre){
			$this->nombre = $nombre;
		}

		public static function obtenerArchivos($nombreCarpeta, $usuario){
			$archivos = json_decode(file_get_contents("../data/archivo.json"),true);
			include_once 'class-carpeta.php';

			$idCarpeta = Carpeta::obtenerId($nombreCarpeta,1);

			$tem = array();
            $con=0;
		
			for ($i=0; $i < count($archivos); $i++) { 
                if ($archivos[$i]["CodigoUsuario"]==$usuario && $archivos[$i]["codigoCarpeta"]==$idCarpeta) {
                   $tem[$con]=$archivos[$i];
                   $con++;
                }
            }
            return json_encode($tem);
		}


	}
?>