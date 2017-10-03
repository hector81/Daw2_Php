<?php	
	//Comprobar si la sesion esta abierta, es decir si se
	//ha tansmitido una variable "sesion" mediante la URL
	if(!isset($_GET['sesion']))
	{
		//Variable  "sesion" vacia = sin sesion => iniciar sesion
		//Para este ejmeplo  identificador de sesion
		$sesion = sha1(uniqid());
		$fecha = date('\e\l d/m/Y a las H:i:s');//fecha
		$mensaje= "Nueva sesion : $sesion - $fecha";	
	}
	else
	{
		//Variable "sesion" no vacia = sesion abierta
		// => recuperar la información de la URL
		$sesion = $_GET['sesion'];
		$fecha = $_GET['fecha'];
		//construir un mensaje
		$mensaje ="Sesión ya iniciada : $sesion - $fecha";	
	}
	//Construcción de los parametros de la URL : $sesion + $fecha
	// $sesion no necesita codificarse
	$url = "?sesion&fecha =". rawurlencode($fecha);
	//Determinación de la fecha y de la hora
	//del inicio de sesion
	$actual = 'Hoy es el día '.date('d/m/Y').' son las ' .date('H:i:s');
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Pag  2</title>
		<meta charset="utf-8">
	</head>
	<body>
		<div>
		<b>Pagina 2 - <?= $actual; ?></b><br>
		<?= $mensaje; ?><br>
		<!-- Enlace a la pagina 2-->
		<a href="sesUrlPagina1.php<?= $url; ?>" >Pagina 1</a>
		</div>
	<body>
</body>
</html>