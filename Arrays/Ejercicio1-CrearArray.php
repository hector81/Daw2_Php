<!-- 1. Crear un array con los diez primeros números naturales. Mostrarlos en pantalla desde el
array, uno en cada línea. -->
<html>
	<head>
		<title>Ejercicio 1: Crear Array con los diez primeros números naturales.</title>
	</head>
	<body>
		<?php
			//Una forma de hacerlo
			$varNumero = 10;
			
			function recorrerNumeros($varNumero){
				for ($i = 0; $i < $varNumero; $i++) {
				$myArray[$i] = ($i+1)."<br>";
				echo $myArray[$i];
				}
			}
			
			echo recorrerNumeros($varNumero);

			//Otra forma de hacerlo
			$varNumeroArray = [1,2,3,4,5,6,7,8,9,10];
			
			function recorrerNumerosFor($varNumeroArray){
				foreach($varNumeroArray as $valor) {
					echo $valor."<br>";
				}
			}
			
			echo recorrerNumerosFor($varNumeroArray);
		?>
	</body>
</html>