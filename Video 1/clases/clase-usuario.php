<?php

	class Usuario{

		private $correo;
		private $contrasenia;

		public function __construct($correo,
					$contrasenia){
			$this->correo = $correo;
			$this->contrasenia = $contrasenia;
		}
		public function getCorreo(){
			return $this->correo;
		}
		public function setCorreo($correo){
			$this->correo = $correo;
		}
		public function getContrasenia(){
			return $this->contrasenia;
		}
		public function setContrasenia($contrasenia){
			$this->contrasenia = $contrasenia;
		}
		public function toString(){
			return "Correo: " . $this->correo . 
				" Contrasenia: " . $this->contrasenia;
		}

		public function login(){



			return 1;
		}

		public static function login_static($correo, $contrasenia){


			
			return 0;
		}
	}
?>