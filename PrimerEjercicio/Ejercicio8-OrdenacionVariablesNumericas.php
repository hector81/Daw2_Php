<!-- 8.- Realizar un código PHP que dadas tres variables numéricas con valores arbitrarios ordene
los valores de menor a mayor en las variables. Es decir, dadas las variables $var1 = 10,
$var2 = 5 y $var3 = 6.2, tras el proceso de ordenación las variables han de quedar de esta
forma $var1 = 5, $var2 = 6.2 y $var3 = 10. (Este proceso debe tener éxito para
cualquier posible valor inicial que tengan las variables) -->
<html>
	<head>
		<title>Ejercicio 8: 3 variables numéricas arbitrarias ordenadas</title>
	</head>
	<body>
		<?php
			$var1 = 10;
			$var2 = 5;
			$var3 = 6.2;
			
			//primera forma de ordenar mediante array
			$arrayOrdenado = array($var1, $var2, $var3);
			echo 'Primera forma ordenando por array sort '."\n<br>";
			
			sort($arrayOrdenado);//ordenamos array
			
			for($i = 0,$j  = count($arrayOrdenado); $i < $j; $i++){
				echo '$var'.($i+1). ' = '.$arrayOrdenado[$i]."\n";
			}
			echo "\n<br>";
			
			//segunda forma de ordnear mediante array y de adjudicando
			$arrayOrdenado = array($var1, $var2, $var3);			
			echo 'Segunda forma con funcion ordenando por array sort '."\n<br>";
			
			function ordernarSort($arrayOrdenado){
				sort($arrayOrdenado);//ordenamos array
				$var1 = $arrayOrdenado[0];
				$var2 = $arrayOrdenado[1];
				$var3 = $arrayOrdenado[2];
				echo '$var1 = '.$var1."\n";
				echo '$var2 = '.$var2."\n";
				echo '$var3 = '.$var3."\n";
			}
			
			echo ordernarSort($arrayOrdenado)."\n<br>";

			//tercera forma metodo burbuja
			$var11 = 10;
			$var21 = 5;
			$var31 = 6.2;
			
			echo 'Tercera forma con funcion metodo burbuja '."\n<br>";
			//funcion		
			function intercambiarBurbuja($var11, $var21, $var31){
				$arrayM = array($var11, $var21, $var31);
				for ($i=0;$i<count($arrayM);$i++){ 
				   for($j=0;$j<count($arrayM);$j++){ 
						  if ($arrayM[$i]< $arrayM[$j]){ 
								  $temp = $arrayM[$i]; 
								  $arrayM[$i]=$arrayM[$j]; 
								  $arrayM[$j]=$temp; 
						   } 
				   } 		
				}
				return $arrayM;
			}
			
			$arrayBurbuja = intercambiarBurbuja($var11, $var21, $var31);
			  
			echo '$var1 = '.$arrayBurbuja[0]."\n";
			echo '$var2 = '.$arrayBurbuja[1]."\n";
			echo '$var3 = '.$arrayBurbuja[2]."\n<br>";
			
			//cuarta forma GOYO
			$var111 = 10;
			$var211 = 5;
			$var311 = 6.2;
			
			echo 'Cuarta forma con funcion de intercambio de variables '."\n<br>";
			
			//hacemos una funcion intercambio y iria mas rapido //PROBAR CON FUNCION QUE LLAMA A OTRA FUNCION
			function intercambioVariables($var111,$var211,$var311){				
				//variable intercambio
				if ($var111 > $var211){ 
					  $aux = $var111; 
					  $var111 = $var211; 
					  $var211 = $aux;
				} 
				if ($var211 > $var311){ 
					  $aux = $var211; 
					  $var211 = $var311; 
					  $var311 = $aux;
				} 
				if ($var111 > $var211){ //vuelve a preguntar por la primera
					  $aux = $var111; 
					  $var111 = $var211; 
					  $var211 = $aux;
				} 			
				echo '$var1 = '.$var111."\n";
				echo '$var2 = '.$var211."\n";
				echo '$var3 = '.$var311."\n<br>";
				//5 4 1---4 5 1---4 1 5--- 1 4 5
			}
			
			echo intercambioVariables($var111,$var211,$var311)."\n<br>";
			
		?>
	</body>
</html>