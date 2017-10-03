<!DOCTYPE html>
<html>
	<head>
		<title>Cookie -Pagina  2</title>
		<meta charset="utf-8">
	</head>
	<body>
		<div>
		<?php	

			if(isset($_COOKIE['nombre']))
			{
				echo "\$_COOKIE['nombre'] = {$_COOKIE['nombre']}<br>";//si volvemos a abrir el navegador no aparece porque la cookie ha caducado
			}else{
				echo "\$_COOKIE['nombre'] = <br>";
			}
			
			if(isset($_COOKIE['apellido']))
			{
				echo "\$_COOKIE['apellido'] = {$_COOKIE['apellido']}<br>";
			}else{
				echo "\$_COOKIE['apellido'] = <br>";
			}
			
		?>
		
		</div>
	<body>
</body>
</html>