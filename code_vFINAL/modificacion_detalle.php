<?php
include("modelo.php");
include("vista.php");
cabecera();
if (isset($_POST['mod2'])){
	$mySQL = new MySQL();
	$action = "modificó";

	$dni = $_POST["dniCliente"];
	$nom = $_POST["nombre"];
	$dir = $_POST["direccion"];
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


	$result = $cliente->mod($mySQL);
	if($result=="t"){
		exito($action);
	}else{
		error();
	}
}
footer();
?>