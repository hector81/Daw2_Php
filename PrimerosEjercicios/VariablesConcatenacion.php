<html>
	<head>
		<title>echo implicito</title>
	</head>
	<body>
		<p>
		
		</p>
		<?php
			$var1 = "Hola";
			$var2 = "Mundo";
			$var3 = $var1.$var2;
			$var4 = "Hola"." Mundo";
			echo $var3;
			echo $var4;
		?>
	</body>
</html>