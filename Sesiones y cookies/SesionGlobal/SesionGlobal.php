
<?php
	///abrir y reactivar la sesion
	session_start();
	//guardar dos informaciones en la sesion
	$_SESSION['nombre'] = 'nombreSesion';
	$_SESSION['informacion'] = // es una matriz
	['nombre' => 'unNombre','apellido' => 'unApellido'];

?>
		
<!DOCTYPE html>
<html>
	<head>
		<title>Sesion pag  1</title>
	</head>
	<body>
		<div><a href="sesionPagina2.php"></a></div>
	<body>
</body>
</html>