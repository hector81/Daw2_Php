<!-- 10.- Con las variables y valores anteriores probar los diferentes operadores aritméticos con los
valores de las variables (todos con todos creando expresiones con más de un operador) e
informar en el navegador del cliente de la expresión, su resultado y el tipo de datos del valor
resultante. -->

<!-- ESTE EJERCICIO HAY QUE PROBARLO EN PHP 7 -->

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
			echo var_dump($var1);
			echo var_dump($var2);
			echo var_dump($var3);
			echo var_dump($var4);
			$varStringSuma;
			$varResultado;
			$array;
		    $array = array($var1, $var2, $var3, $var4 );
			echo "<br>";
			echo 'OPERADORES ARITMÉTICOS BÁSICOS'."\n<br>";
			echo "<br>";
 
			
			 
			//Recorro todos los elementos
			for($i=0, $j = count($array); $i<$j; $i++){
				  //saco el valor de cada elemento
				  echo $array[$i]." ".gettype($array[$i]);
				  echo "<br>";
			}
			echo "<br>";
			
			//hacemos una funcion para que todos los resultados sean de tipo float
			function devolverTipoDevolucion($a): float {// ESTA FUNCION HAY QUE PROBARLA EN PHP 7 -->
				return $a;
			}
			
			function operadoresAritmeticosComparacion($array){
				//saco el numero de elementos con esta variable local
				$longitud = count($array);
				for($i=0, $j = $longitud; $i<$j; $i++){
					  
				for($z=0, $k = $longitud; $z<$k; $z++){
					if(gettype($array[$i]) != gettype($array[$z])){
						  $varResultado = $array[$i] + $array[$z];
						  $varStringSuma = $array[$i]." ".gettype($array[$i])." + ".$array[$z]." ".gettype($array[$z])." = ".($array[$i] + $array[$z])."<br>";				  
						  echo $varStringSuma;
						  echo "TIPO RESULTADO = ".gettype(devolverTipoDevolucion($varResultado))."<br>";
						  
						  $varResultado = $array[$i] - $array[$z];
						  $varStringResta = $array[$i]." ".gettype($array[$i])." - ".$array[$z]." ".gettype($array[$z])." = ".($array[$i] - $array[$z])."<br>";				  
						  echo $varStringResta;
						  echo "TIPO RESULTADO = ".gettype(devolverTipoDevolucion($varResultado))."<br>";
						  
						  $varResultado = $array[$i] * $array[$z];
						  $varStringMultiplicacion = $array[$i]." ".gettype($array[$i])." x ".$array[$z]." ".gettype($array[$z])." = ".($array[$i] * $array[$z])."<br>";				  
						  echo $varStringMultiplicacion;
						  echo "TIPO RESULTADO = ".gettype(devolverTipoDevolucion($varResultado))."<br>";
						  
						  $varResultado = $array[$i]/$array[$z];
						  $varStringDivision = $array[$i]." ".gettype($array[$i])." / ".$array[$z]." ".gettype($array[$z])." = ".($array[$i]/$array[$z])."<br>";				  
						  echo $varStringDivision;
						  echo "TIPO RESULTADO = ".gettype(devolverTipoDevolucion($varResultado))."<br>";
						  
						  $varResultado = $array[$i]%$array[$z];
						  $varStringResto = $array[$i]." ".gettype($array[$i])." % ".$array[$z]." ".gettype($array[$z])." = ".($array[$i]%$array[$z])."<br>";				  
						  echo $varStringResto;
						  echo "TIPO RESULTADO = ".gettype(devolverTipoDevolucion($varResultado))."<br>";
						  echo "<br>";
					}else{
						  $varResultado = $array[$i] + $array[$z];
						  $varStringSuma = $array[$i]." ".gettype($array[$i])." + ".$array[$z]." ".gettype($array[$z])." = ".($array[$i] + $array[$z])."<br>";				  
						  echo $varStringSuma;
						  echo "TIPO RESULTADO = ".gettype(devolverTipoDevolucion($varResultado))."<br>";
						  
						  $varResultado = $array[$i] - $array[$z];
						  $varStringResta = $array[$i]." ".gettype($array[$i])." - ".$array[$z]." ".gettype($array[$z])." = ".($array[$i] - $array[$z])."<br>";				  
						  echo $varStringResta;
						  echo "TIPO RESULTADO = ".gettype(devolverTipoDevolucion($varResultado))."<br>";
						  
						  $varResultado = $array[$i] * $array[$z];
						  $varStringMultiplicacion = $array[$i]." ".gettype($array[$i])." x ".$array[$z]." ".gettype($array[$z])." = ".($array[$i] * $array[$z])."<br>";				  
						  echo $varStringMultiplicacion;
						  echo "TIPO RESULTADO = ".gettype(devolverTipoDevolucion($varResultado))."<br>";
						  
						  $varResultado = $array[$i]/$array[$z];
						  $varStringDivision = $array[$i]." ".gettype($array[$i])." / ".$array[$z]." ".gettype($array[$z])." = ".($array[$i]/$array[$z])."<br>";				  
						  echo $varStringDivision;
						  echo "TIPO RESULTADO = ".gettype(devolverTipoDevolucion($varResultado))."<br>";
						  
						  $varResultado = $array[$i]%$array[$z];
						  $varStringResto = $array[$i]." ".gettype($array[$i])." % ".$array[$z]." ".gettype($array[$z])." = ".($array[$i]%$array[$z])."<br>";				  
						  echo $varStringResto;
						  echo "TIPO RESULTADO = ".gettype(devolverTipoDevolucion($varResultado))."<br>";
						  echo "<br>";
						}
					}
				}
			}
			
			
			//llamamos a la funcion
			echo operadoresAritmeticosComparacion($array);
			
			echo "<br>";
			echo "PARAMETROS DETERMINADOS FUNCIONES"."\n<br>";
			echo "<br>";
			
			//segunda forma uso de parámetros predeterminados en funciones
			function operadoresAritmeticosComparacionParametrosDeterminados($array = array(8,7.0, "5", "5.0")){
				//saco el numero de elementos con esta variable local
				$longitud = count($array);
				for($i=0, $j = $longitud; $i<$j; $i++){
					  
				for($z=0, $k = $longitud; $z<$k; $z++){
					if(gettype($array[$i]) != gettype($array[$z])){
						  $varResultado = $array[$i] + $array[$z];
						  $varStringSuma = $array[$i]." ".gettype($array[$i])." + ".$array[$z]." ".gettype($array[$z])." = ".($array[$i] + $array[$z])."<br>";				  
						  echo $varStringSuma;
						  echo "TIPO RESULTADO = ".gettype($varResultado)."<br>";
						  
						  $varResultado = $array[$i] - $array[$z];
						  $varStringResta = $array[$i]." ".gettype($array[$i])." - ".$array[$z]." ".gettype($array[$z])." = ".($array[$i] - $array[$z])."<br>";				  
						  echo $varStringResta;
						  echo "TIPO RESULTADO = ".gettype($varResultado)."<br>";
						  
						  $varResultado = $array[$i] * $array[$z];
						  $varStringMultiplicacion = $array[$i]." ".gettype($array[$i])." x ".$array[$z]." ".gettype($array[$z])." = ".($array[$i] * $array[$z])."<br>";				  
						  echo $varStringMultiplicacion;
						  echo "TIPO RESULTADO = ".gettype($varResultado)."<br>";
						  
						  $varResultado = $array[$i]/$array[$z];
						  $varStringDivision = $array[$i]." ".gettype($array[$i])." / ".$array[$z]." ".gettype($array[$z])." = ".($array[$i]/$array[$z])."<br>";				  
						  echo $varStringDivision;
						  echo "TIPO RESULTADO = ".gettype($varResultado)."<br>";
						  
						  $varResultado = $array[$i]%$array[$z];
						  $varStringResto = $array[$i]." ".gettype($array[$i])." % ".$array[$z]." ".gettype($array[$z])." = ".($array[$i]%$array[$z])."<br>";				  
						  echo $varStringResto;
						  echo "TIPO RESULTADO = ".gettype($varResultado)."<br>";
						  echo "<br>";
					}else{
						  $varResultado = $array[$i] + $array[$z];
						  $varStringSuma = $array[$i]." ".gettype($array[$i])." + ".$array[$z]." ".gettype($array[$z])." = ".($array[$i] + $array[$z])."<br>";				  
						  echo $varStringSuma;
						  echo "TIPO RESULTADO = ".gettype($varResultado)."<br>";
						  
						  $varResultado = $array[$i] - $array[$z];
						  $varStringResta = $array[$i]." ".gettype($array[$i])." - ".$array[$z]." ".gettype($array[$z])." = ".($array[$i] - $array[$z])."<br>";				  
						  echo $varStringResta;
						  echo "TIPO RESULTADO = ".gettype($varResultado)."<br>";
						  
						  $varResultado = $array[$i] * $array[$z];
						  $varStringMultiplicacion = $array[$i]." ".gettype($array[$i])." x ".$array[$z]." ".gettype($array[$z])." = ".($array[$i] * $array[$z])."<br>";				  
						  echo $varStringMultiplicacion;
						  echo "TIPO RESULTADO = ".gettype($varResultado)."<br>";
						  
						  $varResultado = $array[$i]/$array[$z];
						  $varStringDivision = $array[$i]." ".gettype($array[$i])." / ".$array[$z]." ".gettype($array[$z])." = ".($array[$i]/$array[$z])."<br>";				  
						  echo $varStringDivision;
						  echo "TIPO RESULTADO = ".gettype($varResultado)."<br>";
						  
						  $varResultado = $array[$i]%$array[$z];
						  $varStringResto = $array[$i]." ".gettype($array[$i])." % ".$array[$z]." ".gettype($array[$z])." = ".($array[$i]%$array[$z])."<br>";				  
						  echo $varStringResto;
						  echo "TIPO RESULTADO = ".gettype($varResultado)."<br>";
						  echo "<br>";
						}
					}
				}
			}
			
			echo operadoresAritmeticosComparacionParametrosDeterminados();
		?>
	</body>
</html>