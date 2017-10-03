<!-- Mostrar en el navegador del cliente, información sobre el propio navegador
, buscar una funcion, hay mas de una nuevas o obsoletas, que tome como
parametro  -->
<html>
	<head>
		<title>Ejercicio 1: SACAR INFORMACIÓN DEL NAVEGADOR</title>
		<?php
			$nav = $_SERVER['HTTP_USER_AGENT'];
		?>
	</head>
	<body>
		<h1><center>Navegador utilizado.</center></h1>
		<h2>Estas usando un navegador</h2>
		<?php			
			if(strpos($nav, 'Trident'))
			{
		?>
		<h2>Internet Explorer</h2>
		<?php			
			}elseif(strpos($nav, 'Firefox')){
		?>
		<h2>Mozilla Firefox</h2>
		<?php			
			}else{
		?>
		<h2>Lo desconozco</h2>
		<?php			
			}
		?>
	</body>
</html>