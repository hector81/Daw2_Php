<!-- 6. Repetir el ejercicio anterior pero sin índices. Ejemplo:
La clave del array asociativo que tiene como valor Madrid es MD. -->
<html>
	<head>
		<title>Ejercicio 6: Crea un array introduciendo ciudades y recorrerlo sin indices.</title>
	</head>
	<body>
		<?php
			//1º forma sin indices 
			$arrayCiudades1 = array(
				  "Madrid",
				  "Barcelona",
				  "Londres",
				  "New York",
				  "Los Ángeles",
				  "Chicago"
			);

			function recorrerArraySinIndice1($arrayCiudades1){
				for($i = 0 ,$j = count($arrayCiudades1); $i < $j; $i++){
					echo $arrayCiudades1[$i]."\n<br>";
				}
			}
			
			echo recorrerArraySinIndice1($arrayCiudades1);
			//2º forma sin indices 
			$arrayCiudades2["MD"]="Madrid";
			$arrayCiudades2["BA"]="Barcelona";
			$arrayCiudades2["LO"]="Londres";
			$arrayCiudades2["NY"]="New York";
			$arrayCiudades2["LA"]="Los Ángeles";
			$arrayCiudades2["CH"]="Chicago";

			function recorrerArraySinIndice2($arrayCiudades2){
				foreach ($arrayCiudades2 as $key => $var) {
						echo $key .  " : " . $var . "<br>";
					}
			}
			
			echo recorrerArraySinIndice2($arrayCiudades2);
			//3º forma sin indices 
			$arrayCiudades3[]="Madrid";
			$arrayCiudades3[]="Barcelona";
			$arrayCiudades3[]="Londres";
			$arrayCiudades3[]="New York";
			$arrayCiudades3[]="Los Ángeles";
			$arrayCiudades3[]="Chicago";

			function recorrerArraySinIndice3($arrayCiudades3){
				for($i = 0 ,$j = count($arrayCiudades3); $i < $j; $i++){
					echo $arrayCiudades3[$i]."\n<br>";
				}
			}
			echo recorrerArraySinIndice2($arrayCiudades3);
		?>
	</body>
</html>