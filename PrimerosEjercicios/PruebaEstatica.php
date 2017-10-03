<html>
	<head>
		<title>Primer ejemplo</title>
	</head>
	<?php
			//calculamos primos
			//probar con 1010000 o con 10001000011000 //la variable es global
			static $varLimite = 1010; // si le ponemos esto es igual que antes
			$primos =[1,2];
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
	<body>
		<h1>
		Números primos
		</h1>
		<?php		
				for ($i = 1; $i < $varLimite; $i++) {		
						echo $i;
						echo (($i%2)?" es par":" es impàr")."<br>\n" ;///operecion ternario. los : son como el else
						echo ((in_array($i, $primos))?" es primo ": " no es primo")."\n<br>";	///operecion ternario. los : son como el else
				}
			
		?>
	</body>
</html>