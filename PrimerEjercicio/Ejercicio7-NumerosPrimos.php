<!-- Realizar un codigo PHP que muestre los 100 primeros numeros naturales, uno por linea, 
si es par, si es impar , si es primo, si es de la serie fibunacci  -->
<html>
	<head>
		<title>Ejercicio 7: 100 PRIMEROS NUMEROS PRIMOS</title>
	</head>
	<body>
		<h1>
		100 primeros numeros
		</h1>
		<?php
			$varLimite = 100;
			$varBooleanPrimo;
			$varBooleanFibonacci;
			//funcion para ver si es primo			
			function primo($numero) {
				$varComprobar = FALSE;
				$contador = 0;
				for ($i = 2; $i <= $numero; $i++) {
					if ($numero % $i == 0) {
						$contador++;

						if ($contador > 1) {
							$varComprobar = FALSE;
						} else {
							$varComprobar = TRUE;
						}
					}
				}
				return $varComprobar;
			}
			//Funcion para saber si es FIBONACCI. Cada número se calcula sumando los dos anteriores a él.
			function fibonacci($numero) {
				$varComprobar = FALSE;
				    $fib1 = 0;
					$fib2 = 1;
						do {
							$saveFib1 = $fib1;
							$fib1 = $fib2;
							$fib2 = $saveFib1 + $fib2;
							}
						while ($fib2 <= $numero);

				if ($fib2 == $numero){
					$varComprobar = TRUE;
				}else{
					$varComprobar = FALSE;
				}
				
				return $varComprobar;
			}
			
			//recorremos e imprimimos
			for ($i = 1; $i <= $varLimite; $i++) {		
				$varBooleanPrimo = primo($i);
				$varBooleanFibonacci = fibonacci($i);
				
				if($i%2 == 0 && $varBooleanPrimo == FALSE && $varBooleanFibonacci == TRUE){
					echo $i.' PAR. NO ES PRIMO . ES FIBONACCI'."<br>";					
				}elseif($i%2 == 0 && $varBooleanPrimo == TRUE && $varBooleanFibonacci == TRUE ){
					echo $i.' PAR. ES PRIMO. ES FIBONACCI'."<br>";					
				}elseif($i%2 != 0 && $varBooleanPrimo == FALSE && $varBooleanFibonacci == TRUE ){
					echo $i.' IMPAR. NO ES PRIMO. ES FIBONACCI'."<br>";					
				}elseif($i%2 != 0 && $varBooleanPrimo == TRUE && $varBooleanFibonacci == TRUE ){
					echo $i.' IMPAR. ES PRIMO. ES FIBONACCI'."<br>";					
				}
				
				if($i%2 == 0 && $varBooleanPrimo == FALSE && $varBooleanFibonacci == FALSE ){
					echo $i.' PAR. NO ES PRIMO. NO ES FIBONACCI'."<br>";					
				}elseif($i%2 == 0 && $varBooleanPrimo == TRUE && $varBooleanFibonacci == FALSE ){
					echo $i.' PAR. ES PRIMO. NO ES FIBONACCI'."<br>";					
				}elseif($i%2 != 0 && $varBooleanPrimo == FALSE && $varBooleanFibonacci == FALSE ){
					echo $i.' IMPAR. NO ES PRIMO. NO ES FIBONACCI'."<br>";					
				}elseif($i%2 != 0 && $varBooleanPrimo == TRUE && $varBooleanFibonacci == FALSE ){
					echo $i.' IMPAR. ES PRIMO. NO ES FIBONACCI'."<br>";					
				}
				
			}
			
		?>
	</body>
</html>