<!-- 9. Implementar un array asociativo con los siguientes valores y ordenarlos de menor a mayor.
Mostrar los valores en una tabla.
$numeros=[3,2,8,123,5,1]; -->
<html>
	<head>
		<title>Ejercicio 9: Ordenar array asociativo de menor a mayor.</title>
	</head>
	<body>
		<?php
			$numeros=[3,2,8,123,5,1];
			//primera forma
			//sin ordenar
			foreach($numeros as $key => $value ){
			  echo "Indice ".$key. " = " .$value. "<br>";
			}
			echo "<br>";
			//ordenado
			sort($numeros);
			foreach ($numeros as $key => $value) {
				echo "Indice ".$key. " = " .$value. "<br>";
			}
			echo "<br>";
			
			//segunda forma
			$numerosOrdenar=[3,2,8,123,5,1];
			$valorMayor;
			//averiguamos el mayor
			foreach ($numerosOrdenar as &$valor1) {
				$valorMayor = $valor1;
				foreach ($numerosOrdenar as &$valor2) {
					if($valor2 > $valorMayor )
						$valorMayor = $valor2;
				}			
			}
			echo "Valor mayor: ".$valorMayor."<br>";
			echo "<br>";
			
			$valorMenor;
			
			$valorMenor = $valorMayor;
			//averiguamos el mayor
			foreach ($numerosOrdenar as &$valor1) {			
				if($valor1 < $valorMenor){
					$valorMenor = $valor1;
				}		
			}
			echo "Valor menor: ".$valorMenor."<br>";
			echo "<br>";
			$numerosOrdenar[0] = $valorMenor;
			$contador = 1;
			foreach ($numerosOrdenar as &$valor1) {	
				if($valor1 > $valorMenor && $valor1 != $valorMenor){
					$numerosOrdenar[$contador] = $valor1;
				}
				$contador++;		
			}
			
			foreach ($numerosOrdenar as &$valor1) {			
				echo $valor1."<br>";		
			}
			
		?>
	</body>
</html>