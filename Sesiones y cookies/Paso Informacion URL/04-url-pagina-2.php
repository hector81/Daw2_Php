<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Pagina URL2</title>
	</head>
	<body>
		<div>
		<?php
			//Visualizacion de la informacion contenida en las matrices $_GET y $_REQUEST .
			echo '$_GET["nombre"] -> ',$_GET['nombre'],'<br>';
			echo '$_REQUEST["nombre"] -> ',$_REQUEST['nombre'],'<br>';
		?>
		</div>
	</body>
</html>