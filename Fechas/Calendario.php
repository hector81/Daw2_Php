<!-- 

-->
<html>
	<head>
		<title>Calendario</title>
	</head>

	
<body> 
		<form name="input" method="post" >
			<table>			
				<caption>Calendario</caption>
				
				
				<tr>
					<td>
						<b>Escoge fecha</b>
					</td>
					<td>
						<input type="date" value="" name="fechaCita"><br>
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
				
				//Comprobamos que los datos esten completados y no este vacio

				if(empty($_POST['fechaCita'])) {
					echo "<p>Es necesario que completes fecha.</p> ";
				}else{
					//en caso de estar completados los pasamos valores a las variables mediante el metodo POST

					$fecha = $_POST['fechaCita']; 
			
					//recorrer					
					echo "<table border='1'>";
					echo "<caption>DATOS ENVIADOS</caption>";
						echo "<tr>";
							echo "<td>";
								echo "La fecha es "."<br>";
								echo $fecha."<br>";
							echo "</td>";
						echo "</tr>";						
					echo "</table>";

					$date = new DateTime($fecha);
					echo $date->format('Y-m-d H:i:s');
					
					}//fin else
				
				//fin de la accion de introducir
				}//
			?>
	
			
	
</body>
</html>