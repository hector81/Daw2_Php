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
			
			//Hacer una funcion para comprobar si es numercio
			function esNumerico($numero) {
				if(is_numeric($numero)) {
					echo $numero." es numérico", PHP_EOL;
				} else {
					echo $numero." no es numérico", PHP_EOL;
				}
			}
			
			echo 'OPERADORES IGUALDAD (==, ===) Y DIFERENCIA (<>, !=, !==) '."\n<br>";
			echo "<br>";
			
			$varResultado = ($var1 == $var1);
			echo '5 == 5 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var1). ' '.esNumerico($var1)."\n<br>";
			$varResultado = ($var1 == $var2);
			echo '5 == 5.0 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var1). ' '.esNumerico($var2)."\n<br>";
			$varResultado = ($var1 == $var3);
			echo '5 == "5" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var1). ' '.esNumerico($var3)."\n<br>";
			$varResultado = ($var1 == $var4);
			echo '5 ==  "5.0" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var1). ' '.esNumerico($var4)."\n<br>";
			echo "<br>";
			
			$varResultado = ($var1 === $var1);
			echo '5 === 5 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var1). ' '.esNumerico($var1)."\n<br>";
			$varResultado = ($var1 === $var2);
			echo '5 === 5.0 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var1). ' '.esNumerico($var2)."\n<br>";
			$varResultado = ($var1 === $var3);
			echo '5 === "5" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var1). ' '.esNumerico($var3)."\n<br>";
			$varResultado = ($var1 === $var4);
			echo '5 ===  "5.0" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var1). ' '.esNumerico($var4)."\n<br>";
			echo "<br>";
			
			$varResultado = ($var1 <> $var1);
			echo '5 <> 5 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var1). ' '.esNumerico($var1)."\n<br>";
			$varResultado = ($var1 <> $var2);
			echo '5 <> 5.0 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var1). ' '.esNumerico($var2)."\n<br>";
			$varResultado = ($var1 <> $var3);
			echo '5 <> "5" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var1). ' '.esNumerico($var3)."\n<br>";
			$varResultado = ($var1 <> $var4);
			echo '5 <>  "5.0" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var1). ' '.esNumerico($var4)."\n<br>";
			echo "<br>";
			
			$varResultado = ($var1 != $var1);
			echo '5 != 5 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var1). ' '.esNumerico($var1)."\n<br>";
			$varResultado = ($var1 != $var2);
			echo '5 != 5.0 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var1). ' '.esNumerico($var2)."\n<br>";
			$varResultado = ($var1 != $var3);
			echo '5 != "5" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var1). ' '.esNumerico($var3)."\n<br>";
			$varResultado = ($var1 != $var4);
			echo '5 !=  "5.0" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var1). ' '.esNumerico($var4)."\n<br>";
			echo "<br>";
			
			$varResultado = ($var1 !== $var1);
			echo '5 !== 5 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var1). ' '.esNumerico($var1)."\n<br>";
			$varResultado = ($var1 !== $var2);
			echo '5 !== 5.0 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var1). ' '.esNumerico($var2)."\n<br>";
			$varResultado = ($var1 !== $var3);
			echo '5 !== "5" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var1). ' '.esNumerico($var3)."\n<br>";
			$varResultado = ($var1 !== $var4);
			echo '5 !==  "5.0" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var1). ' '.esNumerico($var4)."\n<br>";
			echo "<br>";
			
			//////////////////
			
			$varResultado = ($var2 == $var1);
			echo '5.0 == 5 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var2). ' '.esNumerico($var1)."\n<br>";
			$varResultado = ($var2 == $var2);
			echo '5.0 == 5.0 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var2). ' '.esNumerico($var2)."\n<br>";
			$varResultado = ($var2 == $var3);
			echo '5.0 == "5" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var2). ' '.esNumerico($var3)."\n<br>";
			$varResultado = ($var2 == $var4);
			echo '5.0 ==  "5.0" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var2). ' '.esNumerico($var4)."\n<br>";
			echo "<br>";
			
			$varResultado = ($var2 === $var1);
			echo '5.0 === 5 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var2). ' '.esNumerico($var1)."\n<br>";
			$varResultado = ($var2 === $var2);
			echo '5.0 === 5.0 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var2). ' '.esNumerico($var2)."\n<br>";
			$varResultado = ($var2 === $var3);
			echo '5.0 === "5" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var2). ' '.esNumerico($var3)."\n<br>";
			$varResultado = ($var2 === $var4);
			echo '5.0 ===  "5.0" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var2). ' '.esNumerico($var4)."\n<br>";
			echo "<br>";
			
			$varResultado = ($var2 <> $var1);
			echo '5.0 <> 5 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var2). ' '.esNumerico($var1)."\n<br>";
			$varResultado = ($var2 <> $var2);
			echo '5.0 <> 5.0 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var2). ' '.esNumerico($var2)."\n<br>";
			$varResultado = ($var2 <> $var3);
			echo '5.0 <> "5" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var2). ' '.esNumerico($var3)."\n<br>";
			$varResultado = ($var2 <> $var4);
			echo '5.0 <>  "5.0" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var2). ' '.esNumerico($var4)."\n<br>";
			echo "<br>";
			
			$varResultado = ($var2 != $var1);
			echo '5.0 != 5 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var2). ' '.esNumerico($var1)."\n<br>";
			$varResultado = ($var2 != $var2);
			echo '5.0 != 5.0 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var2). ' '.esNumerico($var2)."\n<br>";
			$varResultado = ($var2 != $var3);
			echo '5.0 != "5" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var2). ' '.esNumerico($var3)."\n<br>";
			$varResultado = ($var2 != $var4);
			echo '5.0 !=  "5.0" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var2). ' '.esNumerico($var4)."\n<br>";
			echo "<br>";
			
			$varResultado = ($var2 !== $var1);
			echo '5.0 !== 5 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var2). ' '.esNumerico($var1)."\n<br>";
			$varResultado = ($var2 !== $var2);
			echo '5.0 !== 5.0 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var2). ' '.esNumerico($var2)."\n<br>";
			$varResultado = ($var2 !== $var3);
			echo '5.0 !== "5" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var2). ' '.esNumerico($var3)."\n<br>";
			$varResultado = ($var2 !== $var4);
			echo '5.0 !==  "5.0" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var2). ' '.esNumerico($var4)."\n<br>";
			echo "<br>";
			
			///////////////////////
			
			$varResultado = ($var3 == $var1);
			echo '"5" == 5 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var3). ' '.esNumerico($var1)."\n<br>";
			$varResultado = ($var3 == $var2);
			echo '"5" == 5.0 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var3). ' '.esNumerico($var2)."\n<br>";
			$varResultado = ($var3 == $var3);
			echo '"5" == "5" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var3). ' '.esNumerico($var3)."\n<br>";
			$varResultado = ($var3 == $var4);
			echo '"5" ==  "5.0" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var3). ' '.esNumerico($var4)."\n<br>";
			echo "<br>";
			
			$varResultado = ($var3 === $var1);
			echo '"5" === 5 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var3). ' '.esNumerico($var1)."\n<br>";
			$varResultado = ($var3 === $var2);
			echo '"5" === 5.0 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var3). ' '.esNumerico($var2)."\n<br>";
			$varResultado = ($var3 === $var3);
			echo '"5" === "5" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var3). ' '.esNumerico($var3)."\n<br>";
			$varResultado = ($var3 === $var4);
			echo '"5" ===  "5.0" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var3). ' '.esNumerico($var4)."\n<br>";
			echo "<br>";
			
			$varResultado = ($var3 <> $var1);
			echo '"5" <> 5 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var3). ' '.esNumerico($var1)."\n<br>";
			$varResultado = ($var3 <> $var2);
			echo '"5" <> 5.0 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var3). ' '.esNumerico($var2)."\n<br>";
			$varResultado = ($var3 <> $var3);
			echo '"5" <> "5" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var3). ' '.esNumerico($var3)."\n<br>";
			$varResultado = ($var3 <> $var4);
			echo '"5" <>  "5.0" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var3). ' '.esNumerico($var4)."\n<br>";
			echo "<br>";
			
			$varResultado = ($var3 != $var1);
			echo '"5" != 5 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var3). ' '.esNumerico($var1)."\n<br>";
			$varResultado = ($var3 != $var2);
			echo '"5" != 5.0 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var3). ' '.esNumerico($var2)."\n<br>";
			$varResultado = ($var3 != $var3);
			echo '"5" != "5" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var3). ' '.esNumerico($var3)."\n<br>";
			$varResultado = ($var3 != $var4);
			echo '"5" !=  "5.0" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var3). ' '.esNumerico($var4)."\n<br>";
			echo "<br>";
			
			$varResultado = ($var3 !== $var1);
			echo '"5" !== 5 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var3). ' '.esNumerico($var1)."\n<br>";
			$varResultado = ($var3 !== $var2);
			echo '"5" !== 5.0 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var3). ' '.esNumerico($var2)."\n<br>";
			$varResultado = ($var3 !== $var3);
			echo '"5" !== "5" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var3). ' '.esNumerico($var3)."\n<br>";
			$varResultado = ($var3 !== $var4);
			echo '"5" !==  "5.0" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var3). ' '.esNumerico($var4)."\n<br>";
			echo "<br>";
			
			///////////////////////////////////
			
			$varResultado = ($var4 == $var1);
			echo '"5.0" == 5 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var4). ' '.esNumerico($var1)."\n<br>";
			$varResultado = ($var4 == $var2);
			echo '"5.0" == 5.0 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var4). ' '.esNumerico($var2)."\n<br>";
			$varResultado = ($var4 == $var3);
			echo '"5.0" == "5" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var4). ' '.esNumerico($var3)."\n<br>";
			$varResultado = ($var4 == $var4);
			echo '"5.0" ==  "5.0" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var4). ' '.esNumerico($var4)."\n<br>";
			echo "<br>";
			
			$varResultado = ($var4 === $var1);
			echo '"5.0" === 5 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var4). ' '.esNumerico($var1)."\n<br>";
			$varResultado = ($var4 === $var2);
			echo '"5.0" === 5.0 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var4). ' '.esNumerico($var2)."\n<br>";
			$varResultado = ($var4 === $var3);
			echo '"5.0" === "5" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var4). ' '.esNumerico($var3)."\n<br>";
			$varResultado = ($var4 === $var4);
			echo '"5.0" ===  "5.0" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var4). ' '.esNumerico($var4)."\n<br>";
			echo "<br>";
			
			$varResultado = ($var4 <> $var1);
			echo '"5.0" <> 5 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var4). ' '.esNumerico($var1)."\n<br>";
			$varResultado = ($var4 <> $var2);
			echo '"5.0" <> 5.0 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var4). ' '.esNumerico($var2)."\n<br>";
			$varResultado = ($var4 <> $var3);
			echo '"5.0" <> "5" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var4). ' '.esNumerico($var3)."\n<br>";
			$varResultado = ($var4 <> $var4);
			echo '"5.0" <>  "5.0" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var4). ' '.esNumerico($var4)."\n<br>";
			echo "<br>";
			
			$varResultado = ($var4 != $var1);
			echo '"5.0" != 5 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var4). ' '.esNumerico($var1)."\n<br>";
			$varResultado = ($var4 != $var2);
			echo '"5.0" != 5.0 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var4). ' '.esNumerico($var2)."\n<br>";
			$varResultado = ($var4 != $var3);
			echo '"5.0" != "5" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var4). ' '.esNumerico($var3)."\n<br>";
			$varResultado = ($var4 != $var4);
			echo '"5.0" !=  "5.0" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var4). ' '.esNumerico($var4)."\n<br>";
			echo "<br>";
			
			$varResultado = ($var4 !== $var1);
			echo '"5.0" !== 5 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var4). ' '.esNumerico($var1)."\n<br>";
			$varResultado = ($var4 !== $var2);
			echo '"5.0" !== 5.0 = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var4). ' '.esNumerico($var2)."\n<br>";
			$varResultado = ($var4 !== $var3);
			echo '"5.0" !== "5" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var4). ' '.esNumerico($var3)."\n<br>";
			$varResultado = ($var4 !== $var4);
			echo '"5.0" !==  "5.0" = '.var_dump($varResultado). ' '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo esNumerico($var4). ' '.esNumerico($var4)."\n<br>";
			echo "<br>";
		?>
	</body>
</html>