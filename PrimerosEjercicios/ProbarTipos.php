<html>
	<head>
		<title>Probar tipos</title>
	</head>
	<body>
		<p>
		
		</p>
		<?php
			//gettype
			$var1 = true;
			echo gettype($var1);
			//var_dump
			$var2 = true;
			echo var_dump($var2);
			//gettype //para averiguar el tipo de dato
			$var3 = 3.8;
			echo gettype($var3);
			//var_dump //se usa para depuraciones
			$var4 = 3.8;
			echo var_dump($var4);
			//gettype
			$var5 = "hola";
			echo gettype($var5);
			//var_dump
			$var6 = "hola";
			echo var_dump($var6);
		?>
	</body>
</html>