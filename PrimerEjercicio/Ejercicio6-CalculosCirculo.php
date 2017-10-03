<!-- 6.- Define una constante PI con el valor 3,141597. Muestra en el navegador cliente
información sobre el área del círculo, longitud del círculo, longitud de un segmento circular,
área de un segmento circular y área de un sector circular. Para realizar este ejercicio define
todas las variables que necesites. -->
<html>
	<head>
		<title>Ejercicio 6: Calcular calculos circulos</title>
	</head>
	<body>
		<p>
		
		</p>
		<?php
			$varPI = 3.141597;
			$varRadio = 4;
			$varDiametro = $varRadio*2;
			$varAreaCirculo = $varPI*$varRadio*$varRadio; //area = pi * r * r
			$varLongitudCirculo = $varPI*$varDiametro; //area = diametro * pi
			
			$varAnguloCentral = 60;
			
			$varLongitudSegmentoCircular = 17;
			
			$varAreaSectorCircular  = 17;
			echo 'valor de PI '.$varPI."\n"."<br>";
			echo 'valor de radio del circulo '.$varRadio."\n"."<br>";
			echo 'valor de diametro de circulo '.$varDiametro."\n"."<br>";
			echo 'valor de area de circulo '.$varAreaCirculo."\n"."<br>";
			echo 'valor de longitud de circulo '.$varLongitudCirculo."\n"."<br>";
			
			echo 'valor de Angulo central de circulo '.$varAnguloCentral."\n"."<br>";
			$varAreaSectorCircular = ($varPI*$varRadio*$varRadio*$varAnguloCentral)/360;
			$varAreaSectorCircular;
			$varH = sqrt($varRadio*$varRadio*2*2);//raiz cuadrada
			
			$varAreaTriangulo = ($varH*$varRadio)/2;
			
			$varAreaSegmentoCircular  = $varAreaSectorCircular - $varAreaTriangulo ;
			
			echo 'valor de varH (VARIABLE NECESARIA)'.$varH."\n"."<br>";
			echo 'valor de $varAreaTriangulo '.$varAreaTriangulo."\n"."<br>";
			echo 'valor de Longitud Segmento Circular '.$varLongitudSegmentoCircular."\n"."<br>";
			echo 'valor de area Segmento Circular '.$varAreaSegmentoCircular."\n"."<br>";
			echo 'valor de area sector Circular '.$varAreaSectorCircular."\n"."<br>";
		?>
	</body>
</html>