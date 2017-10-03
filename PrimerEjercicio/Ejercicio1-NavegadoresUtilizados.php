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
		<h1><center>Primera forma</center></h1>
		<?php
			echo "<b><center>". $_SERVER['HTTP_USER_AGENT'] ."</center></b>\n";  //\n para salto linea en navegador codigo fuente
			echo '<b><center>'. $_SERVER['HTTP_USER_AGENT'] .'</center></b>\n';
		?>
		<h1><center>Segunda forma</center></h1>
		<?php
			$nav1 = getenv('HTTP_USER_AGENT');//obtener informacion del envio o navegador
			$nav2 = get_browser(null,true);
			echo "<b><center>". $nav1 ."</center></b>\n";
			print_r($nav2);
			echo "<b><center>". $nav2 ."</center></b>";
		?>
		<h1><center>Navegador utilizado.</center></h1>
		<h2>Estas usando un navegador</h2>
		<?php			
			if(strpos($nav, 'Trident'));
		?>
		<h2>Internet Explorer</h2>
		<h2>Mozilla Firefox</h2>
		<h2>Internet Explorer</h2>
		<h2>Lo desconozco</h2>
	</body>
</html>
