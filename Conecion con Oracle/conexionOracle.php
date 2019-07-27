<?php
	class Conexion{
		private $hostDB = "localhost/xe";
		private $usuario = "SYSTEM";
		private $passDB =  "Calix1994";
		private $link;

		public function __construct(){
			$this->link = oci_connect("SYSTEM","Calix1994","localhost/xe");
		}
	

	public function ejecutarConsulta($sql){
			$query = oci_parse($this->link,$sql);
			 oci_execute($query);
            return $query;
		}


		public function obtenerFila($resultado){
			return oci_fetch_assoc($resultado);
		}


		 public function cerrarConexion(){
			oci_close($this->link);
		}


		public function antiInyeccion($texto){
		//[INDENT] return str_replace("'", "\'", $texto); [/INDENT] 

		}

		public function cantidadRegistros($resultado){
			return oci_num_rows($resultado);
			
		}

    }
?>