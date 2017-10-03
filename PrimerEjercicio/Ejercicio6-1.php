<!-- 6.- Define una constante PI con el valor 3,141597. Muestra en el navegador cliente
información sobre el área del círculo, longitud del círculo, longitud de un segmento circular,
área de un segmento circular y área de un sector circular. Para realizar este ejercicio define
todas las variables que necesites. -->
<html>
	<head>
		<title>Ejercicio 6: CONSTANTES</title>
		<?php
			const PI = 3.141597;//LAS CONSTANTES NO PUEDEN UTILIZAR EL SIMBOLO $ DOLAR DE LAS VARIABLES
		?>
	</head>
	<body>
		<p>
		
		</p>
		<?php
			$varRadio = 1;
			function devolverCalculos($varRadio){
				//AQUI TAMPOCO SE USARIA EL SIMBOLO $ DOLAR DE LAS VARIABLES EN PI. COMO ES CONSTANTE NO HACE FALTA PONERLA EN PARAMETROS FUNCION
				$varAreaCirculo = PI*$varRadio*$varRadio; //area = pi * r * r
				$varSuperficie = 2*PI*$varRadio;// superficie = pi*2*r
				echo "El area del circulo del radio 1 es: ".$varAreaCirculo."\n"."<br>";
				echo "La superficie del circulo del radio 1 es: ".$varSuperficie."\n"."<br>";
			}
			
			echo devolverCalculos($varRadio, PI)."\n"."<br>";
		?>
	</body>
</html>