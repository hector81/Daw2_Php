<?php
include 'ClaseCliente.php';
session_start();
$cliente = unserialize($_SESSION['cliente']);
?>
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
						<input type="text" value="" name="nombreCliente" required="required"><br>	
					</td>
				</tr>
				
				<tr>
					<td>
						<b>Dirección del cliente:</b>
					</td>
					<td>
						<input type="text" value="" name="direccionCliente" ><br> <!-- type="hidden" -->
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
				include 'ClasePizza.php';//llamamos a la clase pizza
				include 'ClasePedido.php';//llamamos a la clase pedido
				include 'ClaseCliente.php';//llamamos a la clase cliente
				
			?>
			
			<?php
			
			
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
				}//fin de la  instruccion de agregar
				
				
				//meter la clase pedidod
				//////////////////////////
				//////////////////////aqui sacaria los valores
				//////////////////////////
				//clase pedido
				class pedidoPizzaNet{
					//atributos para los precios
					private static $IVA = 10; //diez por ciento IVA alimentos hosteria
					private $pizza;
					private $cliente;
					//constructor con parametros
					public function __construct($pizza, $cliente){
						$this->pizzas = new ClasePizza($tipoPizza,$sizePizza,$masaPizza,$extrasPizzas);//pasar la referencia al objeto
						$this->$cliente = new ClaseCliente($nombreCliente,$direccionCliente,$telefonoCliente);//pasar la referencia al objeto
					  }
					//GETTER SETTER
					function getPizzas() {
						return $this->pizzas;
					}

					function setPizzas($pizzas) {
						$this->pizzas = $pizzas;
					}
					
					function getCliente() {
						return $this->cliente;
					}

					function setCliente($cliente) {
						$this->cliente = $cliente;
					}
					
					//FUNCIONES
					
					//fUNCION PARA RECORRER EL ARRAY CON LOS DATOS DE LA FACTURA DEL PEDIDO
					public function devolverDatosPizzas($pizza){
						//recorrer objeto y imprimir el resultado en html
						echo "<table border='1'>";
						echo "<caption>DATOS DEL CLIENTE</caption>";
						foreach ($pizza as $clave => $valor) {
								if(!is_array($valor)){
									echo "<tr>";
									echo "<td>";
									echo "$clave: $valor\n"."<br>";
									echo "</td>";
									echo "</td>";		
								}else{
									foreach ($valor as $claveNueva => $valorNuevo) {
										echo "<tr>";
										echo "<td>";
										echo "$claveNueva: $valorNuevo\n"."<br>";
										echo "</td>";
										echo "</td>";		
										}
								}
						}//fin foreach
						echo "</table>";
					}//Fin funcion
					
							

					//fUNCION PARA calcular el coste total
					public function calcularCostePedido($pizza){
						$euros = 0; //precio inicial pizza//va sumando el precio en sentido lineal
						foreach ($pizza as $clave => $valor) { //$tipoPizza,$sizePizza,$masaPizza,$extrasPizzas
								if(!is_array($valor)){ 
									//Precios tamaño pizza Normal	7 Grande	10 Familiar	12	
									if ($tipoPizza == "normal") {
										$euros = $euros + 7;
									} elseif ($tipoPizza == "grande") {
										$euros = $euros + 10;
									} else {
										$euros = $euros + 12;
									}
								}else{
										//Precios extras pizza Queso	1 Pimiento	1 Cebolla	2 Jamon	2 Pollo	3
										for($e =0; $e< count($valor); $e++){
											$extraElegido = $valor[$e];
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
							
									}
								}
						}//fin foreach
						//multipicamos el numero de pizzas
						$euros = $euros*$numeroPizzas;	
						//calculamos total factura iva
						$totalFacturaIVA = (($euros+($euros/100)*$IVA));
						$resultado = "Son ". $euros . " euros más un " .$IVA ." % de IVA que es igual a " . $totalFacturaIVA . " euros en total";  
						return $resultado;
						
					}//fin funcion		

					//fUNCION PARA RECORRER EL OBJETO CLIENTE
					public function devolverDatosClientes($cliente){
						//recorrer objeto y imprimir el resultado en html
						echo "<table border='1'>";
						echo "<caption>DATOS DEL CLIENTE</caption>";
						foreach ($cliente as $clave => $valor) {
								echo "<tr>";
								echo "<td>";
								echo "$clave: $valor\n"."<br>";
								echo "</td>";
								echo "</td>";
						}//fin foreach
						echo "</table>";
					}//fin funcion
					
					
					 public function addItem($pizza) {
						array_push($this->pizzas, $pizza);
					}
				}//fin clase
				//fin clase pedido
	
				/////////////////////////////
				////////////////////////////
				////////////////////
				///////fin clase pedido
	
				//EMPEZAMOS LA SESION CON LOS DATOS CAPTURADOS DEL FORMULARIO
				session_start();
				//guardar una informacionen la sesion
				$_SESSION['euros']=$euros;
				$_SESSION['nombreCliente']=$nombreCliente;
				$_SESSION['direccionCliente']=$direccionCliente;
				$_SESSION['telefonoCliente']=$telefonoCliente;
				$_SESSION['cuentaCliente']=$cuentaCliente;
				$_SESSION['resultado']=$resultado;
	
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