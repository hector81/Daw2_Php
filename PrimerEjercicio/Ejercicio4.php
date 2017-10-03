<!-- 4.- Define tres variables enteras $var1, $var2 y $var3 y asígnalas cualquier valor adecuado.
Muestra en el navegador del cliente información sobre las variables y sobre qué variable
mantiene el valor mayor y qué variable mantiene el valor menor (y cuáles son esos valores) -->
<html>
	<head>
		<title>Ejercicio 4: Mayor o menor</title>
	</head>
	<body>
		<p>
		
		</p>
		<?php
			$var1 = 5;
			$var2 = 8;
			$var3 = 17;
			
			//primera forma de hacerlo
			function deMayorAMenor1($var1 ,$var2,$var3){
				$varMayor;
				$varMenor;
				$varMayorCad;			
				$varMenorCad;
				
				if($var1 > $var2 && $var1 > $var3){
					 $varMayor = $var1;			
				}
				if($var2 > $var1 && $var2 > $var3){
					 $varMayor = $var2;			
				}
				if($var3 > $var2 && $var3 > $var1){
					 $varMayor = $var3;			
				}
				if($var1 < $var2 && $var1 < $var3){
					 $varMenor = $var1;			
				}
				if($var2 < $var1 && $var2 < $var3){
					 $varMenor = $var2;			
				}
				if($var3 < $var2 && $var3 < $var1){
					 $varMenor = $var3;			
				}
				//imprimir
				echo 'valor de $var1 '.$var1."\n"."<br>";
				echo 'valor de $var2 '.$var2."\n"."<br>";
				echo 'valor de $var3 '.$var3."\n"."<br>";
				echo 'El valor mayor es '.$varMayor."\n"."<br>";
				echo 'El valor menor es '.$varMenor."\n"."<br>";
			}
			
			echo deMayorAMenor1($var1 ,$var2,$var3)."\n"."<br>";
			
			//Segunda forma de hacerlo
			function deMayorAMenor2($var1 ,$var2,$var3){
				if($var1 < $var2){
				 $varMayor = $var2;
				 $varMayorCad = '$var2';
				 $varMenor = $var1;
				 $varMenorCad = '$var1';				 
				}else{
					 $varMayor = $var1;
					 $varMayorCad = '$var1';
					 $varMenor = $var2;
					 $varMenorCad = '$var2';			
				}
				
				if($varMayor < $var3){
					 $varMayor = $var3;
					 $varMayorCad = '$var3';				 
				}elseif($varMenor > $var3){
					 $varMenor = $var2;
					 $varMenorCad = '$var2';			
				}

				echo "valor mayor es $varMayorCad ".$varMayor."\n<br>";
				echo "valor menor $varMenorCad ".$varMenor."\n<br>";
			}
			
			echo deMayorAMenor2($var1 ,$var2,$var3)."\n"."<br>";
			
		?>
	</body>
</html>