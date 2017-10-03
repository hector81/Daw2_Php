<!-- 12.- Realizar un código PHP que muestre en el navegador del cliente los números perfectos que
hay entre 1 y 10000.
Un número perfecto es aquel que es igual a la suma de sus divisores. Ejemplo: 6=1+2+3. -->
<html>
	<head>
		<title>Ejercicio 12: Números perfectos de 1 a 1000</title>
	</head>
	<body>
		<?php
			$varNumero = 10000;
			echo "FUNCION NORMAL"."\n<br>";
			echo mostrarPerfectosNumeroNormal($varNumero)."\n<br>";
			//primera forma
			function mostrarPerfectosNumeroNormal($varNumero){
				for($i=1;$i<=$varNumero;$i++){//recorremos hasta 1000
					$varSuma=0;
					for($j=1;$j<$i;$j++){//recorremos el numero
						 if($i%$j==0){
							$varSuma = $varSuma + $j; //sumamos sus divisores
						 }
					}
					  if($i==$varSuma){// si la suma es igual al numero
							echo $i."\n<br>";
					  }
				}
			}
			
			//segunda forma Uso de parámetros predeterminados en funciones
			echo "PARAMETROS DETERMINADOS FUNCIONES"."\n<br>";
			echo mostrarPerfectosNumeroParametrosDeterminados()."\n<br>";
			echo mostrarPerfectosNumeroParametrosDeterminados(400)."\n<br>";//aqui lo cambiamos el 1000 al 400 para probar
			echo mostrarPerfectosNumeroParametrosDeterminados(34000000)."\n<br>";//aqui lo cambiamos el 1000 al 34000000 para probar
			//primera forma
			function mostrarPerfectosNumeroParametrosDeterminados($varNumeroParametrosDeterminados = 1000){
				for($i=1;$i<=$varNumeroParametrosDeterminados;$i++){//recorremos hasta 1000
					$varSuma=0;
					for($j=1;$j<$i;$j++){//recorremos el numero
						 if($i%$j==0){
							$varSuma = $varSuma + $j; //sumamos sus divisores
						 }
					}
					  if($i==$varSuma){// si la suma es igual al numero
							echo $i."\n<br>";
					  }
				}
			}
		?>
	</body>
</html>