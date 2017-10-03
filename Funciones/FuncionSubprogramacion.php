<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php
			//funciones subprogramacion que devuelven un valor
			//function nombre($var1){
				
				
			//}
			//por referencia
			
			$cad = 'Esto es una cadena.';
			anadir_algo($cad);
			echo $cad; //imprime "esto es una cadena, y algo mas"
			//no es necesario que este definida antes
			function anadir_algo(&$cadena){
				$cadena .= ',y algo más. '; //el punto de agregacion
				
			}
		?>
	</body>
</html>