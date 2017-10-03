<html>
	<head>
		<title>Procesamiento de los datos del formulario GET / POST</title>
	</head>
	<body> 
		<!-- Esto envía 2 archivos -->
		<?php
			$nombre = $_GET['nombre'];
			$modulos = $_GET['modulos'];
			echo "Nombre : ".$nombre."<br>";
			foreach($modulos as $modulo){
				echo "modulo ".$modulo. "<br>";
			}
			
			
			print_r($_GET);
		?>
	</body>
</html>