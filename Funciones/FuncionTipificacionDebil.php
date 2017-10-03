<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php
			function sum(int $a, int $b) {
				return $a + $b;
			}

			var_dump(sum(1, 2));

			// Estos números serán forzados a ser enteros: ¡observe la salida de abajo!
			var_dump(sum(1.5, 2.5));
		?>
	</body>
</html>