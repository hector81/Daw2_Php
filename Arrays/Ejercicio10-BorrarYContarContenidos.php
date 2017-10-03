<!-- 10. Crear un array con los siguientes valores: 5=>1, 12=>2, 13=>56, x=>42. Mostrar el
contenido. Cuenta el número de elementos que tiene y mostrarlo por pantalla. A
continuación borrar el elemento de la posición 5. Volver a mostrar el contenido. Por último
eliminar el array. -->
<html>
	<head>
		<title>Ejercicio 10:.</title>
	</head>
	<body>
		<?php
			$arraysNumeros = array(
				  5=>1, 
				  12=>2, 
				  13=>56, 
				  "x"=>42
			);
			
			//numero elementos
			function contarElementosArray($arraysNumeros){
				$numeroElementos = count($arraysNumeros);
				return $numeroElementos;
			}
			echo "Numero elementos array ". contarElementosArray($arraysNumeros) ."<br>";
			echo "<br>";
			//recorrer array
			function recorrerArray($arraysNumeros){
				foreach ($arraysNumeros as $key => $var) {
					echo $key .  " : " . $var . "<br>";
				}
				echo "<br>";
			}
			echo recorrerArray($arraysNumeros) ."<br>";
			
			//borramos elemento 5
			$elementoBorrar = 5;
			function borrarElementosArray($arraysNumeros, $elementoBorrar){
				foreach ($arraysNumeros as $key => $var) {
					if($key == $elementoBorrar){
						unset($arraysNumeros[$key]);
					}
				}
				return $arraysNumeros;
			}
			
			$arraysNumeros = borrarElementosArray($arraysNumeros, $elementoBorrar);
			
			//volvemos a recorrer
			echo "Borrado el indice 5  : <br>";
			echo recorrerArray($arraysNumeros) ."<br>";
			
			//eliminar el array
			unset($arraysNumeros);
			echo isset($arraysNumeros);//." vacio".is_null($arraysNumeros)." vacio ".empty($arraysNumeros)."<br>"; //el isset sabe si está indexado o nob    
			echo "Array borrado. Si intentamos recorrerlo pasa esto : <br>";
			echo recorrerArray($arraysNumeros) ."<br>";
		?>
	</body>
</html>