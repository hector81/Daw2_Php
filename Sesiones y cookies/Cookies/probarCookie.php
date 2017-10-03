<?php	

	if(!isset($_GET['vuelta']))//poner informacion en la url
	{
		setcookie('prueba','prueba');
		header('Location:probarCookie.php?vuelta=1');//y hacer que la pagina se recarge automaticamente con la linea anterior
														//si se recarga la pagina
		exit;
	}
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Comprobar si el equipo acepta las cookies</title>
		<meta charset="utf-8">
	</head>
	<body>
		<div>
			<?php	
				if(!isset($_COOKIE['prueba']))
				{
					echo 'Cookie aceptada';
				}else//no
				{
					echo 'Cookie rechazada';			
				}				
			?>
		
		</div>
	<body>
</body>
</html>