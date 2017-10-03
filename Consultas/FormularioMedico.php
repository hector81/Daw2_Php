<!-- 

-->
<html>
	<head>
		<title>Formulario Medico</title>
	</head>

	
<body> 
	<h1>Comprobar mis citas</h1>
		<form name="input" method="post">
			<table>			
				<caption>Datos del medico</caption>
				
				<tr>
					<td>
						<b>Nombre del medico</b>
					</td>
					<td>
						<input type="text" value="" name="nombreMedico"><br>	
					</td>
				</tr>
				
				<tr>
					<td>
						<b>Centro del medico:</b>
					</td>
					<td>
						<input type="text" value="" name="centroMedico"><br> <!-- type="hidden" -->
					</td>
				</tr>
				
				<tr>
					<td>
						<b>Teléfono del medico:</b>
					</td>
					<td>
						<input type="text" value="" name="telefonoMedico"><br>
					</td>
				</tr>

				<tr>
					<td>
						<b>DNI del medico:</b>
					</td>
					<td>
						<input type="text" value="" name="dniMedico"><br>
					</td>
				</tr>
				
				<tr>
					<td>
						<b>Especialidad del medico</b>
					</td>
					<td>
							<input name="especialidadMedico" type="radio" value="Radiologia"/>Radiologia
							<input name="especialidadMedico" type="radio" value="Oculista"/>Oculista
							<input name="especialidadMedico" type="radio" value="Fisioterapia"/>Fisioterapia
							<input name="especialidadMedico" type="radio" value="Ortonologia"/>Ortonologia
							<br>
					</td>
				</tr>
			</table>
			
		</table>

		<input type="submit" name="Agregar" value="Agregar"/>
		</form>

		
			<!-- empieza el php -->
			<?php
			//SI LE DAMOS AL BOTON AGREGAR
			if(isset($_POST['Agregar'])) {	 
				
				//Comprobamos que los datos esten completados y no este vacio
				if(empty($_POST['nombreMedico'])) {
					echo "<p>Es necesario que completes tu nombre.</p> ";
				}
				elseif(empty($_POST['centroMedico'])) {
					echo "<p>Es necesario que completes tu centro.</p> ";
				}
				elseif(empty($_POST['telefonoMedico'])) {
					echo "<p>Es necesario que completes tu teléfono.</p> ";
				}elseif(empty($_POST['dniMedico'])) {
					echo "<p>Es necesario que completes tu DNI.</p> ";
				}elseif(empty($_POST['especialidadMedico'])) {
					echo "<p>Es necesario que completes tu especialidad.</p> ";
				}else{
					//en caso de estar completados los pasamos valores a las variables mediante el metodo POST
					$nombreMedico = $_POST['nombreMedico'];
					$centroMedico = $_POST['centroMedico'];
					$telefonoMedico = $_POST['telefonoMedico'];           
					$dniMedico = $_POST['dniMedico']; 
					$especialidadMedico = $_POST['especialidadMedico']; 
					
					//recorrer					
					echo "<table border='1'>";
					echo "<caption>DATOS DEL</caption>";
						echo "<tr>";
							echo "<td>";
								echo "Nombre del medico"."<br>";
								echo $nombreMedico."<br>";
							echo "</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>";
								echo "Centro del medico"."<br>";
								echo $centroMedico."<br>";
							echo "</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>";
								echo "Teléfono del medico"."<br>";
								echo $telefonoMedico."<br>";
							echo "</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>";
								echo "DNI del medico"."<br>";
								echo $dniMedico."<br>";
							echo "</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>";
								echo "Especilidad del medico"."<br>";
								echo $especialidadMedico."<br>";
							echo "</td>";
						echo "</tr>";						
					echo "</table>";

					//bbdd
					$serverName = "C6PC6\SQLEXPRESS"; //serverName\instanceName
					$connectionInfo = array("Database" => "Consultas", "CharacterSet" => "UTF-8");
					$conn = sqlsrv_connect($serverName, $connectionInfo);
					if ($conn === false) {
						echo "no funciona la conexion <br>";
						die(print_r(sqlsrv_errors(), true));
					} else {
						echo "Conectado.<br>";
					}
					echo "Citas pendientes"."<br>";

					$sql = "SELECT IdPaciente, NombrePaciente, DireccionPaciente, TelefonoPaciente, DniPaciente, FechaCita,HoraCita,MedicoCita,EspecialidadCita, Comentarios
					FROM Paciente WHERE MedicoCita = '$nombreMedico' AND IdPaciente IN (SELECT IdPaciente FROM Citas WHERE IdMedico IN (SELECT IdMedico FROM Medicos)) ;";

	
					$cursor1 = sqlsrv_query($conn, $sql);


					if ($cursor1) {
						
					   $filas = sqlsrv_has_rows( $cursor1 );
					   if ($filas === true)
						 //PARA CONSULTA ASOCIATIVA
							
							while( $fila = sqlsrv_fetch_array( $cursor1, SQLSRV_FETCH_ASSOC) ) {
								  $fecha = date_format($fila['FechaCita'], 'd/m/y');
								  echo $fila['IdPaciente'].", ".$fila['NombrePaciente'].", ".$fila['DireccionPaciente'].", ".$fila['TelefonoPaciente'].", ".$fila['DniPaciente']
								  .", ".$fecha.", ".$fila['HoraCita'].", ".$fila['MedicoCita'].", ".$fila['EspecialidadCita'].", ".$fila['Comentarios']."<br />";
							}
					   else 
						  echo "No hay resultados. <br />";
					}		

					if ($cursor1 === false) {
						echo "ha fallado<br>";
						die(print_r(sqlsrv_errors(), true));
					}
					sqlsrv_free_stmt($cursor1);//liberas cursor
					sqlsrv_close($conn);//cierras conexion

					}//fin else
				
				//fin de la accion de introducir
				}
			?>
	
			
	
</body>
</html>