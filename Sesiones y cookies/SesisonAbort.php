<?php	
	session_star();
	//guardar una informacionen la sesion
	$_SESSION['nombre'] = 'unNombre';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Pagina  1</title>
		<meta charset="utf-8">
	</head>
	<body>
		<div>
		<b>Pagina 1</b><br>
		<?php
			echo 'nombre = ',$_SESSION['NOMBRE'],'<br>';
		?><br>
		<!-- Enlace a la pagina 2-->
		<a href="pagina2.php">Pagina 2</a>
		</div>
	<body>
</body>
</html>