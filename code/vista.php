<?php

	function cabecera(){
		echo "<nav class='navbar navbar-expand-lg navbar-light' style='background-color: #e3f2fd;'>";
			echo "<button class='navbar-toggler navbar-toggler-right' type='button' data-toggle='collapse' data-target='#navbarColor03' aria-controls='navbarColor03' aria-expanded='false' aria-label='Toggle navigation'>";
			echo "<span class='navbar-toggler-icon'></span>";
			echo "</button>";
			echo "<a class='navbar-brand' href='#!'>Clientes</a>";

			echo "<div class='collapse navbar-collapse' id='navbarColor03'>";
				echo "<ul class='navbar-nav mr-auto'>";
					echo "<li class='nav-item'>";
					echo "<a class='nav-link' href='#!'>Listado</a>";
					echo "</li>";
					echo "<li class='nav-item'>";
					echo "<a class='nav-link' href='#!'>Alta</a>";
					echo "</li>";
					echo "<li class='nav-item'>";
					echo "<a class='nav-link' href='#!'>Baja</a>";
					echo "</li>";
					echo "<li class='nav-item'>";
					echo "<a class='nav-link' href='#!'>Modificación</a>";
					echo "</li>";
					echo "<li class='nav-item'>";
					echo "<a class='nav-link' href='#!'>Consulta</a>";
					echo "</li>";
				echo "</ul>";
			echo "</div>";
		echo "</nav>";

	}

	function footer(){

	}

?>