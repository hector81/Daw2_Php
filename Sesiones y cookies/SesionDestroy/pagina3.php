<?php	//recupera el id 
	//abrir/reactivar la pagina
	session_start();

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Pagina 3</title>
		<meta charset="utf-8">
	</head>
	<body>
		<div>
		<b>Pagina 3</b><br>
		<?php
			echo ' ,Hola',$_SESSION['nombre'],'<br>';
			echo 'session_id = ',session_id(),'<br>';

		?><br>
		</div>
	</body>
</html>