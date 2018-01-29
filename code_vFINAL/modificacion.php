<?php
include("modelo.php");
include("vista.php");
cabecera();
if (isset($_POST['mod'])){
	$mySQL = new MySQL();

	$dni = $_POST["dni"];

	$dni = htmlspecialchars($dni);
	
	$cliente = new cliente();
	$cliente->dniCliente = $dni;

	if($dni!="" && is_numeric($dni)==true){
		$result = $cliente->consulta($mySQL);
		if($result=="error"){
			error();
		}else{
			modVista($result);
		}
	}else{
		error();
	}
}
footer();
?>