<!-- 1- Diseñar un formulario html que solicite dos números enteros. Una vez introducidos los
números y enviado el formulario, el código php de la página que recibe los datos del mismo
mostrará la suma, resta, multiplicación, división (entera y real) y resto de los números. -->
<html>
	<head>
		<title>Formulario que te pide dos números para sumar ,restar, multiplicar , dividir y el resto</title>
	</head>
	<?php
			$var = (isset($_POST['var']))?$_POST['var']:null;//comprueba primero la ejecucion y leugo el tipo
			$numero1 = (isset($var['numero1']))?$var['numero1']:'';//si esta establecido lo paso sino lo pongo '' vacio 
			$numero2 = (isset($var['numero2']))?$var['numero2']:'';
			$enviado = (isset($_POST['Aceptar']))?true:false;
			//esto es para comprobar los datos enviados que no esten vacios
			$correcto ;
			if(empty($numero1) || empty($numero2)){
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
		echo "Resultados: ";
	?>
			
		<p>Numero 1:  <?= $numero1 ?> y Numero 2: <?= $numero2 ?></p>
		Suma <?= $numero1+$numero2 ?><br>
		Resta <?= $numero1-$numero2 ?><br>
		Multiplicación <?= $numero1*$numero2 ?><br>
		División <?= $numero1/$numero2 ?><br>
		Resto <?= $numero1%$numero2 ?><br>
	
		
	<?php
		echo var_dump($numero1)."<br>\n".var_dump($numero2);
		//este else significa que todo se ejecutara en el servidor
		}else
		{
		
	?>
	
		<form name="input" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
		Número 1: <input type="text" value="<?= $numero1?>" name="var[numero1]"><br>
		
	<!-- Comprueba que el numero este enviado y no este vacio -->
	<?php
		if(isset($enviado) && empty($numero1))
			echo "es un campo obligatorio";		
	?>
		<br>
		Número 2: <input type="text" value="<?= $numero2?>" name="var[numero2]"><br>
	
	<!-- Comprueba que el numero este enviado y no este vacio -->
	<?php
		if(isset($enviado) && empty($numero2))
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
