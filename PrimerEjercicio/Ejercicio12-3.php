<!-- 12.- Realizar un código PHP que muestre en el navegador del cliente los números perfectos que
hay entre 1 y 10000.
Un número perfecto es aquel que es igual a la suma de sus divisores. Ejemplo: 6=1+2+3. -->
<html>
	<head>
		<title>Ejercicio 12: Números perfectos de 1 a 1000</title>
	</head>
	<body>
		<?php
			echo "FUNCION NORMAL"."\n<br>";
			$varNumero = 100000;
			$perfectosOp = generaArray($varNumero);
			echo mostrarPerfectosNumeroParametrosDeterminados($perfectosOp)."\n<br>";
			
			//primera forma
			function mostrarPerfecto($varNumero){
				for($i=1;$i<=$varNumero;$i++){//recorremos hasta 1000
				$esPerfecto = TRUE;
				$varSuma=0;
					for($j = 1; $j < $i; $j++){//recorremos el numero
						if($i%$j==0){
							$varSuma = $varSuma + $j; //sumamos sus divisores
							if($i==$varSuma){
								$esPerfecto = FALSE;
								break;
							}
						}
					}
				}
				return $esPerfecto;
			}
			
			function generaArray($varNumero){
				for($i=1;$i<=$varNumero;$i++){//recorremos hasta 1000
					$perfectos[$i] = $i;
				}
				return $perfectos;
			}
			
			
			
			function mostrarPerfectosNumeroParametrosDeterminados($perfectosOp){
				foreach ($perfectosOp as &$valor) {
					if(mostrarPerfecto($valor)== FALSE){
						echo $valor."\n<br>";
					}					
				}
			}
			

			//este funciona
			function mostrarPerfectoGoyo1($varNumero){
				$divisores[0]= false;//iniciamos la primera posicion en false
				$varSuma = $varNumero;
				for($i=1;$i<=(int)($varNumero/2)+1;$i++){
				if($varNumero%$j==0){
					$divisores[] =$j;
					$varNumero -= $j; //restamos
				}
				if(!($varNumero)){
					$divisores[0]= true;
				}
	
				return $divisores;
			}
			
			function mostrarPerfectoGoyo2($varNumero){
				$divisores[0]= false;//iniciamos la primera posicion en false
				$divisores[1]= 1;
				$varSuma = $varNumero-1;
				for($i=1;$i<= sqrt($varNumero)+1;$i++){//raiz cuadrada
				if($varNumero%$j==0){
					$divisores[] =$j;
					$varSuma -= $i; //restamos
					$i = $varNumero/$j;
					$divisores[] =$i;
					$varSuma -= $i;
				}
				if(!($varSuma)){
					$divisores[0]= true;
				}
	
				return $divisores;
				
				//for num num < 1000
				//num = divisores
				// if(divisores[0])   true
			}
		?>
	</body>
</html>