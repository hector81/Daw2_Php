<!-- 2. Diseñar un formulario web que pida la altura y el diámetro de un cilindro en metros. Una
vez el usuario introduzca los datos y pulse el botón calcular, deberá calcularse el volumen
del cilindro y mostrarse el resultado en el navegador. 

tipo numerico
campo requerido

expresiones regulares
formato fechas contraseñas,nif
http://php.net/manual/es/reference.pcre.pattern.syntax.php

funciones de cadena
http://www.aprenderaprogramar.es/index.php?option=com_content&view=article&id=574:funciones-cadenas-php-strreplace-strtolower-countchars-strpos-trim-strrepeat-strstr-chr-cu00828b&catid=70:tutorial-basico-programador-web-php-desde-cero&Itemid=193

11.25-0.5/15 ..... 11 bien 1 0.25 , 1vacia 3 mal
-->		
<html>
	<head>
		<title>Formulario web que pida la altura y el diámetro de un cilindro en metros para calcular el volumen</title>
	</head>
		<?php
			const PI = 3.141597; //HAY UNA FUNCION pi() QUE DARIA LO MISMO
			
			$var = (isset($_POST['var']))?$_POST['var']:null;
			$alturaCilindro = (isset($var['alturaCilindro']))?$var['alturaCilindro']:'';//si esta establecido lo paso sino lo pongo '' vacio   
			$diametroCilindro = (isset($var['diametroCilindro']))?$var['diametroCilindro']:'';  //probar empty
			$enviado = (isset($_POST['Aceptar']))?true:false; //si esta estabelcido el aceptar
			//esto es para comprobar los datos
			$correcto ;
			if(empty($diametroCilindro) || empty($alturaCilindro)){//si esta vacio el campo
				$correcto =false;				
			}else{
				$correcto =true;
			}	
		?>
	<body> 
	
	<?php
	//respuesta, es el unico momento en el que no todo el codigo es visible
		if($correcto && $enviado){ 
		//a partir de aqui empieza a imprimir el html de la respuesta del servidor
		echo "Resultado";
	?>
			
		<p>Volumen del cilindro de radio <?= $diametroCilindro/2 ?> y altura <?= $alturaCilindro ?></p>
		<?= pow($diametroCilindro/2,2)*$alturaCilindro ?><br>
		
	<?php
		echo var_dump($diametroCilindro)."<br>\n".var_dump($alturaCilindro);
		//este else significa que todo se ejecutara en el servidor
		}else
		{
		
	?>
		<form name="input" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
		Altura del cilindro: <input type="text" value="<?= $alturaCilindro?>" name="var[alturaCilindro]"><br>
		
		<?php
			if(isset($enviado) && empty($alturaCilindro))
				echo "es un campo obligatorio";
			
			
		?>
		<br>
		Diametro del cilindro: <input type="text" value="<?= $diametroCilindro?>" name="var[diametroCilindro]"><br>
		
		<?php
			if(isset($enviado) && empty($diametroCilindro))
				echo "es un campo obligatorio";
		?>
		<br>
		<input type="submit" name="Aceptar" value="ok">
		</form>
		
	<?php
		//etiqueta de cierre del servidor
		}
	?>
		
	</body>
</html>