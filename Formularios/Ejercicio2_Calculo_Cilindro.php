<!-- 2. Diseñar un formulario web que pida la altura y el diámetro de un cilindro en metros. Una
vez el usuario introduzca los datos y pulse el botón calcular, deberá calcularse el volumen
del cilindro y mostrarse el resultado en el navegador. -->
<html>
	<head>
		<title>Procesamiento de los datos del formulario GET. Números</title>
		<?php
			const PI = 3.141597; //HAY UNA FUNCION pi() QUE DARIA LO MISMO
		?>
	</head>
	<body> 
		<?php
			var = (isset($_POST['var']))?$_POST['var']:null;
			$alturaCilindro = (isset($var['alturaCilindro']))?$var['alturaCilindro']:'';
			$diametroCilindro = (isset($var['diametroCilindro']))?$var['diametroCilindro']:'';
			//calculamos volumen = PI*RADIO AL CUADRADO*ALTURA, EL RADIO ES LA MITAD DEL DIAMETRO
			$volumenCilindro = (float)(PI*(($diametroCilindro/2)*($diametroCilindro/2))*$alturaCilindro);//usar pow
			
			echo "Altura del cilindro: : ".$alturaCilindro."<br>";
			echo "Diametro del cilindro: ".$diametroCilindro."<br>";

			echo "El volumen del cilindro es ".$volumenCilindro. "<br>";
	
			echo var_dump($alturaCilindro). " ".var_dump($diametroCilindro) ;
			print_r($_POST);
		?>
	</body>
</html>