<!-- Realizar un codigo PHP que muestre los 100 primeros numeros naturales, uno por linea, 
si es par, si es impar , si es primo, si es de la serie fibunacci  -->
<html>
	<head>
		<title>Ejercicio 7: 100 PRIMEROS NUMEROS PRIMOS</title>
		<?php
			//calculamos primos
			$varLimite = 101;
			$primos =[1];
			for ($i = 3; $i < $varLimite; $i+=2) {	//suma de dos en dos para ir mas rapido ya que los pares son no son primos excepto el 2, por eso se empieza a contar de 3	
				$esPrimo = TRUE;
				for ($j = 2; $j < (int)($i/2); $j++){//para mejorar la rapidez
					if($i%$j == 0){
						$esPrimo = FALSE;
						break;
					}
					if($esPrimo){
						$primos[] = $i;
					}
				}
				
			}
		?>
	</head>
	<body>
		<h1>
		100 primeros numeros
		</h1>
		<?php
			$varLimite = 101;
			for($i = 0,$j  = count($primos); $i < $j; $i++){
				//echo $primos[$i]."\n<br>";	
			
			for ($i = 1; $i < $varLimite; $i++) {		
					echo $i;
					echo (($i%2)?" es par":" es impàr")."<br>\n" ;///operecion ternario. los : son como el else
					echo ((in_array($i, $primos))?" es primo ": " no es primo")."\n<br>";	///operecion ternario. los : son como el else
					
				}
			}
		?>
	</body>
</html>