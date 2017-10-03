<!-- 3- Realizar un programa que muestre las películas que se han visto. Crear un array que
		contenga los meses de enero, febrero, marzo y abril asignando valores 9, 20, 0 y 17
		respectivamente. Si en alguno de los meses no se ha visto ninguna película, no ha de
		mostrar la información de ese mes. Realizar el ejercicio primero con índices y luego con
		claves de cadena (asociativo) -->
<html>
	<head>
		<title>Ejercicio 3: Crear el array asociativo que sigue y mostrar sus valores.</title>
	</head>
	<body>
		<?php
			$arrayAsociativoMeses = array(
				"enero" => 90,
				"febrero" => 20,
				"marzo"   => 0,
				"abril"  => 17,
			);

			
			//con indices	
			function recorrerIndice($arrayAsociativoMeses,$mes){				
				$valor = $arrayAsociativoMeses[$mes];				
				if($valor > 1){	
					echo $valor;
				}else{
					echo "";
				}
			}
			echo recorrerIndice($arrayAsociativoMeses,"enero"). " pelicula vistas" ."<br>";
			echo recorrerIndice($arrayAsociativoMeses,"febrero"). " pelicula vistas" ."<br>";
			echo recorrerIndice($arrayAsociativoMeses,"marzo"). " pelicula vistas" ."<br>";
			echo recorrerIndice($arrayAsociativoMeses,"abril"). " pelicula vistas" ."<br>";
			echo "<br>";
			
			//recorrer claves de cadena
			function recorrerClave($arrayAsociativoMeses){				
				foreach ($arrayAsociativoMeses as $key => $var) {
					if($var > 1){
						echo $key .  " " . $var . " pelicula vistas" ."<br>";
					}
				}
			}
			echo recorrerClave($arrayAsociativoMeses);
			echo "<br>";
			
			//con foreach			
			foreach($arrayAsociativoMeses as &$valor){
				if($valor > 1){
					echo $valor. " pelicula vistas" ."<br>";				
				}						
			}

			//switch se puede hacer con array//array[0] //echo (array[]? peli arry[]) //usando ternarios
			
			
		?>
	</body>
</html>