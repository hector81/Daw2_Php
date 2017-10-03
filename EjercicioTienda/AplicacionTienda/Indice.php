<html>
	<head>
		<head>
			<title>Cadena Tiendas</title>
			<meta charset="utf-8">
			<link rel="stylesheet" type="text/css" href='web/css/estilos.css' />
		  </head>

	</head>
<body> 
	<div id="contenedor">
		<?php
			// Indice.php
			//http://php.net/manual/es/function.money-format.php
					  //nombreCorto, nombre, descripcion, PVP , idFamilia , Foto
					  //http://php.net/manual/es/faq.passwords.php#faq.passwords.bestpractice
					  //http://librosweb.es/tutorial/la-nueva-api-para-codificar-contrasenas-de-php-55/
			session_start();
			require_once __DIR__ . '/fuente/Modelo/GestorBaseDatosUtilidades.php';
			echo 'Bienvenido a la página de la TIENDA';

			$_SESSION['instante']   = time();

			echo '<h1>¿QUÉ QUIERES?</h1><br>';

			echo '<a href="AccesoClientes.php">ACCEDER COMO USUARIO A TIENDA</a><br><br><br><br>';

			echo '<a href="AccesoRegistro.php">REGISTRARTE COMO USUARIO A TIENDA</a><br><br><br><br>';

			//Para poner el dia y la hora
			$hoy = date("20y-m-d");
			echo "Día de hoy: ".$hoy."<br>";
			$hoyHora = date("h:i"); 
			echo "Hora de hoy: ".$hoyHora."<br>";

		?>
	</div>
</body>
</html>