<!-- Define dos variables enteras: $var1 y $var2 y asígnalas cualquier valor adecuado. Muestra
en el navegador del cliente una serie de mensajes, formateados con HTML, que den información
de las variables y del resultado de realizar la suma, el producto, la división (entera y real) y del
resto de la división entera.
Así, si asigna los valores 5 a $var1 y 10 a $var2 el navegador del cliente debe mostrar algo
parecido a:
Valor de $var1: 5
Valor de $var2: 10
5 + 10 son 15
5 * 10 son 50
5 / 10 (división entera) es 0
5 / 10 (división real) es 0.5
5 modulo 10 es 5
Todo ello debidamente formateado. (Para obtener el resultado de la división entera deberás
utilizar alguna función) -->
<html>
	<head>
		<title>Ejercicio 3: Operaciones aritméticas</title>
	</head>
	<body>
		<?php
			$var1 = 5;
			$var2 = 10;
			$varSuma = $var1 + $var2;
			$varMultiplicacion = $var1*$var2;
			$varDivisionEntera = (int)($var1 / $var2);
			$varDivisionReal = $var1/$var2;
			$varModulo = $var1%$var2;
			//3 formas de ponerlo
			echo 'valor de $var1: '."$var1.\n<br>";
			echo 'valor de $var1: '.$var1."\n"."<br>";
			echo "valor de \$var1: $var1\n<br>";
			
			//3 formas de ponerlo
			echo 'valor de $var2: '.$var2."\n"."<br>";
			echo 'valor de $var2: '.$var2."\n"."<br>";
			echo "valor de \$var2: $var2\n<br>";
			
			//2 formas de ponerlo
			echo "$var1 + $var2 son ".$varSuma."\n"."<br>";
			echo "$var1 + $var2 son ".($var1 + $var2)."\n"."<br>";
			
			//2 formas de ponerlo
			echo "$var1 * $var2 son ".$varMultiplicacion."\n"."<br>";
			echo "$var1 * $var2 son ".($var1*$var2)."\n"."<br>";
			
			echo "$var1/$var2 (division entera) es ".(int)$varDivisionEntera."\n"."<br>";//int se puede hacer en los ods lados
			
			echo "$var1/$var2 (division real) es ".$varDivisionReal."\n"."<br>";
			
			echo "$var1  modulo $var2 : ".$varModulo."\n"."<br>";
		?>
	</body>
</html>