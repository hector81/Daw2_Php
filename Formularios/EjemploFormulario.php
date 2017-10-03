<html>
	<head>
		<title>Formulario web</title>
	</head>
	<body> 
		<!-- Esto envía 3 archivos en el action
		<form name="input" action="procPost/Get/Requ.php" method="post">-->
		<form name="input" action="procPost/Get/Requ.php" method="post">
		Nombre del alumno: <input type="text" name="nombre"><br>
		<p>Modulo que cursa</p>
		<input type="checkbox" name="modulos[]" value="DWES"><!-- modulo []siginifica que es la misma variable-->
			Desarrollo web en entorno servidor<br>
		<input type="checkbox" name="modulos[]" value="DWEC">
			Desarrollo web en entorno cliente<br>
		<input type="submit" value="Enviar">
		</form>
	</body>
</html>