<!-- 4. Diseñar un formulario web que permita a PizzaNet recibir pedidos de los internautas desde
sus navegadores. La información que debe recoger el formulario es:
	a. Nombre, dirección y teléfono del cliente
	b. Pizzas que desea a elegir entre margarita, barbacoa, 4 estaciones, 4 quesos, carbonara,
	romana y mediterránea
	c. En tamaños normal, grande y familiar
	d. Con masa fina y normal
	e. Extras de queso, pimiento, cebolla, jamón y pollo
	
Cada pedido de pizza deberá especificar la cantidad de unidades que se desean pedir

Cada pizza tiene un precio por cada tamaño

Cada extra tiene un precio, el cliente puede solicitar cualquier número de extras.
Cuando el cliente pulsa el botón Aceptar, el servidor deberá comprobar la información
remitida: son campos obligatorios los datos del cliente y al menos un pedido de una pizza.
Cuando los datos sean correctos, el servidor responderá con una especie de factura en la que
se detallará los datos del cliente, los productos pedidos y el precio a pagar por cada grupo (2
pizzas margarita grandes con extra de tal tanto, 1 pizza barbacoa familiar con extra de cual
tanto, 1 pizza barbacoa familiar con extra de esto tanto, y al final el total a pagar.
El cliente pulsará otro botón de aceptación o cancelación. Si se pulsa aceptar, el sistema
responderá dando las gracias e informando de que la persona tal llevará a la dirección
especificada el pedido en tanto tiempo. 

required
enabled
enabled

hidden para ocultar direccion del cliente cuando devuelva pedido
http://www.w3schools.com/php/php_form_complete.asp
http://www.w3schools.com/php/showphp.asp?filename=demo_form_validation_complete

-->
<html>
	<head>
		<title>Formulario pizzas</title>
	</head>
	<style>
		* {
			margin:0;
			padding: 0;
		}
	
		@font-face {
			font-family: "Hobo";
			src: url("fuentes/HoboStd.otf");
		}
		
		body {
			margin: 0.25em auto;
			padding:35px;
			background:#1E6381;
			font-size: 1.5em;
			font-family: "Hobo";
		}
		
		#contenedor {
			padding:35px;
			margin: 0.5em auto;
			border-radius:0.5em;
			max-width: 1300px; /* ancho maximo */	
			background-color:white;	
			height: 550px;
		}
		
		h1 {
			color: rgb(158,17,10);
			text-shadow:1px 1px 0 white, 2px 2px 0 grey;
			border: 1px solid #ccc;
			background-color:#fff;
			text-align: center;
			width: 500px;
			margin-left: 400px;
			padding: 10px;
		}
		#precios, #formulario,#totales  {
			margin: 0.5em auto;
			max-width: 960px; /* ancho maximo */
			padding:0.25em;
		}
		#precios {
			  margin: 0.5em;
			  background-color: green;
			  float: left;
			  border: 2px solid black;
		}
		
		caption {
			color: red;
			font-size: 2em;
			text-align: left;
		}
		
		#formulario  {
			  background-color: pink;
			  float: left;
			  border: 2px solid black;
			  vertical-align: top;
			  max-width: 960px; /* ancho maximo */
		}
		
		#totales {
			  clear: both;
			  background-color: yellow;
			  border: 2px solid black;
		}

	</style>
	
<body> 
	<h1>Pizza .NET</h1>
	<div id="contenedor">
		<div id="precios">
		<img src="pizza.png" width="100px" height="50px"/>
			<table >	
				<caption>Precios tamaño pizza</caption>
				<tr>
					<td>
						<b>Normal</b>
					</td>
					<td>
						7
					</td>
				</tr>
				<tr>
					<td>
						<b>Grande</b>
					</td>
					<td>
						10
					</td>
				</tr>
				<tr>
					<td>
						<b>Familiar</b>
					</td>
					<td>
						12
					</td>
				</tr>
			</table>
			<table >	
				<caption>Precios extras pizza</caption>
				<tr>
					<td>
						<b>Queso</b>
					</td>
					<td>
						1
					</td>
				</tr>
				<tr>
					<td>
						<b>Pimiento</b>
					</td>
					<td>
						1
					</td>
				</tr>
				<tr>
					<td>
						<b>Cebolla</b>
					</td>
					<td>
						2
					</td>
				</tr>
				<tr>
					<td>
						<b>Jamón</b>
					</td>
					<td>
						2
					</td>
				</tr>
				<tr>
					<td>
						<b>Pollo</b>
					</td>
					<td>
						3
					</td>
				</tr>
			</table>
			<table >	
				<caption>IVA</caption>
				<tr>
					<td>
						<b>IVA Alimentos hostelería</b>
					</td>
					<td>
						10%
					</td>
				</tr>

			</table>
		</div>
		
		
		<div id="formulario">
		<!-- EMPIEZA EL FORMULARIO -->
		<form name="input" action="#" method="post">
			<table>			
				<caption>Datos del cliente</caption>
				
				<tr>
					<td>
						<b>Nombre del cliente</b>
					</td>
					<td>
						<input type="text" value="" name="nombreCliente"><br>	
					</td>
				</tr>
				
				<tr>
					<td>
						<b>Dirección del cliente:</b>
					</td>
					<td>
						<input type="text" value="" name="direccionCliente"><br> <!-- type="hidden" -->
					</td>
				</tr>
				
				<tr>
					<td>
						<b>Teléfono del cliente:</b>
					</td>
					<td>
						<input type="text" value="" name="telefonoCliente"><br>
					</td>
				</tr>

			</table>
			<table>
				<caption>Tipo de pizza</caption>
				
				<tr>
					<td>
						<b>Tipo de pizza a elegir:</b> 
					</td>
					<td>
							<input type="checkbox" value="margarita" name="tipoPizza">Margarita
							<input type="checkbox" value="barbacoa" name="tipoPizza">Barbacoa
							<input type="checkbox" value="estaciones4" name="tipoPizza">4 estaciones
							<input type="checkbox" value="quesos4" name="tipoPizza">4 quesos
							<input type="checkbox" value="carbonara" name="tipoPizza">Carbonara
							<input type="checkbox" value="romana" name="tipoPizza">Romana
							<input type="checkbox" value="mediterranea" name="tipoPizza">Mediterránea
					</td>
				</tr>
				
				<tr>
					<td>
						<b>Tamaño de pizza a elegir:</b>
					</td>
					<td>
							<input type="checkbox" value="normal" name="sizePizza">Normal
							<input type="checkbox" value="grande" name="sizePizza">Grande
							<input type="checkbox" value="familiar" name="sizePizza">Familiar
					</td>
				</tr>
				
				<tr>
					<td>
						<b>Masa de la pizza a elegir:</b> 
					</td>
					<td>
							<input type="checkbox" value="fina" name="masaPizza">Fina
							<input type="checkbox" value="normal" name="masaPizza">Normal
					</td>
				</tr>
				
				<tr>
					<td>				
						<b>Extras de la pizza a elegir:</b>
					</td>
					<td>
							<input type="checkbox" value="queso" name="extrasPizzas[]">Queso
							<input type="checkbox" value="pimiento" name="extrasPizzas[]">Pimiento
							<input type="checkbox" value="cebolla" name="extrasPizzas[]">Cebolla
							<input type="checkbox" value="jamon" name="extrasPizzas[]">Jamón   <!-- extra[] -->
							<input type="checkbox" value="pollo" name="extrasPizzas[]">Pollo	
					</td>
				</tr>	
					
				<tr>
					<td>	
						<b>Número de pizzas elegidas:</b>
					</td>
					<td>
						<input type="text" value="" name="numeroPizzas"><br>
					</td>
				</tr>
			<br>
		</table>

		<input type="submit" name="Agregar" value="Agregar">
		<input type="submit" name="Cancelar" value="CANCELAR">
		</form>
		</div>
		<div id="formulario">
			<!-- empieza el php -->
			<?php
			static $IVA = 10; //diez por ciento IVA alimentos hosteria
			//SI LE DAMOS AL BOTON AGREGAR<!-- Esto es para agregar la pizza pedida abajo -->
			if(isset($_POST['Agregar'])) {	 
				//Comprobamos que los datos esten completados y no este vacio
				if(empty($_POST['nombreCliente'])) {
					echo "<p>Es necesario que completes tu nombre.</p> ";
				}
				elseif(empty($_POST['direccionCliente'])) {
					echo "<p>Es necesario que completes tu dirección.</p> ";
				}
				elseif(empty($_POST['telefonoCliente'])) {
					echo "<p>Es necesario que completes tu teléfono.</p> ";
				}elseif(empty($_POST['tipoPizza']) || empty($_POST['sizePizza']) || empty($_POST['masaPizza']) || empty($_POST['extrasPizzas']) || 
					empty($_POST['numeroPizzas'])) {
					echo "<p>Algunos de los campos del pedido de la pizza está vacio.</p> ";
				}else{
					//en caso de estar completados los pasamos valores a las variables mediante el metodo POST
					$nombreCliente = $_POST['nombreCliente'];
					$direccionCliente = $_POST['direccionCliente'];
					$telefonoCliente = $_POST['telefonoCliente'];           
					$tipoPizza = $_POST['tipoPizza'];
					$sizePizza = $_POST['sizePizza'];
					$masaPizza = $_POST['masaPizza'];
					//este es para hacer un array de extras
					$extrasPizzas = $_POST['extrasPizzas'];
					$numeroPizzas = $_POST['numeroPizzas'];
		
					$euros = 0; //precio inicial pizza
					
					//va sumando el precio en sentido lineal
					//Precios tamaño pizza Normal	7 Grande	10 Familiar	12	
					if ($tipoPizza == "normal") {
						$euros = $euros + 7;
					} elseif ($tipoPizza == "grande") {
						$euros = $euros + 10;
					} else {
						$euros = $euros + 12;
					}
					
					//Precios extras pizza Queso	1 Pimiento	1 Cebolla	2 Jamon	2 Pollo	3
				
					for($e =0; $e< count($extrasPizzas); $e++){
						$extraElegido = $extrasPizzas[$e];
						if ($extraElegido == 'queso') {
							$euros = $euros + 1;
						} elseif ($extraElegido == 'pimiento') {
							$euros = $euros + 1;
						} elseif ($extraElegido == 'cebolla') {
							$euros = $euros + 1;
						} elseif ($extraElegido == 'jamon') {
							$euros = $euros + 2;
						} elseif ($extraElegido == 'pollo') {
							$euros = $euros + 3;
						
						}
					}

					//multipicamos el numero de pizzas
					$euros = $euros*$numeroPizzas;
					
					
					//el total del pedido
					//es un array multiple de 3 dimensiones
					$cuentaCliente = array(
						"Cliente" => array(
							"Nombre" => $nombreCliente,
							"Dirección del cliente" => $direccionCliente,
							"Teléfono" => $telefonoCliente,		
							"Pizza" => array(	
								"Tipo" => $tipoPizza,
								"Tamaño"=> $sizePizza,
								"Masa" => $masaPizza,
								"Unidades" => $numeroPizzas,
								"Extras" => $extrasPizzas
									)
							)
						
					); 
					
					$totalFacturaIVA = (($euros+($euros/100)*$IVA));
			
					//SESION
					session_start();//empezamos la sesion
					$_SESSION['euros']=$euros;
					$_SESSION['nombreCliente']=$nombreCliente;
					$_SESSION['direccionCliente']=$direccionCliente;
					$_SESSION['telefonoCliente']=$telefonoCliente;
					$_SESSION['cuentaCliente']=$cuentaCliente;
					$_SESSION['totalFacturaIVA']=$totalFacturaIVA;

					//recorrer el array y imprimir el resultado en html
					echo "<table border='1'>";
					echo "<caption>DATOS DE LA FACTURA</caption>";
					foreach ($cuentaCliente as $keyCliente => $valueCliente) {
						echo "<tr>";
						echo "<td>";
						echo $keyCliente."<br>";
						echo "Total a pagar : $euros ";
						echo "</td>";
						echo "<td>";
						echo "<tr>";
						echo "<td>";				
						echo "Datos del pedido ";
						echo "</tr>";
						echo "</td>";
						foreach ($valueCliente as $keyClienteDatos => $valueClienteDatos ){						
							if (!is_array($valueClienteDatos)){
									echo "<tr>";
									echo "<td>";				
									echo $keyClienteDatos . " = ". $valueClienteDatos."<br>";//esto imprime los datos del cliente
									echo "</tr>";
									echo "</td>";
							}else{
								foreach ($valueClienteDatos as $keyPizzaDatos => $valuePizzaDatos){
									if (!is_array($valuePizzaDatos)){
										echo "<tr>";
										echo "<td>";					
										echo $keyPizzaDatos ." = " .$valuePizzaDatos;//esto imprime los datos que no son extras de la pizza
										echo "</tr>";
										echo "</td>";
									}else{
											echo "<tr>";
											echo "<td>";					
											echo "EXTRAS PIZZA";//
											echo "</tr>";
											echo "</td>";
										foreach ($valuePizzaDatos as $keyExtra => $valorExtra){//para extras 
											echo "<tr>";
											echo "<td>";					
											echo $valorExtra;
											echo "</tr>";
											echo "</td>";
										}
									}
									
								}
								echo "<br>";
							}											
						}
						echo "</td>";
						echo "</tr>";
						echo "<tr>";
						echo "<td colspan='2'>";
						echo "Total a pagar + IVA = ".$totalFacturaIVA;
						echo "<center> <a href='confirmar.php'><button>confirmar</button></a> <a href='cancelar.php'><button>Cancelar</button></a> </center>"; 
						echo "<br>";
						echo "<br>";
						echo "</td>";
						echo "</tr>";
						echo "<br>";
					}
							
					echo "</table>";

				}
				//fin de la accion de pedir pizza
				}elseif(isset($_POST['Cancelar'])){//SI LE DAMOS AL BOTON Cancelar
					$mensaje= "La empresa esta su entera disposicion y desea saber si tiene alguna queja por el servicio ofrecido para poder mejorar en la calidad del servicio.
					Muchas gracias por su visita";
					echo $mensaje;
				
			}	//fin de la  instruccion de cancelar
			?>
		</div>
	</div>	
			
	
</body>
</html>