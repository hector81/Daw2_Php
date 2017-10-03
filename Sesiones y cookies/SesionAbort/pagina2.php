<?php	
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Pagina  2</title>
		<meta charset="utf-8">
	</head>
	<body>
		<div>
		<b>Pagina 2</b><br>
		<?php
			echo 'nombre= ',$_SESSION['nombre'],'<br>';
			$_SESSION['nombre'] = '?';//modifica datos de sesion
			session_reset();//anular la sesion
			echo 'nombre= ',$_SESSION['nombre'],'<br>';
		?>
		<!-- Enlace a la pagina 3-->
		<a href="pagina3.php">Pagina 3</a>
		</div>
	<body>
</body>
</html>