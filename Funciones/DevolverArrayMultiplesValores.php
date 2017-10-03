<html>
	<head>
		<title>Devolver un array de multiples valores para asignarlos</title>
	</head>
	<body>
		<?php
			function números_pequeños(){
				return array (0, 1, 2);
			}
			list ($cero, $uno, $dos) = números_pequeños();
		?>
	</body>
</html>