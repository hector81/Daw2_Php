<?php	
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Pagina  3</title>
		<meta charset="utf-8">
	</head>
	<body>
		<div>
		<b>Pagina 3</b><br>
		<?php
			echo 'nombre= ',$_SESSION['nombre'],'<br>';//si pones punto funciona igual
		?>
		<!-- Enlace a la pagina 2-->
		<a href="pagina3.php">Pagina 3</a>
		</div>
	<body>
</body>
</html>