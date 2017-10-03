<!-- 11.- Define una variable $var1 y asígnala un valor entero de al menos cuatro dígitos y no más
de seis. Muestra en el navegador del cliente todos los divisores del valor de la variable. -->
<html>
	<head>
		<title>Ejercicio 11: Variable entera con sus divisores</title>
	</head>
	<body>
		<?php
			$varNumero = 65536;
			echo mostrarDivisoresVariable($varNumero);
			//LA FUNCION SE PUEDE PONER DEBAJO
			function mostrarDivisoresVariable($varNumero){
				for($i = 1; $i <= $varNumero ;$i++){				
					if($varNumero %$i == 0) {
						echo $i."\n<br>";
					}
				}
			}		
		?>
	</body>
</html>