<?php
include("modelo.php");
include("vista.php");
cabecera();
if (isset($_POST['alta'])){
	$action = "dio de alta";
	$mySQL = new MySQL();

	$dni = $_POST["dni"];
	$nom = $_POST["nom"];
	$dir = $_POST["dir"];
	$email = $_POST["email"];
	$pwd = $_POST["pwd"];

	$dni = htmlspecialchars($dni);
	$nom = htmlspecialchars($nom);
	$dir = htmlspecialchars($dir);
	$email = htmlspecialchars($email);
	$pwd = htmlspecialchars($pwd);

	$cliente = new cliente();
	$cliente->dniCliente = $dni;
	$cliente->nombre = $nom;
	$cliente->direccion = $dir;
	$cliente->email = $email;
	$cliente->pwd = $pwd;
	if($dni!=""){
		$result = $cliente->alta($mySQL);
	}else{
		$result="error";
	}

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