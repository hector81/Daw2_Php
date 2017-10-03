<?php	//no tendra acceso al id 
	session_start();
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
			echo ' !Hola',$_SESSION['nombre'],'<br>';
			echo 'session_id = ',session_id(),'<br>';

		?><br>
		<!-- Enlace a la pagina 2-->
		<a href="pagina2.php">Pagina 2</a>
		</div>
	</body>
</html>