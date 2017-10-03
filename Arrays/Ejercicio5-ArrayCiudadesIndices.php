<!-- 5- Crea un array introduciendo las ciudades: Madrid, Barcelona, Londres, New York, Los
Ángeles y Chicago sin asignar índices al array. A continuación, muestra el contenido del
array haciendo un recorrido diciendo el valor correspondiente a cada índice. Ejemplo
La ciudad con índice 0 tiene el nombre Madrid -->
<html>
	<head>
		<title>Ejercicio 5: Crea un array introduciendo ciudades y recorrerlo poniendo indices.</title>
	</head>
	<body>
		<?php
			$arrayCiudades = array(
				  "Madrid",
				  "Barcelona",
				  "Londres",
				  "New York",
				  "Los Ángeles",
				  "Chicago"
			);

			function recorrerArrayIndices($arrayCiudades){
				foreach ($arrayCiudades as $key => $var) {
					echo $key .  " : " . $var . "<br>";
				}
			}

			echo recorrerArrayIndices($arrayCiudades)."<br>";
			
		?>
	</body>
</html>