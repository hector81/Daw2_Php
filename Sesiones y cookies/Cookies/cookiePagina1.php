<?php	
	//La primera cookie expira al final de la sesion
	$ok1 = setcookie('nombre','Juan');
	//Segunda cookie expira en 30 dias
	$ok2 = setcookie('apellido','Saez', time()+(30*24*3600));
	if($ok1 and $ok2)//resultado
	{
		$mensaje = 'Cookies depositadas';
	}else{
		$mensaje = 'Una cookie no se ha depositado';
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Cookie -Pagina  1</title>
		<meta charset="utf-8">
	</head>
	<body>
		<div>
		<?= $mensaje ; ?><br>
		<a href="cookiePagina2.php">Pagina 2</a>
		
		</div>
	<body>
</body>
</html>