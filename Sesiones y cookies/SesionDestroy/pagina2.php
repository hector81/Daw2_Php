<?php	
	session_start();
	$_SESSION = array();//Elimina toda la información de la sesión
	if(isset($_COOKIE[session_name()]))
	{	
		setcookie(session_name(),'',time()-1,'/');
	}
	session_destroy();//destruye la sesion
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
			echo ' ,Hola',$_SESSION['nombre'],'<br>';
			echo 'session_id = ',session_id(),'<br>';

		?><br>
		<!-- Enlace a la pagina 3-->
		<a href="pagina3.php">Pagina 3</a>
		</div>
	</body>
</html>