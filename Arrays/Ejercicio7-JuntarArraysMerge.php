<!-- 7. Rellenar los tres arrays que siguen y juntarlos en una nueva. Mostrarlas por pantalla
		“Lagartija”, “Araña”, “Perra”, “Gata”, “Ratón”
		“12”,”34”,”49”,”53”,”12”
		“Sauce”,”Pino”,”Naranjo”,”Chopa”,”Perro”,”34”
Utilizar la función array_merge() -->
<html>
	<head>
		<title>Ejercicio 7: Juntar arrays con la funcion merge.</title>
	</head>
	<body>
		<?php
			$arraysJuntos = array(
				  array("Lagartija", "Araña", "Perra", "Gata", "Ratón"),
				  array("12","34","49","53","12"),
				  array("Sauce","Pino","Naranjo","Chopa","Perro","34")
			);
			
			//primera forma sin merge para recorrer los arrays
			function recorrerSinMerge($arraysJuntos){
				foreach ($arraysJuntos as &$varArray) {
					foreach ($varArray as $key => $var) {
						echo $key .  " : " . $var . "<br>";
					}
					echo "<br>";
				}
			echo "<br>";
			}
			echo "Primera forma recorrida sin merge"."<br>";
			echo recorrerSinMerge($arraysJuntos);
			
			//segunda forma con merge
			function recorrerConMerge($arraysJuntos){
				$contador=0;
				foreach ($arraysJuntos as &$varArray) {
					$nuevoArray[$i]= $varArray;
					//print_r(array_merge($nuevoArray[$contador]));	
					echo array_merge($nuevoArray[$contador]);
					$contador++;
					echo "<br>";
				}
				echo "<br>";
			}
			echo "Segunda forma recorrida con merge"."<br>";
			echo recorrerSinMerge($arraysJuntos);
			
			//tercera forma con merge
			//foreach((array1, array2, array3)as)
		?>
	</body>
</html>