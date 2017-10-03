<!-- 

-->
<?php
							session_start();
							?>
<html>
	<head>
		<title>Formulario Pacientes</title>
	</head>

	
<body> 
		<form name="input" method="post" action="ConfirmarPaciente.php"> <!--  Combos dependientes accesibles -->
			<table>			
				<caption>Datos del paciente</caption>
				
				<tr>
					<td>
						<b>Nombre del paciente</b>
					</td>
					<td>
						<input type="text" value="" name="nombrePaciente"><br>	
					</td>
				</tr>
				
				<tr>
					<td>
						<b>Dirección del cliente:</b>
					</td>
					<td>
						<input type="text" value="" name="direccionPaciente"><br> <!-- type="hidden" -->
					</td>
				</tr>
				
				<tr>
					<td>
						<b>Teléfono del paciente:</b>
					</td>
					<td>
						<input type="text" value="" name="telefonoPaciente"><br>
					</td>
				</tr>

				<tr>
					<td>
						<b>DNI del paciente:</b>
					</td>
					<td>
						<input type="text" value="" name="dniPaciente"><br>
					</td>
				</tr>
				
				<tr>
					<td>
						<b>Fecha de la cita</b>
					</td>
					<td>
						<input type="date" value="" name="fechaCita"><br>
					</td>
				</tr>
				
				<tr>
					<td>
						<b>Hora de la cita</b>
					</td>
					<td>
							<input name="horaCita" type="radio" value="08:00"/>08:00
							<input name="horaCita" type="radio" value="09:00"/>09:00
							<input name="horaCita" type="radio" value="10:00"/>10:00
							<input name="horaCita" type="radio" value="11:00"/>11:00
							<input name="horaCita" type="radio" value="12:00"/>12:00
							<input name="horaCita" type="radio" value="13:00"/>13:00
							<input name="horaCita" type="radio" value="14:00"/>14:00
							<input name="horaCita" type="radio" value="15:00"/>15:00
							<input name="horaCita" type="radio" value="16:00"/>16:00
							<input name="horaCita" type="radio" value="17:00"/>17:00
							<input name="horaCita" type="radio" value="18:00"/>18:00
							<br>
					</td>
				</tr>
				
				<tr>
					<td>
						<b>Minuto de la cita</b>
					</td>
					<td>
							<input name="minutoCita" type="radio" value="15"/>15
							<input name="minutoCita" type="radio" value="30"/>30
							<input name="minutoCita" type="radio" value="45"/>45
							<input name="minutoCita" type="radio" value="00"/>00
							<br>
					</td>
				</tr>
				
				<tr>
					<td>
						<b>Comentarios</b>
					</td>
					<td>
						<textarea  name="comentarios"></textarea><br>
					</td>
				</tr>
				<tr>
					<td>
					<b>Especialidad de la cita</b> 
					</td>
					<td>
						<?php
						
							//bbdd conexion
							$serverName = "C6PC6\SQLEXPRESS"; //serverName\instanceName
							$connectionInfo = array("Database" => "Consultas", "CharacterSet" => "UTF-8");
							$conn = sqlsrv_connect($serverName, $connectionInfo);
							////////averiguar especialidad///////////////
							$sqlIdMedico = "SELECT EspecialidadMedico FROM Medicos ;";

							$cursor2 = sqlsrv_query($conn, $sqlIdMedico);
							if ($cursor2) {
								echo "<select name='especialidadCita' id='especialidadCita'>";
									while( $fila = sqlsrv_fetch_array( $cursor2, SQLSRV_FETCH_ASSOC) ) {
										echo "<option value='".$fila['EspecialidadMedico']."'>".$fila['EspecialidadMedico']."</option>";
									}
								echo "</select>";
							}

							sqlsrv_free_stmt($cursor2);//liberas cursor
							sqlsrv_close($conn);//cierras conexion

						?>

					</td>
				</tr>
				<tr>
					<td>
					<b> Medico de la cita</b> 
					</td>
					<td>
						<?php
							//bbdd conexion
							$serverName = "C6PC6\SQLEXPRESS"; //serverName\instanceName
							$connectionInfo = array("Database" => "Consultas", "CharacterSet" => "UTF-8");
							$conn = sqlsrv_connect($serverName, $connectionInfo);
							////////averiguar especialidad/////////////// WHERE EspecialidadMedico = 'Dermatologia'
							$sqlMedico22 = "SELECT NombreMedico FROM Medicos ;";
							$cursor43 = sqlsrv_query($conn, $sqlMedico22);
							if ($cursor43) {
								echo "<select name='medicoCita' id='medicoCita'>";
									while( $fila = sqlsrv_fetch_array( $cursor43, SQLSRV_FETCH_ASSOC) ) {
										echo "<option value='".$fila['NombreMedico']."'>".$fila['NombreMedico']."</option>";
									}
								echo "</select>";
							}

							sqlsrv_free_stmt($cursor43);//liberas cursor
							sqlsrv_close($conn);//cierras conexion
						?>	

					</td>
				</tr>
			</table>
			
		</table>

		<input type="submit" name="Agregar" value="Agregar"/>
		</form>
		<?php
			$hoy = date("20y-m-d");
			echo "Día de hoy: ".$hoy."<br>";
			$hoyHora = date("h:i"); 
			echo "Hora de hoy: ".$hoyHora."<br>";
		?>
		
	
			
	
</body>
</html>