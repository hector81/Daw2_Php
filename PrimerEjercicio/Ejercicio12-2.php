<!-- 12.- Realizar un código PHP que muestre en el navegador del cliente los números perfectos que
hay entre 1 y 10000.
Un número perfecto es aquel que es igual a la suma de sus divisores. Ejemplo: 6=1+2+3. -->
<html>
	<head>
		<title>Ejercicio 12: Números perfectos de 1 a 1000</title>
	</head>
	<body>
		<?php
			echo "FUNCION NORMAL"."\n<br>";
			
			//segunda forma Uso de parámetros predeterminados en funciones
			echo "PARAMETROS DETERMINADOS FUNCIONES"."\n<br>";
			echo mostrarPerfectosNumeroParametrosDeterminados()."\n<br>";
			echo mostrarPerfectosNumeroParametrosDeterminados(400)."\n<br>";
			//primera forma
			$perfectos =[1,2];
			function mostrarPerfectosNumeroParametrosDeterminados($varNumeroParametrosDeterminados = 1000){;
				for($i=1;$i<=$varNumeroParametrosDeterminados;$i++){//recorremos hasta 1000
				$esPerfecto = TRUE;
				$varSuma=0;
					for($j = 1; $j < (int)($i/2); $j++){//recorremos el numero
						 if($i%$j==0){
							$varSuma = $varSuma + $j; //sumamos sus divisores
							if($i==$varSuma){
								$esPerfecto = FALSE;
								//break;
							}
						 }
					}
					  if($esPerfecto ){// si la suma es igual al numero							
							$perfectos[] = $i;
					  }
				}
			}

			foreach ($perfectos as &$valor) {
				echo $valor."\n<br>";
			}

		?>
	</body>
</html>