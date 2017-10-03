
<html>
    <head>
        <title>CONFIRMAR</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    </head>
    <body>
	<div id="formulario">
		<center>
			<?php
			session_start();

			$euros = $_SESSION['euros'];
			$nombreCliente = $_SESSION['nombreCliente'];
			$direccionCliente = $_SESSION['direccionCliente'];
			$telefonoCliente = $_SESSION['telefonoCliente'];
			$resultado = $_SESSION['resultado'];
			
			echo "Señor " . $nombreCliente . "su pedido le llegara en 15 minutos a la direccion "
			. $direccionCliente . " si hay algun problema el llamaremos al numero " . $telefonoCliente. "abajo le dejamos los datos de su factura que 
			deberá aportar al repartidor cuyo importe más IVA son ". $resultado;

			$cuentaCliente = $_SESSION['cuentaCliente'];
			//RECORRER ARRAY ////////
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
								//echo "DATOS PIZZA ".$contador;
								//$contador++;							
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
							echo "Total a pagar + IVA = ".$resultado;
							echo "</td>";
							echo "</tr>";
							echo "<br>";
						}
						echo "</table>";

			//FIN ARRAY ////////
			 session_destroy();
			?>
		</center>
	</div>
</body>
</html>
