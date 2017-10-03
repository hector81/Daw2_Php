<!-- 3. Diseñar un formulario web simple que solicite al usuario el precio de tres productos en tres
establecimientos distintos denominados Tienda 1, Tienda 2 y Tienda 3. Una vez
enviada esta información se debe calcular y mostrar el precio medio del producto. -->
<html>
	<head>
		<title>Procesamiento de los datos del formulario GET. Números</title>
	</head>
	<?php
			$var = (isset($_POST['var']))?$_POST['var']:null;//comprueba primero la ejecucion y leugo el tipo
			//variables var
			$naranjas_Tienda1 = (isset($var['naranjas_Tienda1']))?$var['naranjas_Tienda1']:'';//si esta establecido lo paso sino lo pongo '' vacio 
			$patatas_Tienda1 = (isset($var['patatas_Tienda1']))?$var['patatas_Tienda1']:'';//si esta establecido lo paso sino lo pongo '' vacio
			$tomates_Tienda1 = (isset($var['tomates_Tienda1']))?$var['tomates_Tienda1']:'';//si esta establecido lo paso sino lo pongo '' vacio 
			$naranjas_Tienda2 = (isset($var['naranjas_Tienda2']))?$var['naranjas_Tienda2']:'';//si esta establecido lo paso sino lo pongo '' vacio
			$patatas_Tienda2 = (isset($var['patatas_Tienda2']))?$var['patatas_Tienda2']:'';//si esta establecido lo paso sino lo pongo '' vacio 
			$tomates_Tienda2 = (isset($var['tomates_Tienda2']))?$var['tomates_Tienda2']:'';//si esta establecido lo paso sino lo pongo '' vacio
			$naranjas_Tienda3 = (isset($var['naranjas_Tienda3']))?$var['naranjas_Tienda3']:'';//si esta establecido lo paso sino lo pongo '' vacio 
			$patatas_Tienda3 = (isset($var['patatas_Tienda3']))?$var['patatas_Tienda3']:'';//si esta establecido lo paso sino lo pongo '' vacio
			$tomates_Tienda3 = (isset($var['tomates_Tienda3']))?$var['tomates_Tienda3']:'';//si esta establecido lo paso sino lo pongo '' vacio 

			//si esta estabelcido el aceptar
			$enviado = (isset($_POST['Aceptar']))?true:false;
			//esto es para comprobar los datos enviados que no esten vacios
			$correcto = false ;
			if(empty($naranjas_Tienda1) || empty($naranjas_Tienda2) || empty($naranjas_Tienda3) || empty($patatas_Tienda1) || empty($patatas_Tienda2) || empty($patatas_Tienda3) 
				|| empty($tomates_Tienda1) || empty($tomates_Tienda2) || empty($tomates_Tienda3) ){
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
	
		<p>Tienda 1 , precio naranjas  <?= $naranjas_Tienda1 ?> precio patatas  <?= $patatas_Tienda1 ?> y precio tomates<?= $tomates_Tienda1 ?></p><br>
		<p>Tienda 2 , precio naranjas  <?= $naranjas_Tienda2 ?> precio patatas  <?= $patatas_Tienda2 ?> y precio tomates<?= $tomates_Tienda2 ?></p><br>
		<p>Tienda 3 , precio naranjas  <?= $naranjas_Tienda3 ?> precio patatas  <?= $patatas_Tienda3 ?> y precio tomates<?= $tomates_Tienda3 ?></p><br>
			Precio medio naranjas <?= ($naranjas_Tienda1+$naranjas_Tienda2+$naranjas_Tienda3)/3 ?><br>
			Precio medio patatas <?= ($patatas_Tienda1+$patatas_Tienda2+$patatas_Tienda3)/3 ?><br>
			Precio medio tomates <?= ($tomates_Tienda1+$tomates_Tienda2+$tomates_Tienda3)/3 ?><br><br>

	
		
	<?php
		echo var_dump($naranjas_Tienda1)." ".var_dump($patatas_Tienda1)." ".var_dump($tomates_Tienda1)."<br>\n";
		echo var_dump($naranjas_Tienda2)." ".var_dump($patatas_Tienda2)." ".var_dump($tomates_Tienda2)."<br>\n";
		echo var_dump($naranjas_Tienda3)." ".var_dump($patatas_Tienda3)." ".var_dump($tomates_Tienda3)."<br>\n";
		//este else significa que todo se ejecutara en el servidor
		}else
		{
		
	?>
	
		<form name="input" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
		<h1>Tienda 1</h1>
		Precio naranjas el kg: <input type="text" value="<?= $naranjas_Tienda1?>" name="var[naranjas_Tienda1]">
		<!-- Comprueba que el numero este enviado y no este vacio -->
		<?php
			if(isset($enviado) && empty($naranjas_Tienda1))
				echo "es un campo obligatorio";		
		?>
		Precio patatas el kg: <input type="text" value="<?= $patatas_Tienda1?>" name="var[patatas_Tienda1]">
		<!-- Comprueba que el numero este enviado y no este vacio -->
		<?php
			if(isset($enviado) && empty($patatas_Tienda1))
				echo "es un campo obligatorio";		
		?>
		Precio tomates el kg: <input type="text" value="<?= $tomates_Tienda1?>" name="var[tomates_Tienda1]">
		<!-- Comprueba que el numero este enviado y no este vacio -->
		<?php
			if(isset($enviado) && empty($tomates_Tienda1))
				echo "es un campo obligatorio";		
		?>

		<br><h1>Tienda 2</h1>
		Precio naranjas el kg: <input type="text" value="<?= $naranjas_Tienda2?>" name="var[naranjas_Tienda2]">
		<!-- Comprueba que el numero este enviado y no este vacio -->
		<?php
			if(isset($enviado) && empty($naranjas_Tienda2))
				echo "es un campo obligatorio";		
		?>
		Precio patatas el kg: <input type="text" value="<?= $patatas_Tienda2?>" name="var[patatas_Tienda2]">
		<!-- Comprueba que el numero este enviado y no este vacio -->
		<?php
			if(isset($enviado) && empty($patatas_Tienda2))
				echo "es un campo obligatorio";		
		?>
		Precio tomates el kg: <input type="text" value="<?= $tomates_Tienda2?>" name="var[tomates_Tienda2]">
		<!-- Comprueba que el numero este enviado y no este vacio -->
		<?php
			if(isset($enviado) && empty($tomates_Tienda2))
				echo "es un campo obligatorio";		
		?>
		<br><h1>Tienda 3</h1>
		Precio naranjas el kg: <input type="text" value="<?= $naranjas_Tienda3?>" name="var[naranjas_Tienda3]">
		<!-- Comprueba que el numero este enviado y no este vacio -->
		<?php
			if(isset($enviado) && empty($naranjas_Tienda3))
				echo "es un campo obligatorio";		
		?>
		Precio patatas el kg: <input type="text" value="<?= $patatas_Tienda3?>" name="var[patatas_Tienda3]">
		<!-- Comprueba que el numero este enviado y no este vacio -->
		<?php
			if(isset($enviado) && empty($patatas_Tienda3))
				echo "es un campo obligatorio";		
		?>
		Precio tomates el kg: <input type="text" value="<?= $tomates_Tienda3?>" name="var[tomates_Tienda3]">
		<!-- Comprueba que el numero este enviado y no este vacio -->
		<?php
			if(isset($enviado) && empty($tomates_Tienda3))
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