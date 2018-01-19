<?php
include("modelo.php");
include("vista.php");
cabecera();
if (isset($_POST['alta']) && isset($_POST['dni']) && isset($_POST['nom']) && isset($_POST['dir']) && isset($_POST['email']) && isset($_POST['pwd'])){
	$action = "dio de alta";
	$mySQL = new MySQL();

	$dni = $_POST["dni"];
	$nom = $_POST["nom"];
	$dir = $_POST["dir"];
	$email = $_POST["email"];
	$pwd = $_POST["pwd"];

	$cliente = new cliente();
	$cliente->dniCliente = $dni;
	$cliente->nombre = $nom;
	$cliente->direccion = $dir;
	$cliente->email = $email;
	$cliente->pwd = $pwd;

	$result = $cliente->alta($mySQL);

	if($result=="t"){
		exito($action);
	}else{
		error();
	}
}
if(isset($_POST['alta']) && !isset($_POST['dni'])){
	error();
}
footer();
?>