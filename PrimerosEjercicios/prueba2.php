<html>
	<?$variableResultado="algo";
	?>
	<head>
		<title>echo implicito</title>
	</head>
	<body>
		<p>
			<?$variableResultado;  ?>
			"Esto va a\   
			salir todo junto
		</p>
		<?php
			echo "Esto \"va \\ a\n", "salir";
		?>
	</body>
</html>