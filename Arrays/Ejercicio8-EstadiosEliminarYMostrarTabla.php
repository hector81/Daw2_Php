<!-- 8. Implementar un array asociativo con los siguientes valores:
$estadiosFutbol=[‘Barcelona’=>’Camp Nou’, ‘Real Madrid’=>’Santiago Bernabeu’,
‘Valencia’=>’Mestalla’, ‘Real Sociedad’=>’Anoeta’];
Mostrar los valores del array en una tabla, ha de mostrarse el índice y el valor asociado.
Eliminar el estadio asociado al Real Madrid.
Volver a mostrar los valores para comprobar que el valor ha sido eliminado, esta vez en
una lista numerada. -->
<html>
	<head>
		<title>Ejercicio 8: Implementar un array asociativo coN VALORES DE FUTBOL.</title>
	</head>
	<body>
		<?php
			$estadiosFutbol =[
				'Barcelona'=>'Camp Nou', 
				'Real Madrid'=>'Santiago Bernabeu',
				'Valencia'=>'Mestalla', 
				'Real Sociedad'=>'Anoeta'];
			
			//Mostramos los valores en una tabla, ha de mostrarse el índice y el valor asociado.
			echo "Mostramos valores en una tabla". "<br>". "<br>";
			function mostrarTabla($estadiosFutbol){
				foreach ($estadiosFutbol as $equipos => $estadios) {
					echo $equipos .  " : " . $estadios . "<br>";
				}
				echo "<br>";
			}
			
			echo mostrarTabla($estadiosFutbol)."<br>";
			
			//Eliminar el estadio asociado al Real Madrid.
			echo "Eliminando estadio Real Madrid". "<br>". "<br>";
			function eliminarEstadioEquipo($estadiosFutbol, $equipo){
				foreach ($estadiosFutbol as $equipos => $estadios) {
					if($equipos == $equipo){
						unset($estadiosFutbol[$equipos]); //tamnbién se puede usar  unset($estadiosFutbol['Real Madrid']
					}
				}
				echo "<br>";
				return $estadiosFutbol;
			}
			$estadiosFutbol = eliminarEstadioEquipo($estadiosFutbol, "Real Madrid");
			echo mostrarTabla($estadiosFutbol)."<br>";
			
			//Volver a mostrar los valores para comprobar que el valor ha sido eliminado, esta vez en una lista numerada
			echo "Mostramos valores en una tabla en una lista numerada". "<br>". "<br>";
			function mostrarTablaNumerada($estadiosFutbol){			
				$varListaNumero = 1;
				foreach ($estadiosFutbol as $key => $var) {				
					echo "Numero de campo " .$varListaNumero . " : " . $key .  " : " . $var . "<br>";
					$varListaNumero++;
				}
				echo "<br>";
			}
			
			echo mostrarTablaNumerada($estadiosFutbol)."<br>";
		?>
	</body>
</html>