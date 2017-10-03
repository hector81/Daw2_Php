<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php
			//predeterminado, no usar los valores en llamadas 	//http://php.net/manual/es/functions.arguments.php
			 
			function hacerCafé($var = ["capuccino"], $fabricanteCafe = NULL){
				$aparato = is_null($fabricanteCafe)?" las manos":$fabricanteCafe;
				return "Hacer una taza de " .join(" . ",$var)." con $aparato.\n";			
			}
			echo hacerCafé();
			echo hacerCafé(array["capuchino","lavazza"], "una tetera");
			
			//Ejemplo #5 Uso incorrecto de argumentos predeterminados en una función
			//Tipificación estricta ¶
			//Ejemplo #10 Tipificación estricta
			//Listas de argumentos de longitud variable  //LO PRIMERO HAY QUE PREGUNTAR POR EL ARGUMENTO
			//Argumentos variables
			//devolucionvaariables //http://php.net/manual/es/functions.returning-values.php
			
			//Declaraciones de tipo de devolución ¶
			//rehcaer ejercicios con funciones
			//excepciones y orientados a objetos
		?>
	</body>
</html>

