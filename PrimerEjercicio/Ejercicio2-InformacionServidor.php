<!--2.- Mostrar en el navegador del cliente toda la información de configuración (variables,
versiones, módulos intalados, etc.) de PHP en el servidor.-->
<html>
	<head>
		<title>Ejercicio 2: Informacion de PHP en el servidor</title>
	</head>
	<body>
		<?php
			// Muestra toda la información, por defecto INFO_ALL
			function muestraInformacion(){
				echo phpinfo();
			}
			echo muestraInformacion();
			// Muestra solamente la información de los módulos.
			function muestraInformacionModulo(){
				echo phpinfo(INFO_MODULES);
			}
			echo muestraInformacionModulo();
		?>
	</body>
</html>