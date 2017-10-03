<?php
	//Inicializacion de una variable
	$nombre = 'unNombre';
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Pagina URL1</title>
	</head>
	<body>
		<div>
		<!-- enlace en la pagina 2 pasando el valor de $nombre en la url -->
		<a href="04-url-pagina-2.php?nombre=<?=  $nombre; ?>">Pagina 2</a>
		</div>
	</body>
</html>