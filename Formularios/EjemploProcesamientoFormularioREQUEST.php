<html>
	<head>
		<title>Procesamiento de los datos del formulario REQUEST</title>
	</head>
	<body> 
		<?php
			$nombre = $_REQUEST['nombre'];
			$modulos = $_REQUEST['modulos'];
			echo "Nombre : ".$nombre."<br>";
			foreach($modulos as $modulo){
				echo "modulo ".$modulo. "<br>";
			}
			
			
			print_r($_REQUEST);
		?>
	</body>
</html>