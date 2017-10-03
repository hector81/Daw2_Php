<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php
			//SOLO FUNCIONA EN PHP 7
			declare(strict_types=1);
			//funcion
			function sum(int $a, int $b) {
				return $a + $b;
			}

			var_dump(sum(1, 2));
			var_dump(sum(1.5, 2.5));
		?>
	</body>
</html>

