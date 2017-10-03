<html>
	<head>
		<title>Otro tipo de comillas</title>
	</head>
	<body>
		<p>
		
		</p>
		<?php
			// heredoc " //para varaibles qje se expamdan
			// nowdoc '  //lo contrario
			
			// http://php.net/manual/es/language.types.string.php
			// https://tech.enekochan.com/es/2013/08/29/nowdoc-y-heredoc-en-php/
			
			//el final tiene que ir siempre en la misma columna
			
			// no hay problema con la columna de comienzo ni del heredoc nowdoc
			// pero si con la primera
			
			// <<<"Nombre";
			// <<<'Nombre';
			
			// se usa para poner mucho texto seguido
			$hola = <<<EOD
HOLA HOLA
HOLA
EOD;

echo $hola;  //ultima columan
			
			
			
		?>
	</body>
</html>