<!-- 

-->
<html>
	<head>
		<title>Calendario</title>
	</head>

	
<body> 
		<form name="input" method="post" >
			<table>			
				<caption>Calendario diferencia en dias</caption>
				
				
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
						<b>Escoge hora 1 :</b>
					</td>
					<td>
						<input type="time" name="hora1" value="00:00:00" max="23:59:59" min="00:00:00" step="1">
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

				<tr>
					<td>
						<b>Escoge hora 2 :</b>
					</td>
					<td>
						<input type="time" name="hora2" value="00:00:00" max="23:59:59" min="00:00:00" step="1">
					</td>
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

				//Comprobamos que los datos esten completados y no este vacio

				if(empty($_POST['fecha1'])) {
					echo "<p>Es necesario que completes fecha 1.</p> ";
				}elseif(empty($_POST['fecha2'])) {
					echo "<p>Es necesario que completes fecha 2.</p> ";
				}elseif(empty($_POST['hora1'])) {
					echo "<p>Es necesario que completes hora 1.</p> ";
				}elseif(empty($_POST['hora2'])) {
					echo "<p>Es necesario que completes hora 2.</p> ";
				}else{
					//en caso de estar completados los pasamos valores a las variables mediante el metodo POST
					$fecha1 = $_POST['fecha1']; 
					$fecha2 = $_POST['fecha2'];
					
					$date1 = new DateTime($fecha1);
					$date2 = new DateTime($fecha2);
					
					if($date1< $dateHoy ) {
						echo "<p>Es necesario que la fecha 1 no ea inferior a la fecha de hoy.</p> ";
					}elseif($date2 < $dateHoy) {
						echo "<p>Es necesario que la fecha 2 no ea inferior a la fecha de hoy.</p> ";
					}else{
					
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
						
						}
					}//fin else
				
				//fin de la accion de introducir
				}//
			?>
	
			
	
</body>
</html>