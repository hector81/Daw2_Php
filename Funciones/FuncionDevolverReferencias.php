<html>
	<head>
		<title></title><!-- ESTE EJERCICIO HAY QUE PROBARLO EN PHP 7 -->
	</head>
	<body>
		<?php
			function &devolver_referencia(){
				$algunaref = "Esta es la primera referencia de prueba";
				return $algunaref;
			}

			$nuevaref =& devolver_referencia();
			echo $nuevaref."\n<br>";
			$nuevaref ="Esta es la segunda referencia de prueba";
			echo $nuevaref."\n<br>";
			$nuevaref =& devolver_referencia();
			echo $nuevaref."\n<br>";
		?>
	</body>
</html>