<?php	
	//Comprobar si la sesion esta abierta, ees decir si se
	//ha transmitido una variable "sesion" mediante la URL
	if(!isset($_COOKIE['sesion']))// "SESION" vacia => inicio
	{ // => iniciar sesion

		$sesion = sha1(uniqid(rand()));
		// - fecha/hora de inicio de sesion
		$fecha = date('\e\l d/m/Y a las H:i:s');
		//teimpo de vida cookies = 'la sesion exactamente'
		setcookie('sesion',$sesion);
		setcookie('fecha',$fecha);
		$mensaje = "Nueva sesion :  $sesion - $fecha";//mensaje
		
	}else{
		//variable "sesion" no vacia = recuperar la informacion
		// => recuperar la informacion de la URL
		$sesion = $_COOKIE['sesion'];
		$fecha = $_COOKIE['fecha'];
		//construir un mensaje
		$mensaje = "Sesion ya iniciada:  $sesion - $fecha";
	}
	//Determinacion de la fecha y la hora actual (no 
	//la del inicio de sesion)
	$actual = 'Hoy es el dia '.date('d/m/Y').
	'son las '.date('H:i:s') ;
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Pagina  1</title>
		<meta charset="utf-8">
	</head>
	<body>
		<div>
		<b>Pagina 1 -
		<?= $actual; ?></b><br>
		<?= $mensaje ; ?><br>
		<!-- Enlace a la pagina 2-->
		<a href="sesCookiePagina2.php">Pagina 2</a>
		</div>
	<body>
</body>
</html>