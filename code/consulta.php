<?php
include("modelo.php");
include("vista.php");
cabecera();
if (isset($_POST['con'])){
	$mySQL = new MySQL();

	$dni = $_POST["dni"];
	$cliente = new cliente();
	$cliente->dniCliente = $dni;

	$result = $cliente->consulta($mySQL);
	conVista($result);
}
footer();
?>