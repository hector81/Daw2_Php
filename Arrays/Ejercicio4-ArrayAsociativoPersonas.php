<!-- 4-Crea un array asociativo para introducir los datos de una persona:
		Nombre: Pedro Torres
		Dirección: C/Mayor, 37
		Teléfono: 123456789
Al acabar mostrar los datos por pantalla. -->
<html>
	<head>
		<title>Ejercicio 4: Crea un array asociativo para introducir los datos de una persona.</title>
	</head>
	<body>
		<?php
			$arrayAsociativoPersonas = array(
				"Nombre" => "Pedro Torres",
				"Dirección" => "C/Mayor, 37",
				"Teléfono"   => "123456789",
			);

			foreach ($arrayAsociativoPersonas as $key => $var) {
						echo $key .  " : " . $var . "<br>";
			}

		?>
	</body>
</html>