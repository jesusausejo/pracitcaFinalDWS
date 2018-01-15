<?php
	class MySQL{

		private $link;

		public function __construct(){ // CONSTRUCTOR CONECTAR
			if(!isset($this->link)){
				$this->link = new mysqli("localhost", "root", "root");
				$this->link->select_db("virtualmarket");
			}
		}
		public function desconectar(){
			mysqli_close($this->link);
		}

		public function __get($link){
			if (property_exists(__CLASS__, $link))return $this->link;
			return NULL;
		}

	}

	class cliente{

		private $dniCliente;
		private $nombre;
		private $direccion;
		private $email;
		private $pwd;

		public function __construct(){

		}

		public function alta($link){
			
		}

		public function baja($link){
			
		}

		public function mod($link){
			
		}

		public function consulta($link){
			
		}

		public function __get($dniCliente){
			if (property_exists(__CLASS__, $dniCliente))return $this->dniCliente;
			return NULL;
		}
	}
?>