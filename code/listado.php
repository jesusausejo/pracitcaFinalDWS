<?php

function listadoClientes(){
	$mySQL = new MySQL();

	$listado = new listado();
	$result = $listado->lista($mySQL);

	return $result;
}

?>