<?php
include("modelo.php");
include("vista.php");
cabecera();
if (isset($_POST['baja'])){
	$action = "dio de baja";
	$mySQL = new MySQL();

	$dni = $_POST["dni"];
	$cliente = new cliente();
	$cliente->dniCliente = $dni;

	$result = $cliente->baja($mySQL);

	if($result=="t"){
		exito($action);
	}else{
		error();
	}
}
footer();
?>