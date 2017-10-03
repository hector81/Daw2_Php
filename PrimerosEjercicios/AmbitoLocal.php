<html>
	<head>
		<title>echo implicito</title>
	</head>
	<body>
		<p>
		
		</p>
		<?php
			$var1 = 5 ;
			//el tema del local solo funciona en las funcioens
			function duplicar(){
				global $var1;// el termino global solo funciona dentro de funciones // si quiero que sea visto desde fuera debo hacerlo global desde dentro
				global $temp;//necesario para que de abajo
				$temp = $var1 * 2;//var aqui es local//se soluciona haciendolo global en lafuncion
				echo "resultado $temp ";//lo dedlara dentro de la funcion
				
			}	
			duplicar();//llamaoms a  ala funcion
			echo "El valor de la variable \$temp es :".$temp;			
			
		?>
	</body>
</html>