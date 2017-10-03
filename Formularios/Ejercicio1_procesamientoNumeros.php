<!-- Diseñar un formulario html que solicite dos números enteros. Una vez introducidos los
números y enviado el formulario, el código php de la página que recibe los datos del mismo
mostrará la suma, resta, multiplicación, división (entera y real) y resto de los números. -->
<html>
	<head>
		<title>Procesamiento de los datos del formulario GET. Números</title>
	</head>
	<body> 
		<?php
			$numero1 = $_GET['numero1'];
			$numero2 = $_GET['numero2'];
			echo "Número 1 : ".$numero1."<br>";
			echo "Número 2 : ".$numero2."<br>";
			
			echo "Suma ".($numero1+$numero2). "<br>";
			echo "Resta ".($numero1-$numero2). "<br>";
			echo "Multiplicación ".($numero1*$numero2). "<br>";
			echo "División ".($numero1/$numero2). "<br>";
			echo "Resto ".($numero1%$numero2). "<br>";
	
			print_r($_GET);
		?>
	</body>
</html>