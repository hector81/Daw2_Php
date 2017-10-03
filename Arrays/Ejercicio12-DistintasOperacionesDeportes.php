<!-- 12. Crear un array llamado deportes e introducir los siguientes valores: fútbol, baloncesto,
	natación, tenis. Hacer el recorrido de la matriz con un for para mostrar los valores. A
	continuación realizar las siguientes operaciones:
			a. Mostrar el total de valores que contiene.
			b. Situar el puntero en el primer elemento del array y mostrar el valor actual, es
			decir, dónde está situado el puntero actualmente.
			c. Avanzar una posición y mostrar el valor actual.
			d. Colocar el puntero en la última posición y mostrar su valor.
			e. Retroceder una posición y mostrar este valor. -->
<html>
	<head>
		<title>Ejercicio 12: Distintas operaciones.</title>
	</head>
	<body>
		<?php
			$arrayDeportes = array(
				"futbol",
				"baloncesto",
				"natacion",
				"tenis"
			);

			//Recorremos la matriz con un for para mostrar los valores
			foreach($arrayDeportes as &$dato){
				echo $dato."\n<br>";
			}
			//a. Mostrar el total de valores que contiene.
			$tamanoArray = count($arrayDeportes);
			echo "El array contiene ". $tamanoArray . " valores "."\n<br>";
			//b. Situar el puntero en el primer elemento del array y mostrar el valor actual, es decir, dónde está situado el puntero actualmente.
			echo "primer elemento del array contiene ". $arrayDeportes[0] ."\n<br>";
			//c. Avanzar una posición y mostrar el valor actual.
			echo "siguiente posicion del array contiene ". $arrayDeportes[1] ."\n<br>";
			//d. Colocar el puntero en la última posición y mostrar su valor.
			echo "ultima posicion del array contiene ". $arrayDeportes[$tamanoArray-1] ."\n<br>";
			//e. Retroceder una posición y mostrar este valor.
			echo "penultima posicion del array contiene ". $arrayDeportes[($tamanoArray-2)] ."\n<br>";
			
			
			
		?>
		
		<p>
			Total elementos <?= count($arrayDeportes);?><br>
			Primer elemento <?= reset($arrayDeportes);?><br>
			Siguiente elemento <?= next($arrayDeportes);?><br>
			Ultimo elemento <?= end($arrayDeportes);?><br>
			Elemento elemento <?= prev($arrayDeportes);?><br></p>
	</body>
</html>