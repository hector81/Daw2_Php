<!-- 13. Crear una matriz para guardar a los amigos clasificados por diferentes ciudades. Los
	valores serán los siguientes:
	En Madrid: nombre Pedro, edad 32, teléfono 91-999.99.99
	En Barcelona: nombre Susana, edad 34, teléfono 93-000.00.00
	En Toledo: nombre Sonia, edad 42, teléfono 925-09-09-09
	Hacer un recorrido del array multidimensional mostrando los valores de tal manera que nos
	muestre en cada ciudad qué amigos tiene. -->
<html>
	<head>
		<title>Ejercicio 13: Crear una matriz para guardar a los amigos clasificados por diferentes ciudades.</title>
	</head>
	<body>
		<?php
			//primera
			$arrayCiudades = array(
				"Madrid" => array(
						 "nombre" => "Pedro",
						 "edad" => "32",
						 "telefono"=>"91-999.99.99"
					),
				"Barcelona" => array( 
						 "nombre" => "Susana",
						 "edad" => "34",
						 "telefono"=>"93-000.00.00"
					),
				"Toledo" => array( 
						 "nombre" => "Sonia",
						 "edad" => "42",
						 "telefono"=>"925-09-09-09"
					)
			);
			
			function recorrerMultiArray($arrayCiudades){
				foreach($arrayCiudades as $ciudad => $amigos){
					echo $ciudad."\n<br>";
					foreach($amigos as $dato => $valor){
						echo $dato. " = " .$valor."\n<br>";
					}
				echo "\n<br>";
				}
			}

			echo recorrerMultiArray($arrayCiudades);
			
			//segunda forma GOYO
			$arrayCiudades1 = [
				"Madrid" => [
						 "Pedro",
						 "32",
						 "91-999.99.99"
					],
				"Barcelona" => [ 
						 "Susana",
						 "34",
						 "93-000.00.00"
					],
				"Toledo" => [ 
						 "Sonia",
						 "42",
						 "925-09-09-09"
					]
			];
			
			$elementos = ["nombre","edad","telefono"];
			
			
			foreach($arrayCiudades1 as $k => $v){
				echo "En $k : \n<br>";
				for($i =0, $j = count($arrayCiudades1); $i < $j; $i++){
					echo $elementos[$i]. " ".$v[$i]."\n<br>";					
				}
			}
			
		?>
		
		
		
		
		
		
	</body>
</html>