<?php 

	
	class Conexion2{
		private $conexion;

		function __construct(){
			$this->conexion = new mysqli("localhost", "root", "", "cigarros");
		}

		public function getConexion(){
			return $this->conexion;
		}

	}

 ?>
