<?php

	class Usuario{

		private $corre	;
		private $contrasenia;

		public function __construct($corre	,
					$contrasenia){
			$this->corre	 = $corre	;
			$this->contrasenia = $contrasenia;
		}
		public function getCorre	(){
			return $this->corre	;
		}
		public function setCorre	($corre	){
			$this->corre	 = $corre	;
		}
		public function getContrasenia(){
			return $this->contrasenia;
		}
		public function setContrasenia($contrasenia){
			$this->contrasenia = $contrasenia;
		}
		public function toString(){
			return "Corre	: " . $this->corre	 . 
				" Contrasenia: " . $this->contrasenia;
		}

		public static function login($correo, $contrasenia){

			if ( $correo=="unah" && $contrasenia=="1234" ) {
				return 1;
			}else{
				return 0;
			}
		}
	}
?>