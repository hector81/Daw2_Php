<!-- 

-->
<html>
	<head>
		<title>Calendario</title>
	</head>

	
<body> 
		<form name="input" method="post" >
			<table>			
				<caption>Calendario diferencia en dias y meses</caption>
				
				
				<tr>
					<td>
						<b>Escoge fecha 1 :</b>
					</td>
					<td>
						<input type="date" value="" name="fecha1"><br>
					</td>
				</tr>
				
				<tr>
					<td>
						<b>Escoge fecha 2 :</b>
					</td>
					<td>
						<input type="date" value="" name="fecha2"><br>
					</td>
				</tr>

				</tr>
			</table>
			
		</table>

		<input type="submit" name="Enviar" value="Enviar"/>
		</form>

		
			<!-- empieza el php -->
			<?php
			//SI LE DAMOS AL BOTON AGREGAR
			if(isset($_POST['Enviar'])) {
				//averiguamos la fecha de hoy
				$dateHoy = new DateTime("now");
				echo $dateHoy->format('Y-m-d H:i:s');
				//Comprobamos que los datos esten completados y no este vacio

				if(empty($_POST['fecha1'])) {
					echo "<p>Es necesario que completes fecha 1.</p> ";
				}elseif(empty($_POST['fecha2'])) {
					echo "<p>Es necesario que completes fecha 2.</p> ";
				}else{
					//en caso de estar completados los pasamos valores a las variables mediante el metodo POST

					$fecha1 = $_POST['fecha1']; 
					$fecha2 = $_POST['fecha2'];
					
							//recorrer					
							echo "<table border='1'>";
							echo "<caption>DATOS ENVIADOS</caption>";
								echo "<tr>";
									echo "<td>";
										echo "La fecha 1 es "."<br>";
										echo $fecha1."<br>";
									echo "</td>";
								echo "</tr>";	
								echo "<tr>";
									echo "<td>";
										echo "La fecha 2 es "."<br>";
										echo $fecha2."<br>";
									echo "</td>";
								echo "</tr>";						
							echo "</table>";
							
							//formatear fecha en dias
							$date1 = new DateTime($fecha1);
							echo $date1->format('Y-m-d H:i:s');
							echo "<br>";
							
							$date2 = new DateTime($fecha2);
							echo $date2->format('Y-m-d H:i:s');
							echo "<br>";
							
							//creamos objetos
							$datetime1 = new DateTime($fecha1);
							$datetime2 = new DateTime($fecha2);
							//creamos el intervalo que lo devolvera en dias
							$interval = $datetime1->diff($datetime2);
							echo "La diferencia en dias es <br>";
							echo $interval->format('%a días');
							echo "<br>";
							
							//creamos objetos
							$mes1 = new DateTime('2010-01-01');
							$mes2 = new DateTime('2010-02-01');
							$intervalo = $mes2->diff($mes1);
							//creamos el intervalo que lo devolvera en dias
							$interval = $datetime1->diff($datetime2);
							echo "La diferencia en meses es <br>";
							echo $interval->format('%m meses');
							
							
					}//fin else
				
				//fin de la accion de introducir
				}//
			?>
	
			
	
</body>
</html>