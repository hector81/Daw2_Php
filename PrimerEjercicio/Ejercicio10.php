<!-- 10.- Con las variables y valores anteriores probar los diferentes operadores aritméticos con los
valores de las variables (todos con todos creando expresiones con más de un operador) e
informar en el navegador del cliente de la expresión, su resultado y el tipo de datos del valor
resultante. -->
<html>
	<head>
		<title>Ejercicio 10: Probar operadores aritmeticos</title>
	</head>
	<body>
		<?php
			$var1 = 5;
			$var2 = 5.0;
			$var3 = "5";
			$var4 = "5.0";
			$varResultado;
			
			echo 'OPERADORES ARITMÉTICOS BÁSICOS'."\n<br>";
			echo "<br>";
			
			$varResultado = $var1 + $var2;
			echo '5 + 5.0 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var1 - $var2;
			echo '5 - 5.0 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var1 * $var2;
			echo '5 * 5.0 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var1/$var2;
			echo '5 / 5.0 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var1%$var2;
			echo '5 % 5.0 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo "<br>";
			
			$varResultado = $var1 + $var3;
			echo '5 + "5" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var1 - $var3;
			echo '5 - "5" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var1 * $var3;
			echo '5 * "5" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var1/$var3;
			echo '5 / "5" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var1%$var3;
			echo '5 % "5" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo "<br>";
			
			$varResultado = $var1 + $var4;
			echo '5 + "5.0" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var1 - $var4;
			echo '5 - "5.0" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var1 * $var4;
			echo '5 * "5.0" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var1/$var4;
			echo '5 / "5.0" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var1%$var4;
			echo '5 % "5.0" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo "<br>";
			
			$varResultado = $var2 + $var1;
			echo '5.0 + 5 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var2 - $var1;
			echo '5.0 - 5 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var2 * $var1;
			echo '5.0 * 5 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var2/$var1;
			echo '5.0 / 5 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var2%$var1;
			echo '5.0 % 5 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo "<br>";
			
			$varResultado = $var2 + $var3;
			echo '5.0 + "5" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var2 - $var3;
			echo '5.0 - "5" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var2 * $var3;
			echo '5.0 * "5" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var2/$var3;
			echo '5.0 / "5" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var2%$var3;
			echo '5.0 % "5" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo "<br>";
			
			$varResultado = $var2 + $var4;
			echo '5.0 + "5.0" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var2 - $var4;
			echo '5.0 - "5.0" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var2 * $var4;
			echo '5.0 * "5.0" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var2/$var4;
			echo '5.0 / "5.0" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var2%$var4;
			echo '5.0 % "5.0" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo "<br>";
			
			$varResultado = $var3 + $var1;
			echo '"5" + 5 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var3 - $var1;
			echo '"5" - 5 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var3 * $var1;
			echo '"5" * 5 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var3/$var1;
			echo '"5" / 5 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var3%$var1;
			echo '"5" % 5 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo "<br>";
			
			$varResultado = $var3 + $var2;
			echo '"5" + 5.0 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var3 - $var2;
			echo '"5" - 5.0 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var3 * $var2;
			echo '"5" * 5.0 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var3/$var2;
			echo '"5" / 5.0 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var3%$var2;
			echo '"5" % 5.0 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo "<br>";
			
			$varResultado = $var3 + $var4;
			echo '"5" + "5.0" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var3 - $var4;
			echo '"5" - "5.0" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var3 * $var4;
			echo '"5" * "5.0" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var3/$var4;
			echo '"5" / "5.0" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var3%$var4;
			echo '"5" % "5.0" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo "<br>";
			
			$varResultado = $var4 + $var1;
			echo '"5.0" + 5 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var4 - $var1;
			echo '"5.0" - 5 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var4 * $var1;
			echo '"5.0" * 5 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var4/$var1;
			echo '"5.0" / 5 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var4%$var1;
			echo '"5.0" % 5 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo "<br>";
			
			$varResultado = $var4 + $var2;
			echo '"5.0" + 5.0 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var4 - $var2;
			echo '"5.0" - 5.0 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var4 * $var2;
			echo '"5.0" * 5.0 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var4/$var2;
			echo '"5.0" / 5.0 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var4%$var2;
			echo '"5.0" % 5.0 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo "<br>";
			
			$varResultado = $var4 + $var3;
			echo '"5.0" + "5" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var4 - $var3;
			echo '"5.0" - "5" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var4 * $var3;
			echo '"5.0" * "5" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var4/$var3;
			echo '"5.0" / "5" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var4%$var3;
			echo '"5.0" % "5" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo "<br>";
			
			echo 'OPERADORES DE INCREMENTO Y DECREMENTO'."\n<br>";
			echo "<br>";
			
			$varResultado = $var1++;
			echo '5++ = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = ++$var1;
			echo '++5 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var1--;
			echo '5-- = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = --$var1;
			echo '--5 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo "<br>";
			
			$varResultado = $var2++;
			echo '5.0++ = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = ++$var2;
			echo '++5.0 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var2--;
			echo '5.0-- = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = --$var2;
			echo '--5.0 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo "<br>";
			
			$varResultado = $var3++;
			echo '"5"++ '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = ++$var3;
			echo '++"5" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var3--;
			echo '"5"-- = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = --$var3;
			echo '--"5" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo "<br>";
			
			$varResultado = $var4++;
			echo '"5.0"++ = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = ++$var4;
			echo '++"5.0" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var4--;
			echo '"5.0"-- = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = --$var4;
			echo '--"5.0" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo "<br>";
			
			echo 'OPERADORES DE ASIGNACIÓN'."\n<br>";
			echo "<br>";
			
			$varResultado = $var1 += $var2;
			echo '5 += 5.0 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var1 -= $var2;
			echo '5 -= 5.0 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var1 *= $var2;
			echo '5 *= 5.0 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var1/=$var2;
			echo '5 /= 5.0 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var1%=$var2;
			echo '5 %= 5.0 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo "<br>";
			
			$varResultado = $var1 += $var3;
			echo '5 += "5" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var1 -= $var3;
			echo '5 -= "5" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var1 *= $var3;
			echo '5 *= "5" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var1/=$var3;
			echo '5 /= "5" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var1%=$var3;
			echo '5 %= "5" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo "<br>";
			
			$varResultado = $var1 += $var4;
			echo '5 += "5.0" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var1 -= $var4;
			echo '5 -= "5.0" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var1 *= $var4;
			echo '5 *= "5.0" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var1/=$var4;
			echo '5 /= "5.0" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var1%=$var4;
			echo '5 %= "5.0" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo "<br>";
			
			$varResultado = $var2 += $var1;
			echo '5.0 += 5 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var2 -= $var1;
			echo '5.0 -= 5 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var2 *= $var1;
			echo '5.0 *= 5 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var2/=$var1;
			echo '5.0 /= 5 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var2%=$var1;
			echo '5.0 %= 5 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo "<br>";
			
			$varResultado = $var2 += $var3;
			echo '5.0 += "5" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var2 -= $var3;
			echo '5.0 -= "5" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var2 *= $var3;
			echo '5.0 *= "5" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var2/=$var3;
			echo '5.0 /= "5" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var2%=$var3;
			echo '5.0 %= "5" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo "<br>";
			
			$varResultado = $var2 += $var4;
			echo '5.0 += "5.0" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var2 -= $var4;
			echo '5.0 -= "5.0" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var2 *= $var4;
			echo '5.0 *= "5.0" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var2/=$var4;
			echo '5.0 /= "5.0" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var2%=$var4;
			echo '5.0 %= "5.0" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo "<br>";
			
			$varResultado = $var3 += $var1;
			echo '"5" += 5 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var3 -= $var1;
			echo '"5" -= 5 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var3 *= $var1;
			echo '"5" *= 5 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var3/=$var1;
			echo '"5" /= 5 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var3%=$var1;
			echo '"5" %= 5 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo "<br>";
			
			$varResultado = $var3 += $var2;
			echo '"5" += 5.0 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var3 -= $var2;
			echo '"5" -= 5.0 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var3 *= $var2;
			echo '"5" *= 5.0 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var3/=$var2;
			echo '"5" /= 5.0 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var3%=$var2;
			echo '"5" %= 5.0 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo "<br>";
			
			$varResultado = $var3 += $var4;
			echo '"5" += "5.0" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var3 -= $var4;
			echo '"5" -= "5.0" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var3 *= $var4;
			echo '"5" *= "5.0" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var3/=$var4;
			echo '"5" /= "5.0" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var3%=$var4;
			echo '"5" %= "5.0" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo "<br>";
			
			$varResultado = $var4 += $var1;
			echo '"5.0" += 5 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var4 -= $var1;
			echo '"5.0" -= 5 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var4 *= $var1;
			echo '"5.0" *= 5 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var4/=$var1;
			echo '"5.0" /= 5 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var4%=$var1;
			echo '"5.0" %= 5 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo "<br>";
			
			$varResultado = $var4 += $var2;
			echo '"5.0" += 5.0 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var4 -= $var2;
			echo '"5.0" -= 5.0 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var4 *= $var2;
			echo '"5.0" *= 5.0 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var4/=$var2;
			echo '"5.0" /= 5.0 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var4%=$var2;
			echo '"5.0" %= 5.0 = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo "<br>";
			
			$varResultado = $var4 += $var3;
			echo '"5.0" += "5" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var4 -= $var3;
			echo '"5.0" -= "5" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var4 *= $var3;
			echo '"5.0" *= "5" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var4/=$var3;
			echo '"5.0" /= "5" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			$varResultado = $var4%=$var3;
			echo '"5.0" %= "5" = '.$varResultado. ' .TIPO DE VARIABLE '.gettype($varResultado)."\n<br>";
			echo "<br>";
			
		?>
	</body>
</html>