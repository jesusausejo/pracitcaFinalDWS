<?php

	function cabecera(){
		echo "<!DOCTYPE html>
			<html lang='es'>
			<head>
				<meta charset='UTF-8'>
				<title>Practica final DWS</title>

				<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css' integrity='sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb' crossorigin='anonymous'>
				<link rel='stylesheet' href='css/css.css'>
			</head>
			<body>";


		echo "<nav class='navbar navbar-expand-lg navbar-light' style='background-color: #e3f2fd;'>";
			echo "<button class='navbar-toggler navbar-toggler-right' type='button' data-toggle='collapse' data-target='#navbarColor03' aria-controls='navbarColor03' aria-expanded='false' aria-label='Toggle navigation'>";
			echo "<span class='navbar-toggler-icon'></span>";
			echo "</button>";
			echo "<a class='navbar-brand' href='index.php' title='Inicio'>Clientes</a>";

			echo "<div class='collapse navbar-collapse' id='navbarColor03'>";
				echo "<ul class='navbar-nav mr-auto'>";
					echo "<li class='nav-item'>";
					echo "<a class='nav-link' href='index.php?section=Listado' title='Listado'>Listado</a>";
					echo "</li>";
					echo "<li class='nav-item'>";
					echo "<a class='nav-link' href='index.php?section=Alta' title='Alta'>Alta</a>";
					echo "</li>";
					echo "<li class='nav-item'>";
					echo "<a class='nav-link' href='index.php?section=Baja' title='Baja'>Baja</a>";
					echo "</li>";
					echo "<li class='nav-item'>";
					echo "<a class='nav-link' href='index.php?section=Modificacion' title='Modificación'>Modificación</a>";
					echo "</li>";
					echo "<li class='nav-item'>";
					echo "<a class='nav-link' href='index.php?section=Consulta' title='Consulta'>Consulta</a>";
					echo "</li>";
				echo "</ul>";
			echo "</div>";
		echo "</nav><br>";

	}

	function footer(){
		if(isset($_GET['section'])){
			$section = $_GET['section'];
		}else{
			$section = "Inicio";
		}

		echo "<div class='list-group fixed-bottom'>";
			echo "<a href='' class='list-group-item list-group-item-action list-group-item-light'>Estás en la sección de ".$section."</a>";
		echo "</div>";


		echo "
			<script src='https://code.jquery.com/jquery-3.2.1.slim.min.js' integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'></script>
			<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js' integrity='sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh' crossorigin='anonymous'></script>
			<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js' integrity='sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ' crossorigin='anonymous'></script>
		</body>

			
		</html>";
	}

	function content(){
		if(isset($_GET['section'])){
			$section = $_GET['section'];
		}else{
			$section = "Inicio";
		}
		switch ($section) {
			case "Inicio":
				inicio();
				break;
			case "Listado":
				listado();
				break;
			case "Alta":
				alta();
				break;
			case "Baja":
				baja();
				break;
			case "Modificacion":
				modificacion();
				break;
			case "Consulta":
				consulta();
				break;
		}
	}

	function inicio(){
		echo "<div class='jumbotron'>";
			echo "<h1 class='display-3'>Bienvenido a Clientes!</h1>";
			echo "<p class='lead'>Aquí podrás administrar los clientes de la web.</p>";
			echo "<hr class='my-2'>";
			echo "<p>Ésta es una herramienta fácil de usar y muy útil.</p>";
			echo "<p class='lead'>";
			echo "<a class='btn btn-info btn-lg float-right' href='index.php?section=Listado' role='button'>Listado</a>";
			echo "</p>";
		echo "</div>";
	}

	function listado(){
		$i=1;
		$result = listadoClientes();
		echo "<table class='table table-hover'>";
			echo "<thead>";
				echo "<tr class='table table-primary'>";
					echo "<th>#</th>";
					echo "<th>DNI</th>";
					echo "<th>Nombre</th>";
					echo "<th>Dirección</th>";
					echo "<th>Email</th>";
					echo "<th>Contraseña</th>";
			echo "</thead>";
			echo "<tbody>";
			while ($row = $result->fetch_assoc()) {
				echo "<tr class='table'>";
				echo "<th scope='row'>$i</th>";
					foreach ($row as $key => $value) {
						echo "<td>$value</td>";
					}
				echo "</tr>";
				$i++;
			}
			echo "</tbody>";
		echo "</table>";
	}

	function alta(){
		echo "<form action='alta.php' method='post'>
			<div class='form-group'>
				<label for='formGroupExampleInput'>DNI</label>
				<input type='text' class='form-control mb-2 mr-sm-2' name='dni' placeholder='DNI'>
			</div>
			<div class='form-group'>
				<label for='formGroupExampleInput'>Nombre</label>
				<input type='text' class='form-control' name='nom' placeholder='Nombre'>
			</div>
			<div class='form-group'>
				<label for='formGroupExampleInput'>Dirección</label>
				<input type='text' class='form-control' name='dir' placeholder='Dirección'>
			</div>
			<div class='form-group'>
				<label for='formGroupExampleInput'>Email</label>
				<input type='text' class='form-control' name='email' placeholder='Email'>
			</div>
			<div class='form-group'>
				<label for='formGroupExampleInput'>Contraseña</label>
				<input type='text' class='form-control' name='pwd' placeholder='Contraseña'>
			</div>

			<button type='submit' class='btn btn-primary mb-2 float-right' name='alta'>Alta</button>
		</form>";
	}

	function baja(){
		echo "<form action='baja.php' method='post'>
			<div class='form-group'>
				<label for='formGroupExampleInput'>DNI del Cliente que se quiere dar de baja</label>
				<input type='text' class='form-control mb-2 mr-sm-2' name='dni' placeholder='DNI'>
			</div>
			<button type='submit' class='btn btn-primary mb-2 float-right' name='baja'>Baja</button>
		</form>";
	}

	function modificacion(){
		echo "<form action='modificacion.php' method='post'>
			<div class='form-group'>
				<label for='formGroupExampleInput'>DNI del Cliente que se quiere modificar</label>
				<input type='text' class='form-control mb-2 mr-sm-2' name='dni' placeholder='DNI'>
			</div>
			<button type='submit' class='btn btn-primary mb-2 float-right' name='mod'>Modificar</button>
		</form>";
	}

	function consulta(){
		echo "<form action='consulta.php' method='post'>
			<div class='form-group'>
				<label for='formGroupExampleInput'>DNI del Cliente que se quiere consultar</label>
				<input type='text' class='form-control mb-2 mr-sm-2' name='dni' placeholder='DNI'>
			</div>
			<button type='submit' class='btn btn-primary mb-2 float-right' name='con'>Consulta</button>
		</form>";
	}

	function modVista($array){
		echo "<br><div class='container'>";
		echo "<form action='modificacion_detalle.php' method='post'>";
		foreach ($array as $key => $value) {
			if($key=="dniCliente"){
				echo "
				<div class='form-group'>
					<label for='formGroupExampleInput'>".$key."</label>
					<input type='text' class='form-control mb-2 mr-sm-2' name='".$key."' value='".$value."'>
				</div>";
			}else{
				echo "
					<div class='form-group'>
						<label for='formGroupExampleInput'>".$key."</label>
						<input type='text' class='form-control mb-2 mr-sm-2' name='".$key."' value='".$value."'>
					</div>";
			}

				
		}
		echo "<button type='submit' class='btn btn-primary mb-2 float-right' name='mod2'>Modificar</button>
			</form>";
		echo "</div>";
	}

	function conVista($array){
		echo "<br><div class='container'>";
		echo "<form><fieldset disabled>";
		foreach ($array as $key => $value) {
			echo "
			<div class='form-group'>
				<label for='formGroupExampleInput'>".$key."</label>
				<input type='text' class='form-control mb-2 mr-sm-2' name='".$key."' value='".$value."'>
			</div>";

				
		}
		echo "</form></fieldset>";
		echo "</div>";
	}

	function exito($action){
		echo "<div class='card'>
		  <div class='card-body'>
		    Se ".$action." con éxito.
		  </div>
		</div>";
	}
	function error(){
		echo "<div class='card'>
		  <div class='card-body'>
		    Ha ocurrido un error.
		  </div>
		</div>";
	}

?>