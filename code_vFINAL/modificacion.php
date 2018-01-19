<?php
include("modelo.php");
include("vista.php");
cabecera();
if (isset($_POST['mod'])){
	$mySQL = new MySQL();

	$dni = $_POST["dni"];
	$cliente = new cliente();
	$cliente->dniCliente = $dni;

	$result = $cliente->consulta($mySQL);
	modVista($result);
}
footer();
?>