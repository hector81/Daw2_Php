<html>
	<head>
		<title>Procesamiento de los datos del formulario GET / POST</title>
	</head>
	<body> 
		<!-- Esto envía 2 archivos -->
		<?php
			$nombre = $_POST['nombre'];
			$modulos = $_POST['modulos'];
			echo "Nombre : ".$nombre."<br>";
			foreach($modulos as $modulo){
				echo "modulo ".$modulo. "<br>";
			}
			
			
			print_r($_POST);
		?>
	</body>
</html>