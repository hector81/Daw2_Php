<!-- 5.- Dadas las denominaciones de las antiguas monedas y billetes en pesetas (1, 5, 10, 25 50,
100, 200, 500, 1000, 2000 y 5000), mostrar en el navegador del cliente el valor de en euros de
estas antiguas denominaciones. Utilizar una constante llamada VALOR_EURO con valor
166,386. Formatear la salida para que muestre primero el resultado real (número) con todos los
decimales que resultan de la operación y después con sólo dos decimales. Realizar el ejercicio
utilizando primero un bucle FOR, luego un bucle WHILE y por último un bucle DO…WHILE. -->
<html>
	<head>
		<title>Ejercicio 5: Convertir pesetas a euros</title>
		<?php
			const EURO = 166.67;
		?>
	</head>
	<body>
		<p>
		
		</p>
		<?php
			//primera forma de hacerlo operadores simples
			$var1pesetas = 1;
			$var5pesetas = 5;
			$var10pesetas = 10;
			$var25pesetas = 25;
			$var50pesetas = 50;
			$var100pesetas = 100;
			$var200pesetas = 200;
			$var500pesetas = 500;
			$var1000pesetas = 1000;
			$var2000pesetas = 2000;
			$var5000pesetas = 5000;
			$varEurosPesetas = 166.67;			
			
			echo 'valor de 1 peseta en euros '.number_format($var1pesetas/$varEurosPesetas, 3)."<br>";
			echo 'valor de 5 pesetas en euros '.number_format($var5pesetas/$varEurosPesetas, 3)."<br>";
			echo 'valor de 10 pesetas en euros '.number_format($var10pesetas/$varEurosPesetas, 3)."<br>";
			echo 'valor de 25 pesetas en euros '.number_format($var25pesetas/$varEurosPesetas, 3)."<br>";
			echo 'valor de 50 pesetas en euros '.number_format($var50pesetas/$varEurosPesetas, 3)."<br>";
			echo 'valor de 100 pesetas en euros '.number_format($var100pesetas/$varEurosPesetas, 3)."<br>";
			echo 'valor de 200 pesetas en euros '.number_format($var200pesetas/$varEurosPesetas, 3)."<br>";
			echo 'valor de 500 pesetas en euros '.number_format($var500pesetas/$varEurosPesetas, 3)."<br>";
			echo 'valor de 1000 pesetas en euros '.number_format($var1000pesetas/$varEurosPesetas, 3)."<br>";
			echo 'valor de 2000 pesetas en euros '.number_format($var2000pesetas/$varEurosPesetas, 3)."<br>";
			echo 'valor de 5000 pesetas en euros '.number_format($var5000pesetas/$varEurosPesetas, 3)."<br>";			
			
			//segunda forma de hacerlo FOREACH
			$varPesetasArray = array(1,5,10,25,50,100,200,500,1000,2000,5000);
			foreach ($varPesetasArray as $valor) {
				echo number_format(($valor/$varEurosPesetas),3)."\n<br>";
			}
			
			//tercera forma de hacerlo FOR
			$varPesetasArray = [1,5,10,25,50,100,200,500,1000,2000,5000];
			for ($i = 0, $j = count($varPesetasArray); $i < $j ; $i++) {//es mas rapido asi que ($i = 0; $i < count($varPesetasArray) ; $i++)
				$resultado = number_format(($varPesetasArray[$i]/$varEurosPesetas),3);
				echo $resultado." euros \n<br>";
			}
			
			//cuarta forma de hacerlo WHILE
			$varPesetasArray = [1,5,10,25,50,100,200,500,1000,2000,5000];
			$i = 0;
			$j = count($varPesetasArray);
			while($i < $j){
				$resultado = number_format(($varPesetasArray[$i]/$varEurosPesetas),3);
				echo $varPesetasArray[$i++] ." sería el equivalente en pesetas = " . $resultado." euros \n<br>";
				//$i++;
			}
			
			//quinta forma de hacerlo WHILE pre y post
			$varPesetasArray = [1,5,10,25,50,100,200,500,1000,2000,5000];
			$i = 0;
			$j = count($varPesetasArray)-1;
			while($i < $j){
				$resultado = number_format(($varPesetasArray[$i]/$varEurosPesetas),3);
				echo $varPesetasArray[++$i] ." pesetas = " . $resultado." euros \n<br>";
				//$i++;
			}
			
			//sexta forma de hacerlo DO…WHILE
			$varPesetasArray = [1,5,10,25,50,100,200,500,1000,2000,5000];
			$i = 0;
			$j = count($varPesetasArray);
			do{
				$resultado = number_format(($varPesetasArray[$i]/$varEurosPesetas),3);
				echo $varPesetasArray[$i++] ." PESETAS = " . $resultado." EUROS \n<br>";
				//$i++;
			}while($i < $j);
			
			//Septima forma de hacerlo con funcion
			function convertirPesetasEuros($varPesetasArray){
				$contador = count($varPesetasArray);
				for($i = 0, $j = $contador; $i < $j; $i++ ){
					$resultadoEuros = $varPesetasArray[$i]/EURO;
					echo $varPesetasArray[$i] ." PESETAS SON EN EUROS " . $resultadoEuros."\n<br>";
				}
			}
			
			echo convertirPesetasEuros($varPesetasArray)."\n<br>";
		?>
	</body>
</html>