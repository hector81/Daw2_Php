<!-- 3. Diseñar un formulario web simple que solicite al usuario el precio de tres productos en tres
establecimientos distintos denominados Tienda 1, Tienda 2 y Tienda 3. Una vez
enviada esta información se debe calcular y mostrar el precio medio del producto. -->
<html>
	<head>
		<title>Procesamiento de los datos del formulario GET. Números</title>
	</head>
	<body> 
		
	</body>
</html>
<html>
	<head>
		<title>Formulario web que pida la altura y el diámetro de un cilindro en metros para calcular el volumen</title>
	</head>
	<body> 
		<form name="input" action="Ejercicio3_Productos_Tienda.php" method="POST">
		<h1>Tienda 1</h1>
		Precio naranjas el kg: <input type="text" name="naranjas_Tienda1"><br>
		Precio patatas el kg: <input type="text" name="patatas_Tienda1"><br>
		Precio tomates el kg: <input type="text" name="tomates_Tienda1"><br>
		<h1>Tienda 2</h1>
		Precio naranjas el kg: <input type="text" name="naranjas_Tienda2"><br>
		Precio patatas el kg: <input type="text" name="patatas_Tienda2"><br>
		Precio tomates el kg: <input type="text" name="tomates_Tienda2"><br>
		<h1>Tienda 3</h1>
		Precio naranjas el kg: <input type="text" name="naranjas_Tienda3"><br>
		Precio patatas el kg: <input type="text" name="patatas_Tienda3"><br>
		Precio tomates el kg: <input type="text" name="tomates_Tienda3"><br>
		<input type="submit" name="Enviar" value="Enviar">
		</form>
		<?php
			if(isset($_POST['Enviar'])){
					 if( empty($_POST['naranjas_Tienda1'] || empty($_POST['patatas_Tienda1'] || empty($_POST['tomates_Tienda1'] || empty($_POST['naranjas_Tienda2']
					 || empty($_POST['patatas_Tienda2'] || empty($_POST['tomates_Tienda2'] || empty($_POST['naranjas_Tienda3'] || empty($_POST['patatas_Tienda3']
					  || empty($_POST['tomates_Tienda3']) {
								echo "Faltan campos"; 
					 }else{
					 $precio_naranjas_Tienda1 = $_POST['naranjas_Tienda1'];
					 $precio_patatas_Tienda1 = $_POST['patatas_Tienda1'];
					 $precio_tomates_Tienda1 = $_POST['tomates_Tienda1'];
					 $precio_naranjas_Tienda2 = $_POST['naranjas_Tienda2'];
					 $precio_patatas_Tienda2 = $_POST['patatas_Tienda2'];
					 $precio_tomates_Tienda2 = $_POST['tomates_Tienda2'];
					 $precio_naranjas_Tienda3 = $_POST['naranjas_Tienda3'];
					 $precio_patatas_Tienda3 = $_POST['patatas_Tienda3'];
					 $precio_tomates_Tienda3 = $_POST['tomates_Tienda3'];
					//calculamos 
					$precioMedio_naranjas = (float)(($precio_naranjas_Tienda1 + $precio_naranjas_Tienda2 + $precio_naranjas_Tienda3)/3);
					$precioMedio_patatas = (float)(($precio_patatas_Tienda1 + $precio_patatas_Tienda2 + $precio_patatas_Tienda3)/3);
					$precioMedio_tomates = (float)(($precio_tomates_Tienda1 + $precio_tomates_Tienda2 + $precio_tomates_Tienda3)/3);
					
					echo "El precio medio de las naranajas es : ".$precioMedio_naranjas."<br>";
					echo "El precio medio de las patatas es : ".$precioMedio_patatas."<br>";
					echo "El precio medio de los tomates es : ".$precioMedio_tomates. "<br>";
					 } 
				 
							
			}
			
		?>
	</body>
</html>