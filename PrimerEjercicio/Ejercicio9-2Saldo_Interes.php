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
			$varSaldoCliente1 = "5556.36";
			$varInteresCliente1 = 5.3;
			$varSaldoCliente2 = "4582nn.36";
			$varInteresCliente2 = 17;
			
			$varResultado = 0; 

			echo "<br>";
			
			//Hacer una funcion para comprobar si es numercio
			function esNumerico($numero) {
				if(is_numeric($numero)) {
					return $numero;
				} else {
					echo " ERROR ,OPERACION NO SE PUEDE REALIZAR. SALDO DEBE SER ENTERO Y INTERES DEBE SER DOUBLE";
				}
			}
			
			function calcularSaldoInteres($varSaldoCliente ,$varInteresCliente){
				$varResultado = $varSaldoCliente*$varSaldoCliente;	
				return $varResultado;
			}
			
			echo "El saldo del cliente 1 es " . esNumerico($varSaldoCliente1) . " y el interes es " . esNumerico($varInteresCliente1) . 
			" y el total es ".calcularSaldoInteres($varSaldoCliente1 ,$varInteresCliente1)."\n<br>";
			echo "El saldo del cliente 2 es " . esNumerico($varSaldoCliente2) . " y el interes es " . esNumerico($varInteresCliente2). 
			" y el total es ".calcularSaldoInteres($varSaldoCliente2 ,$varInteresCliente2)."\n<br>";
			
			///probar si el saldo del tercer cliente es numeric y en ese caso si es int, float, double, string
			$varSaldoCliente3 = "54";

			function esNumericoSaldo($varSaldoCliente3) {
				$varCadena;
				if(is_numeric($varSaldoCliente3)) { //comprueba que sea numerico
					if(is_string($varSaldoCliente3)){// si es numerico comprueba que sea string para parsearlo o no
						$numero = (int)$varSaldoCliente3;					
						if(is_float($numero))	{
							$varCadena = "es float ".$numero."\n<br>";   //var_dump($numero);
						}elseif(is_int($numero))	{
							$varCadena = "es entero ".$numero."\n<br>";   
						}elseif(is_double($numero))	{
							$varCadena = "es double ".$numero."\n<br>";   
						}			
					}else{
						echo 'EL VALOR INTRODUCIDO NO ES CORRECTO'."\n<br>";//EL VALOR  ENTERO				
					}
				} else {
					
					echo " ERROR ,EL SALDO NO ES DE TIPO NUMERIC";
				}
				return $varCadena;
			}
			
			echo 'el saldo del tercer cliente puesto '.esNumericoSaldo($varSaldoCliente3).' '."\n<br>"
			
		?>
	</body>
</html>