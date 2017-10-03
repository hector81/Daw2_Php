<?php
	$pizzas = ['Margarita','Barbacoa','4 estaciones','4 quesos','Carbonara','Romana','Mediterranea'];
	$precioExtras = [
		'Queso' => 0.5,
		'Pimiento' =>1,
		'Cebolla' =>1,
		'Jamon' =>1.5,
		'Pollo' =>1];
	$nombreTamanos = ['normal','grande','familiar'];

	$precioPizzas = [
		$margarita = [3,7,9],
		$barbacoa = [4,7,8],
		$estaciones = [3,7,8],
		$quesos = [3,5,8],
		$carbonara = [3,7,8],
		$romana = [4,7,9],
		$mediterranea = [4,7,9]
	];

	$unidades = (isset($_POST['unidades']))?$_POST['unidades']:null;
	$tamanos = (isset($_POST['tamanos']))?$_POST['tamanos']:null;
	$masas = (isset($_POST['masas']))?$_POST['masas']:null;
	$extrasMargarita = (isset($_POST['extrasMargarita']))?$_POST['extrasMargarita']:null;
	$extrasBarbacoa = (isset($_POST['extrasBarbacoa']))?$_POST['extrasBarbacoa']:null;
	$extras4estaciones = (isset($_POST['extras4estaciones']))?$_POST['extras4estaciones']:null;
	$extras4quesos = (isset($_POST['extras4quesos']))?$_POST['extras4quesos']:null;
	$extrasCarbonara = (isset($_POST['extrasCarbonara']))?$_POST['extrasCarbonara']:null;
	$extrasRomana = (isset($_POST['extrasRomana']))?$_POST['extrasRomana']:null;
	$extrasMediterranea = (isset($_POST['extrasMediterranea']))?$_POST['extrasMediterranea']:null;
	$extras = [$extrasMargarita,
			   $extrasBarbacoa,
			   $extras4estaciones,
			   $extras4quesos,
			   $extrasCarbonara,
			   $extrasRomana,
			   $extrasMediterranea];

	$enviado = (isset($_POST['enviado']))?true:false;
	$confirmado = (isset($_POST['confirmar']))?true:false;
	$cancelado = (isset($_POST['cancelar']))?true:false;
	$nombre = (isset($_POST['nombre']))?$_POST['nombre']:'';
	$direccion = (isset($_POST['direccion']))?$_POST['direccion']:'';
	$email = (isset($_POST['email']))?$_POST['email']:'';

?>

<html>
<head><title>Formulario 4</title></head>
<body>

	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
		<h1>Datos personales</h1><hr>
		<p>
			<label for="nombre">Nombre:</label> <input type="text" name="nombre" value="<?= $nombre ?>">
				<?php
					if($enviado && empty($nombre)){
						echo "Es un campo obligatorio";
					}
				?>
			<br>
			<label for="direccion"> Direccion:</label> <input type="text" name="direccion" value="<?= $direccion ?>">
			<?php
					if($enviado && empty($direccion)){
						echo "Es un campo obligatorio";
					}
				?>
			<br>
			<label for="email">E-mail: </label><input type="email" name="email" value="<?= $email ?>">
			<?php
					if($enviado && empty($email)){
						echo "Es un campo obligatorio";
					}
				?>
			<br>
		</p>
		<h1>Datos de la pizza</h1><hr>
		<p>
			Introduce la cantidad de cada pizza<br>
			<!--MARGARITA-->
			<label for="numMargarita">Margarita:</label> <input type="number" name="unidades[]" size="2" value="<?= $unidades[0] ?>" > 
			
			<label for="tamañosMargarita">Tamaño:</label> 
			<select id="tamaños" name="tamanos[]">
                    <option value="0" <?php
							if(!is_null($tamanos)){
								$valor = $tamanos[0];
								if($valor == 0){
									echo "selected";
								}
							}
							?>>Normal: 3€</option>
					<option value="1" <?php
							if(!is_null($tamanos)){
								$valor = $tamanos[0];
								if($valor == 1){
									echo "selected";
								}
							}
							?>>Grande: 7€</option>
					<option value="2" <?php
							if(!is_null($tamanos)){
								$valor = $tamanos[0];
								if($valor == 2){
									echo "selected";
								}
							}
							?>>Familiar: 9€</option>
                </select>
			
			<label for="masaMargarita">Masa:</label> 
			<select id="masas" name="masas[]">
                    <option value="fina" <?php
							if(!is_null($masas)){
								$valor = $masas[0];
								if($valor == 'fina'){
									echo "selected";
								}
							}
							?>>Fina</option>
					<option value="normal" <?php
							if(!is_null($masas)){
								$valor = $masas[0];
								if($valor == 'normal'){
									echo "selected";
								}
							}
							?>>Normal</option>
                </select>
			
			Extras:
			<input type="checkbox" name="extrasMargarita[]" value="Queso" <?php
					if($enviado){
						if(!is_null($extrasMargarita))
						foreach($extrasMargarita as $extra => $valor){
							if($valor == 'Queso'){
								echo "checked"; 
								break;
							}
						}
					}
					?>>Queso: 0.5€
			<input type="checkbox" name="extrasMargarita[]" value="Pimiento" <?php
					if($enviado){
						if(!is_null($extrasMargarita))
						foreach($extrasMargarita as $extra => $valor){
							if($valor == 'Pimiento'){
								echo "checked"; 
								break;
							}
						}
					}
					?>>Pimiento: 1€
			<input type="checkbox" name="extrasMargarita[]" value="Cebolla" <?php
					if($enviado){
						if(!is_null($extrasMargarita))
						foreach($extrasMargarita as $extra => $valor){
							if($valor == 'Cebolla'){
								echo "checked"; 
								break;
							}
						}
					}
					?>>Cebolla: 1€
			<input type="checkbox" name="extrasMargarita[]" value="Jamon" <?php
					if($enviado){
						if(!is_null($extrasMargarita))
						foreach($extrasMargarita as $extra => $valor){
							if($valor == 'Jamon'){
								echo "checked"; 
								break;
							}
						}
					}
					?>>Jamon: 1.5€
			<input type="checkbox" name="extrasMargarita[]" value="Pollo" <?php
					if($enviado){
						if(!is_null($extrasMargarita))
						foreach($extrasMargarita as $extra => $valor){
							if($valor == 'Pollo'){
								echo "checked"; 
								break;
							}
						}
					}
					?>>Pollo: 1€
			
			<br>
			
			<!--BARBACOA-->
			<label for="numBarbacoa">Barbacoa:</label> <input type="number" name="unidades[]" size="2" value="<?= $unidades[1] ?>">
			
			<label for="tamañosBarbacoa">Tamaño:</label> 
			<select id="tamaños" name="tamanos[]">
                    <option value="0" <?php
							if(!is_null($tamanos)){
								$valor = $tamanos[1];
								if($valor == 0){
									echo "selected";
								}
							}
							?>>Normal:4€</option>
					<option value="1" <?php
							if(!is_null($tamanos)){
								$valor = $tamanos[1];
								if($valor == 1){
									echo "selected";
								}
							}
							?>>Grande:7€</option>
					<option value="2" <?php
							if(!is_null($tamanos)){
								$valor = $tamanos[1];
								if($valor == 2){
									echo "selected";
								}
							}
							?>>Familiar:8€</option>
                </select>
			
			<label for="masaBarbacoa">Masa:</label> 
			<select id="masas" name="masas[]">
                    <option value="fina" <?php
							if(!is_null($masas)){
								$valor = $masas[1];
								if($valor == 'fina'){
									echo "selected";
								}
							}
							?>>Fina</option>
					<option value="normal" <?php
							if(!is_null($masas)){
								$valor = $masas[1];
								if($valor == 'normal'){
									echo "selected";
								}
							}
							?>>Normal</option>
                </select>
			
			Extras:
			<input type="checkbox" name="extrasBarbacoa[]" value="Queso" <?php
					if($enviado){
						if(!is_null($extrasBarbacoa))
						foreach($extrasBarbacoa as $extra => $valor){
							if($valor == 'Queso'){
								echo "checked"; 
								break;
							}
						}
					}
					?>>Queso: 0.5€
			<input type="checkbox" name="extrasBarbacoa[]" value="Pimiento" <?php
					if($enviado){
						if(!is_null($extrasBarbacoa))
						foreach($extrasBarbacoa as $extra => $valor){
							if($valor == 'Pimiento'){
								echo "checked"; 
								break;
							}
						}
					}
					?>>Pimiento: 1€
			<input type="checkbox" name="extrasBarbacoa[]" value="Cebolla" <?php
					if($enviado){
						if(!is_null($extrasBarbacoa))
						foreach($extrasBarbacoa as $extra => $valor){
							if($valor == 'Cebolla'){
								echo "checked"; 
								break;
							}
						}
					}
					?>>Cebolla: 1€
			<input type="checkbox" name="extrasBarbacoa[]" value="Jamon" <?php
					if($enviado){
						if(!is_null($extrasBarbacoa))
						foreach($extrasBarbacoa as $extra => $valor){
							if($valor == 'Jamon'){
								echo "checked"; 
								break;
							}
						}
					}
					?>>Jamon: 1.5€
			<input type="checkbox" name="extrasBarbacoa[]" value="Pollo" <?php
					if($enviado){
						if(!is_null($extrasBarbacoa))
						foreach($extrasBarbacoa as $extra => $valor){
							if($valor == 'Pollo'){
								echo "checked"; 
								break;
							}
						}
					}
					?>>Pollo: 1€
			<br>
			
			<!--4 ESTACIONES-->
			<label for="num4estaciones">4 estaciones:</label> <input type="number" name="unidades[]" size="2" value="<?= $unidades[2] ?>">
			
			<label for="tamaños4estaciones">Tamaño:</label>
			<select id="tamaños" name="tamanos[]">
                    <option value="0" <?php
							if(!is_null($tamanos)){
								$valor = $tamanos[2];
								if($valor == 0){
									echo "selected";
								}
							}
							?>>Normal: 3€</option>
					<option value="1" <?php
							if(!is_null($tamanos)){
								$valor = $tamanos[2];
								if($valor == 1){
									echo "selected";
								}
							}
							?>>Grande: 7€</option>
					<option value="2" <?php
							if(!is_null($tamanos)){
								$valor = $tamanos[2];
								if($valor == 2){
									echo "selected";
								}
							}
							?>>Familia: 8€</option>
                </select>
			
			<label for="masa4estaciones">Masa:</label> 
			<select id="masas" name="masas[]">
                    <option value="fina" <?php
							if(!is_null($masas)){
								$valor = $masas[2];
								if($valor == 'fina'){
									echo "selected";
								}
							}
							?>>Fina</option>
					<option value="normal" <?php
							if(!is_null($masas)){
								$valor = $masas[2];
								if($valor == 'normal'){
									echo "selected";
								}
							}
							?>>Normal</option>
                </select>	
			
			Extras:
			<input type="checkbox" name="extras4estaciones[]" value="Queso" <?php
					if($enviado){
						if(!is_null($extras4estaciones))
						foreach($extras4estaciones as $extra => $valor){
							if($valor == 'Queso'){
								echo "checked"; 
								break;
							}
						}
					}
					?>>Queso: 0.5€
			<input type="checkbox" name="extras4estaciones[]" value="Pimiento" <?php
					if($enviado){
						if(!is_null($extras4estaciones))
						foreach($extras4estaciones as $extra => $valor){
							if($valor == 'Pimiento'){
								echo "checked"; 
								break;
							}
						}
					}
					?>>Pimiento: 1€
			<input type="checkbox" name="extras4estaciones[]" value="Cebolla" <?php
					if($enviado){
						if(!is_null($extras4estaciones))
						foreach($extras4estaciones as $extra => $valor){
							if($valor == 'Cebolla'){
								echo "checked"; 
								break;
							}
						}
					}
					?>>Cebolla: 1€
			<input type="checkbox" name="extras4estaciones[]" value="Jamon" <?php
					if($enviado){
						if(!is_null($extras4estaciones))
						foreach($extras4estaciones as $extra => $valor){
							if($valor == 'Jamon'){
								echo "checked"; 
								break;
							}
						}
					}
					?>>Jamon: 1.5€
			<input type="checkbox" name="extras4estaciones[]" value="Pollo" <?php
					if($enviado){
						if(!is_null($extras4estaciones))
						foreach($extras4estaciones as $extra => $valor){
							if($valor == 'Pollo'){
								echo "checked"; 
								break;
							}
						}
					}
					?>>Pollo: 1€
			<br>
			
			<!--4 QUESOS-->
			<label for="num4quesos">4 quesos:</label> <input type="number" name="unidades[]" size="2" value="<?= $unidades[3] ?>">
			
			<label for="tamaños4quesos">Tamaño:</label>
			
			<select id="tamaños" name="tamanos[]">
                    <option value="0" <?php
							if(!is_null($tamanos)){
								$valor = $tamanos[3];
								if($valor == 0){
									echo "selected";
								}
							}
							?>>Normal: 3€</option>
					<option value="1" <?php
							if(!is_null($tamanos)){
								$valor = $tamanos[3];
								if($valor == 1){
									echo "selected";
								}
							}
							?>>Grande: 5€</option>
					<option value="2" <?php
							if(!is_null($tamanos)){
								$valor = $tamanos[3];
								if($valor == 2){
									echo "selected";
								}
							}
							?>>Familiar: 8€</option>
                </select>
			
			<label for="masa4quesos">Masa:</label> 
			<select id="masas" name="masas[]">
                    <option value="fina" <?php
							if(!is_null($masas)){
								$valor = $masas[3];
								if($valor == 'fina'){
									echo "selected";
								}
							}
							?>>Fina</option>
					<option value="normal" <?php
							if(!is_null($masas)){
								$valor = $masas[3];
								if($valor == 'normal'){
									echo "selected";
								}
							}
							?>>Normal</option>
                </select>
			
			Extras:
			<input type="checkbox" name="extras4quesos[]" value="Queso" <?php
					if($enviado){
						if(!is_null($extras4quesos))
						foreach($extras4quesos as $extra => $valor){
							if($valor == 'Queso'){
								echo "checked"; 
								break;
							}
						}
					}
					?>>Queso: 0.5€
			<input type="checkbox" name="extras4quesos[]" value="Pimiento" <?php
					if($enviado){
						if(!is_null($extras4quesos))
						foreach($extras4quesos as $extra => $valor){
							if($valor == 'Pimiento'){
								echo "checked"; 
								break;
							}
						}
					}
					?>>Pimiento: 1€
			<input type="checkbox" name="extras4quesos[]" value="Cebolla" <?php
					if($enviado){
						if(!is_null($extras4quesos))
						foreach($extras4quesos as $extra => $valor){
							if($valor == 'Cebolla'){
								echo "checked"; 
								break;
							}
						}
					}
					?>>Cebolla: 1€
			<input type="checkbox" name="extras4quesos[]" value="Jamon" <?php
					if($enviado){
						if(!is_null($extras4quesos))
						foreach($extras4quesos as $extra => $valor){
							if($valor == 'Jamon'){
								echo "checked"; 
								break;
							}
						}
					}
					?>>Jamon: 1.5€
			<input type="checkbox" name="extras4quesos[]" value="Pollo" <?php
					if($enviado){
						if(!is_null($extras4quesos))
						foreach($extras4quesos as $extra => $valor){
							if($valor == 'Pollo'){
								echo "checked"; 
								break;
							}
						}
					}
					?>>Pollo: 1€
			<br>
			
			<!--CARBONARA-->
			<label for="numCarbonara">Carbonara:</label> <input type="number" name="unidades[]" size="2" value="<?= $unidades[4] ?>">
			
			<label for="tamañosCarbonara">Tamaño:</label>
			<select id="tamaños" name="tamanos[]">
                    <option value="0" <?php
							if(!is_null($tamanos)){
								$valor = $tamanos[4];
								if($valor == 0){
									echo "selected";
								}
							}
							?>>Normal: 3€</option>
					<option value="1" <?php
							if(!is_null($tamanos)){
								$valor = $tamanos[4];
								if($valor == 1){
									echo "selected";
								}
							}
							?>>Grande: 7€</option>
					<option value="2" <?php
							if(!is_null($tamanos)){
								$valor = $tamanos[4];
								if($valor == 2){
									echo "selected";
								}
							}
							?>>Familiar: 8€</option>
                </select>
			
			<label for="masaCarbonara">Masa:</label> 
			<select id="masas" name="masas[]">
                    <option value="fina" <?php
							if(!is_null($masas)){
								$valor = $masas[4];
								if($valor == 'fina'){
									echo "selected";
								}
							}
							?>>Fina</option>
					<option value="normal" <?php
							if(!is_null($masas)){
								$valor = $masas[4];
								if($valor == 'normal'){
									echo "selected";
								}
							}
							?>>Normal</option>
                </select>
			
			Extras:
			<input type="checkbox" name="extrasCarbonara[]" value="Queso" <?php
					if($enviado){
						if(!is_null($extrasCarbonara))
						foreach($extrasCarbonara as $extra => $valor){
							if($valor == 'Queso'){
								echo "checked"; 
								break;
							}
						}
					}
					?>>Queso: 0.5€
			<input type="checkbox" name="extrasCarbonara[]" value="Pimiento" <?php
					if($enviado){
						if(!is_null($extrasCarbonara))
						foreach($extrasCarbonara as $extra => $valor){
							if($valor == 'Pimiento'){
								echo "checked"; 
								break;
							}
						}
					}
					?>>Pimiento: 1€
			<input type="checkbox" name="extrasCarbonara[]" value="Cebolla" <?php
					if($enviado){
						if(!is_null($extrasCarbonara))
						foreach($extrasCarbonara as $extra => $valor){
							if($valor == 'Cebolla'){
								echo "checked"; 
								break;
							}
						}
					}
					?>>Cebolla: 1€
			<input type="checkbox" name="extrasCarbonara[]" value="Jamon" <?php
					if($enviado){
						if(!is_null($extrasCarbonara))
						foreach($extrasCarbonara as $extra => $valor){
							if($valor == 'Jamon'){
								echo "checked"; 
								break;
							}
						}
					}
					?>>Jamon: 1.5€
			<input type="checkbox" name="extrasCarbonara[]" value="Pollo" <?php
					if($enviado){
						if(!is_null($extrasCarbonara))
						foreach($extrasCarbonara as $extra => $valor){
							if($valor == 'Pollo'){
								echo "checked"; 
								break;
							}
						}
					}
					?>>Pollo: 1€
			<br>
			
			<!--ROMANA-->
			<label for="numRomana">Romana:</label> <input type="number" name="unidades[]" size="2" value="<?= $unidades[5] ?>">
			
			<label for="tamañosRomana">Tamaño:</label>
			<select id="tamaños" name="tamanos[]">
                    <option value="0" <?php
							if(!is_null($tamanos)){
								$valor = $tamanos[5];
								if($valor == 0){
									echo "selected";
								}
							}
							?>>Normal: 4€</option>
					<option value="1" <?php
							if(!is_null($tamanos)){
								$valor = $tamanos[5];
								if($valor == 1){
									echo "selected";
								}
							}
							?>>Grande: 7€</option>
					<option value="2" <?php
							if(!is_null($tamanos)){
								$valor = $tamanos[5];
								if($valor == 2){
									echo "selected";
								}
							}
							?>>Familiar: 9€</option>
                </select>
			
			<label for="masaRomana">Masa:</label> 
			<select id="masas" name="masas[]">
                    <option value="fina" <?php
							if(!is_null($masas)){
								$valor = $masas[5];
								if($valor == 'fina'){
									echo "selected";
								}
							}
							?>>Fina</option>
					<option value="normal" <?php
							if(!is_null($masas)){
								$valor = $masas[5];
								if($valor == 'normal'){
									echo "selected";
								}
							}
							?>>Normal</option>
                </select>
			
			Extras:
			<input type="checkbox" name="extrasRomana[]" value="Queso" <?php
					if($enviado){
						if(!is_null($extrasRomana))
						foreach($extrasRomana as $extra => $valor){
							if($valor == 'Queso'){
								echo "checked"; 
								break;
							}
						}
					}
					?>>Queso: 0.5€
			<input type="checkbox" name="extrasRomana[]" value="Pimiento" <?php
					if($enviado){
						if(!is_null($extrasRomana))
						foreach($extrasRomana as $extra => $valor){
							if($valor == 'Pimiento'){
								echo "checked"; 
								break;
							}
						}
					}
					?>>Pimiento: 1€
			<input type="checkbox" name="extrasRomana[]" value="Cebolla" <?php
					if($enviado){
						if(!is_null($extrasRomana))
						foreach($extrasRomana as $extra => $valor){
							if($valor == 'Cebolla'){
								echo "checked"; 
								break;
							}
						}
					}
					?>>Cebolla: 1€
			<input type="checkbox" name="extrasRomana[]" value="Jamon" <?php
					if($enviado){
						if(!is_null($extrasRomana))
						foreach($extrasRomana as $extra => $valor){
							if($valor == 'Jamon'){
								echo "checked"; 
								break;
							}
						}
					}
					?>>Jamon: 1.5€
			<input type="checkbox" name="extrasRomana[]" value="Pollo" <?php
					if($enviado){
						if(!is_null($extrasRomana))
						foreach($extrasRomana as $extra => $valor){
							if($valor == 'Pollo'){
								echo "checked"; 
								break;
							}
						}
					}
					?>>Pollo: 1€
			<br>
			
			<!--MEDITERRANEA-->
			<label for="numMediterranea">Mediterranea:</label> <input type="number" name="unidades[]" size="2" value="<?= $unidades[6] ?>">
			
			<label for="tamañosMediterranea">Tamaño:</label>
			<select id="tamaños" name="tamanos[]">
                    <option value="0" <?php
							if(!is_null($tamanos)){
								$valor = $tamanos[6];
								if($valor == 0){
									echo "selected";
								}
							}
							?>>Normal: 4€</option>
					<option value="1" <?php
							if(!is_null($tamanos)){
								$valor = $tamanos[6];
								if($valor == 1){
									echo "selected";
								}
							}
							?>>Grande: 7€</option>
					<option value="2" <?php
							if(!is_null($tamanos)){
								$valor = $tamanos[6];
								if($valor == 2){
									echo "selected";
								}
							}
							?>>Familiar: 9€</option>
                </select>
			
			<label for="masaMediterranea">Masa:</label> 
			<select id="masas" name="masas[]">
                    <option value="fina" <?php
							if(!is_null($masas)){
								$valor = $masas[6];
								if($valor == 'fina'){
									echo "selected";
								}
							}
							?>>Fina</option>
					<option value="normal" <?php
							if(!is_null($masas)){
								$valor = $masas[6];
								if($valor == 'normal'){
									echo "selected";
								}
							}
							?>>Normal</option>
                </select>
			
			Extras:
			<input type="checkbox" name="extrasMediterranea[]" value="Queso" <?php
					if($enviado){
						if(!is_null($extrasMediterranea))
						foreach($extrasMediterranea as $extra => $valor){
							if($valor == 'Queso'){
								echo "checked"; 
								break;
							}
						}
					}
					?>>Queso: 0.5€
			<input type="checkbox" name="extrasMediterranea[]" value="Pimiento" <?php
					if($enviado){
						if(!is_null($extrasMediterranea))
						foreach($extrasMediterranea as $extra => $valor){
							if($valor == 'Pimiento'){
								echo "checked"; 
								break;
							}
						}
					}
					?>>Pimiento: 1€
			<input type="checkbox" name="extrasMediterranea[]" value="Cebolla" <?php
					if($enviado){
						if(!is_null($extrasMediterranea))
						foreach($extrasMediterranea as $extra => $valor){
							if($valor == 'Cebolla'){
								echo "checked"; 
								break;
							}
						}
					}
					?>>Cebolla: 1€
			<input type="checkbox" name="extrasMediterranea[]" value="Jamon" <?php
					if($enviado){
						if(!is_null($extrasMediterranea))
						foreach($extrasMediterranea as $extra => $valor){
							if($valor == 'Jamon'){
								echo "checked"; 
								break;
							}
						}
					}
					?>>Jamon: 1.5€
			<input type="checkbox" name="extrasMediterranea[]" value="Pollo" <?php
					if($enviado){
						if(!is_null($extrasMediterranea))
						foreach($extrasMediterranea as $extra => $valor){
							if($valor == 'Pollo'){
								echo "checked"; 
								break;
							}
						}
					}
					?>>Pollo: 1€
			<br>
		</p>
		<br>
		<?php
			if($enviado){
				$elegidos = 0;
				foreach($unidades as $unidad => $valor){
					if(!empty($valor)){
						$elegidos +=1;
					}
				}
				if($elegidos == 0){
					echo "Se debe introducir al menos la cantidad de una pizza <br>";
				}
			}
		?>
		<input type="submit" name="enviado" value="Enviar">
		
		<?php
		if($confirmado){
				echo "<br>El pedido ha sido recibido en breve lo recibira en su domicilio <br>";
		}
		else if($cancelado){
			echo "<br>Se cancelo el pedido <br>";
		}
		else{
			if($enviado){	
					$elegidos = 0;
					foreach($unidades as $unidad => $valor){
						if(!empty($valor)){
							$elegidos +=1;
						}
					}

					if($elegidos > 0 && !empty($nombre) && !empty($direccion) && !empty($email)){
						echo "<br><b>Datos del cliente:</b> <br>";
						echo "Nombre: $nombre <br>";
						echo "Direccion: $direccion <br>";
						echo "email: $email <br>";
						echo "<b>Datos del pedido:</b> <br>";
						$precioTotal = 0;
						
						for($i = 0; $i < count($unidades);$i++){
							if(!empty($unidades[$i])){
								$precio = 0;
								$tamano = $tamanos[$i];
								$cantidad = $unidades[$i];
								$precio += $precioPizzas[$i][$tamano] * $cantidad;
								$masa = $masas[$i];
								$extrasElegidos ="";

								for($j = 0; $j < count($precioExtras);$j++){
									if(!empty($extras[$i][$j])){
										$key = $extras[$i][$j];
										$precio += $precioExtras[$key] * $cantidad;
										$extrasElegidos = $extrasElegidos . $key . ",";
									}
								}
								$precioTotal += $precio;
								$extrasElegidos = substr($extrasElegidos,0,-1);

								echo "Pizza: $pizzas[$i] unidades: $cantidad tamaño: $nombreTamanos[$tamano] Masa: $masa Extras Elegidos: $extrasElegidos Precio: $precio € <br>";
							}
						}
						echo "El precio total del pedidos es: " . $precioTotal . "€<br>";
						?><input type="submit" name="confirmar" value="Confirmar pedido"><input type="submit" name="cancelar" value="Cancelar"><?php
					}
			}}
		?>
	</form>
</body>
</html>