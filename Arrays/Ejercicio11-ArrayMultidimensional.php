<!-- 11. Crear un array multidimensional para poder guardar los componentes de dos familias: “Los
		Simpson” y “Los Griffin” dentro de cada familia ha de constar el padre, la madre y los
		hijos, donde padre, madre e hijos serán los índices y los nombres serán los valores
			a. Familia “Los Simpson”: padre Homer, madre Marge, hijos Bart, Lisa y Maggie
			b. Familia “Los Griffin”: padre Peter, madre Lois, hijos Chris, Meg y Stewie
		Mostrar los valores de las dos familias en una lista no numerada. -->
<html>
	<head>
		<title>Ejercicio 11: Crear un array multidimensional para poder guardar los componentes de dos familias.</title>
	</head>
	<body>
		<?php
			$arrayFamilias = array(
				"Los Simpson" => array(
						 "padre" => "Homer",
						 "madre" => "Marge",
						 "hijo"=>array("Bart", "Lisa", "Maggie")
					),
				"Los Griffin" => array(
						 "padre" => "Peter",
						 "array" => "Lois",
						 "hijo"=>array("Chris", "Meg", "Stewie")
					)
			);
			//sin indices
			foreach ($arrayFamilias as $familia => $miembros) {
				echo $familia."<br>";
				foreach ($miembros as $elementos) {
					if (!is_array($elementos)) {
						echo $elementos."<br>";
					}else{
						foreach ($elementos as $hijo) {
							echo $hijo."<br>";
						}
						echo "<br>";
					}
				}
				echo "<br>";
			}

			//con string
			foreach ($arrayFamilias as $familia => $miembros) {
				echo "Familia : ".$familia."<br>";
				foreach ($miembros as $var => $elementos) {
					if (!is_array($elementos)) {
						echo $var . " : ". $elementos."<br>";
					}else{
						$contador = 1;
						foreach ($elementos as $hijo) {
							echo "Hijo " . $contador. " : ".$hijo."<br>";
							
							$contador++;
						}
						echo "<br>";
					}
				}
				echo "<br>";
			}

		?>
	</body>
</html>