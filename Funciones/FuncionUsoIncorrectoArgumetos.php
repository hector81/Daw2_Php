<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php
			function hacer_yogur($tipo = "acidófilo", $sabor){
				return "Hacer un tazón de yogur $tipo de $sabor.\n";
			}

			echo hacer_yogur("frambuesa");   // no funcionará como se esperaba
		?>
	</body>
</html>