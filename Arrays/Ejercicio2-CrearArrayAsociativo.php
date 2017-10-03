<!-- 2-Crear el array asociativo que sigue y mostrar sus valores con una estructura foreach
		$v[1]=90;
		$v[30]=7;
		$v[‘e’]=99;
		$v[‘hola’]=43; -->
<html>
	<head>
		<title>Ejercicio 2: Crear el array asociativo que sigue y mostrar sus valores con una estructura foreach.</title>
	</head>
	<body>
		<?php
			//una forma de hacerlo
			$arrayAsociativo = array(
				1 => 90,
				30 => 7,
				"e"   => 99,
				"hola"  => 43,
			);

			var_dump($arrayAsociativo);
			
			echo "<br>";
			foreach($arrayAsociativo as &$valor){
				echo $valor."<br>";				
			}
			
			//otra forma de hacerlo
			$arrayAsociativoNumero[1] = 90;
			$arrayAsociativoNumero[30] = 7;
			$arrayAsociativoNumero["e"] = 99;
			$arrayAsociativoNumero["hola"] = 43;
			
			var_dump($arrayAsociativoNumero);
			
			echo "<br>";
			foreach($arrayAsociativoNumero as &$valor){
				echo $valor."<br>";				
			}
		?>
	</body>
</html>