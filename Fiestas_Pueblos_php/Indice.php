<?php
// Indice.php

session_start();

echo 'Bienvenido a la página de la FIESTAS';

$_SESSION['instante']   = time();

// Funciona si la cookie de sesión fue aceptada
echo '<h1>¿QUÉ QUIERES?</h1><br>';
echo '<a href="ActividadIntroduce.php">Introducir Actividad</a><br><br><br><br>';
echo '<a href="AutoridadIntroduce.php">Introducir Autoridad</a><br><br><br><br>';
echo '<a href="ConcejaliaIntroduce.php">Introducir Concejalia</a><br><br><br><br>';
echo '<a href="EventoIntroduce.php">Introducir Evento</a><br><br><br><br>';
echo '<a href="ParticipanteIntroduce.php">Introducir Participante</a><br><br><br><br>';
echo '<a href="PatrocinadorIntroduce.php">Introducir Patrocinador</a><br><br><br><br>';
echo '<a href="RecorrerTablas.php">Comprobar datos de la tabla</a><br><br><br><br>';

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