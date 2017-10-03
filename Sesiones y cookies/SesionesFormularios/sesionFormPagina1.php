<?php	
	//Comprobar si la sesion esta abierta, ees decir si sem_acquire
	//ha transmitido una variable "sesion" mediante la URL
	if(!isset($_POST['sesion']))
	{
		//variable "sesion" vacia = sin sesion => iniciar sesion
		//para este ejemplo: identificador de sesionn
		$sesion = sha1(uniqid());
		$mensaje = "Nueva sesion: $sesion - $fecha";//mensaje
		
		
	}else{
		//variable "sesion" no vacia = sesion abierta
		// => recuperar la informacion de la URL
		$sesion = $_POST['sesion'];
		$fecha = $_POST['fecha'];
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
		<b>Pagina 1
		<?php
			echo $actual;
		?></b><br>
		<?= $mensaje ; ?><br>
		<!-- Enlace a la pagina -->
		<form action="sesionFormPagina2.php" method="post">
		<div>
		<input type="hidden" name="sesion" value="<? $sesion; ?>" />
		<input type="hidden" name="fecha" value="<? $fecha; ?>" />
		
		<input type="submit" name="pagina1" value="pagina1" />
		
		
		</div>
		</form>
		
		</div>
	<body>
</body>
</html>