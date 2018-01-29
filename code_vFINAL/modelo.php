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

		public $dniCliente;
		public $nombre;
		public $direccion;
		public $email;
		public $pwd;

		public function __construct(){

		}

		public function alta($mySQL){
			if($mySQL->link->query("INSERT INTO `virtualmarket`.`clientes` (`dniCliente`, `nombre`, `direccion`, `email`, `pwd`) VALUES ('".$this->dniCliente."', '".$this->nombre."', '".$this->direccion."', '".$this->email."', '".$this->pwd."')")===TRUE){
				return "t";
			}else{
				return "error";
			}
		}

		public function baja($mySQL){
			if($mySQL->link->query("DELETE FROM clientes WHERE `dniCliente`=".$this->dniCliente."")===TRUE){
				return "t";
			}else{
				return "error";
			}
		}

		public function consulta($mySQL){
			$result = $mySQL->link->query("SELECT * FROM clientes WHERE `dniCliente`=".$this->dniCliente);

			$array = array();
			while ($row = $result->fetch_assoc()) {
				foreach ($row as $key => $value) {
					$array[$key]=$value;
				}
			}
			return $array;
			
		}

		public function mod($mySQL){
			if($mySQL->link->query("UPDATE clientes SET `nombre`='".$this->nombre."', `direccion`='".$this->direccion."', `email`='".$this->email."', `pwd`='".$this->pwd."' WHERE `dniCliente`=".$this->dniCliente)===TRUE){
				return "t";

			}else{
				return "error";

			}
		}

		public function __get($propiedad){
			return $this->$propiedad;
		}
		public function __set($propiedad, $value){
			$this-$property = $value;
		}
	}

	class listado{

		public function __construct(){

		}

		public function lista($mySQL){
			$result = $mySQL->link->query("SELECT * FROM `clientes`");
			return $result;
		}
	}
?>