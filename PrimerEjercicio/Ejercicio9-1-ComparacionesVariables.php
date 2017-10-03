<!-- 9.- Dadas las variable $var1 = 5, $var2 = 5.0, $var3 = “5” y $var4 = “5.0” utilizar
los diferentes operadores relaciones de igualdad (==, ===) y diferencia (<>, !=, !==) entre esas
variables e informar en el navegador del cliente de los resultados de las comparaciones. (Probar
todo con todo) ¿con booleano? -->
<html>
	<head>
		<title>Ejercicio 9: Comparar variables</title>
	</head>
	<body>
		<?php
			$var1 = 5;
			$var2 = 5.0;
			$var3 = "5";
			$var4 = "5.0";
			$varResultado; 
			$varBooleano;
			echo 'OPERADORES IGUALDAD (==, ===) Y DIFERENCIA (<>, !=, !==) '."\n<br>";
			echo "<br>";
			//mi forma
			echo "MI FORMA"."<br>";
			$array = array($var1, $var2, $var3, $var4 );
			
			
			//Hacer una funcion para comprobar si es numercio
			function esNumerico($numero) {
				if(is_numeric($numero)) {
					echo $numero." es numérico";
				} else {
					echo $numero." no es numérico";
				}
			}
			
			function comp($array){
				$longitud = count($array);
				for($i= 0, $j= $longitud; $i<$j; $i++){
						  
					for($z=0, $k = $longitud; $z<$k; $z++){
						$varResultado = ($array[$i] == $array[$z]);
						$varBooleano = var_dump($varResultado);
						echo 'OPERACION = '.gettype($array[$i]).' '.$array[$i]. ' == '.gettype($array[$z]).' '.$array[$z]."\n<br>";
						echo esNumerico($array[$i]). ' '.esNumerico($array[$z])."\n<br>".' resultado de la operacion de comparacion = ';
						echo esNumerico($varResultado)."\n";
						echo "<br>";
						$varResultado = ($array[$i] === $array[$z]);
						$varBooleano = var_dump($varResultado);
						echo 'OPERACION = '.gettype($array[$i]).' '.$array[$i]. ' === '.gettype($array[$z]).' '.$array[$z]."\n<br>";
						echo esNumerico($array[$i]). ' '.esNumerico($array[$z])."\n<br>".' resultado de la operacion de comparacion = ';
						echo esNumerico($varResultado)."\n";
						echo "<br>";
						$varResultado = ($array[$i] <> $array[$z]);
						$varBooleano = var_dump($varResultado);
						echo 'OPERACION = '.gettype($array[$i]).' '.$array[$i]. ' <> '.gettype($array[$z]).' '.$array[$z]."\n<br>";
						echo esNumerico($array[$i]). ' '.esNumerico($array[$z])."\n<br>".' resultado de la operacion de comparacion = ';
						echo esNumerico($varResultado)."\n";
						echo "<br>";
						$varResultado = ($array[$i] != $array[$z]);
						$varBooleano = var_dump($varResultado);
						echo 'OPERACION = '.gettype($array[$i]).' '.$array[$i]. ' != '.gettype($array[$z]).' '.$array[$z]."\n<br>";
						echo esNumerico($array[$i]). ' '.esNumerico($array[$z])."\n<br>".' resultado de la operacion de comparacion = ';
						echo esNumerico($varResultado)."\n";
						echo "<br>";
						$varResultado = ($array[$i] !== $array[$z]);
						$varBooleano = var_dump($varResultado);
						echo 'OPERACION = '.gettype($array[$i]).' '.$array[$i]. ' !== '.gettype($array[$z]).' '.$array[$z]."\n<br>";
						echo esNumerico($array[$i]). ' '.esNumerico($array[$z])."\n<br>".' resultado de la operacion de comparacion = ';
						echo esNumerico($varResultado)."\n";
						echo "<br>";
					}
					
				}
			}
			
			echo comp($array)."<br>";
			//forma GOYO
			echo "FORMA GOYO"."<br>";
			$var11 = 5;
			$var22 = 5.0;
			$var33 = "5";
			$var44 = "5.0";
			echo esNumerico($var11)."<br>";
			echo esNumerico($var22)."<br>";
			echo esNumerico($var33)."<br>";
			echo esNumerico($var44)."<br>";
			
			function comprobarOperadoresNumericos($var11 ,$var33){
				echo esNumerico(var_dump($var11 == $var33)). " '$var11 == $var33' "."<br>\n";
				echo esNumerico(var_dump($var11 === $var33)). " '$var11 === $var33' "."<br>\n";
				echo esNumerico(var_dump($var11 <> $var33)). " '$var11 <> $var33' "."<br>\n";
				echo esNumerico(var_dump($var11 != $var33)). " '$var11 != $var33' "."<br>\n";
				echo esNumerico(var_dump($var11 !== $var33)). " '$var11 === $var33' "."<br>\n";
			}
			
			echo comprobarOperadoresNumericos($var11 ,$var22)."<br>\n";
			
		?>
	</body>
</html>