<html>
	<head>
		<title>Crear Array</title>
	</head>
	<body>
		<?php
			for ($i = 0; $i < 10; $i++) {
				$myArray[$i] = ($i+1)."<br>";
				echo $myArray[$i];
			}

		?>
	</body>
</html>