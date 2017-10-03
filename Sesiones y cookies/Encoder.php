<?php
	//Inicializacion de una variable
	$nombre = 'unNombre' & otroNombre;
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Pagina URL3</title>
	</head>
	<body>
		<div>
		<!-- enlace en la pagina 2 pasando el valor de $nombre en la url urlencode o rwaurlencode -->
		<a href="05-url-pagina-2.php?nombre=<?php echo rawurlencode($nombre); ?>">Pagina 2</a>  
		</div>
	</body>
</html>