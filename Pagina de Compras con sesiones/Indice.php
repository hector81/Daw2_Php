<?php
// Indice.php

session_start();

echo 'Bienvenido a la página de la TIENDA PRUEBA';

$_SESSION['instante']   = time();

// Funciona si la cookie de sesión fue aceptada
echo '<h1>¿QUÉ QUIERES?</h1><br>';
echo '<a href="AccesoClientes.php">ACCEDER COMO USUARIO A TIENDA</a><br><br><br><br>';
echo '<a href="FormularioAltaClientes.php">DARTE DE ALTA COMO USUARIO</a><br><br><br><br>';
echo '<a href="AccesoAdministrador.php">ACCEDER COMO ADMINISTRADOR DE LA TIENDA</a><br><br><br><br>';

//Para poner el dia y la hora
$hoy = date("20y-m-d");
echo "Día de hoy: ".$hoy."<br>";
$hoyHora = date("h:i"); 
echo "Hora de hoy: ".$hoyHora."<br>";

?>
<html>
	<head>
		<title>Acceso indice</title>
	</head>
<body> 

</body>
</html>