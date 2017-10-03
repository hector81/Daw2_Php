<!-- 

-->
<html>
	<head>
		<title>Formulario Pacientes</title>
	</head>

	
<body> 
		<form name="input" method="post" > <!-- action="ConfirmarPaciente.php" Combos dependientes accesibles -->
			<table>			
				
				<tr>
					<td>
						<b>Especialidad de la cita</b> 
					</td>
					<td>
					<?php
							//bbdd conexion
							$serverName = "USUARIO\SQLEXPRESS"; //serverName\instanceName
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


					?>
					</td>
				</tr>
				<tr>
					<td>
					<b> Medico de la cita</b> 
					</td>
					<td>
					<?php
							////////averiguar especialidad/////////////// WHERE EspecialidadMedico = 'Dermatologia'
							$sqlMedico = "SELECT NombreMedico FROM Medicos ;";
							$cursor3 = sqlsrv_query($conn, $sqlMedico);
							if ($cursor3) {
								echo "<select name='medicoCita' id='medicoCita'>";
									while( $fila = sqlsrv_fetch_array( $cursor3, SQLSRV_FETCH_ASSOC) ) {
										echo "<option value='".$fila['NombreMedico']."'>".$fila['NombreMedico']."</option>";
									}
								echo "</select>";
							}

							sqlsrv_free_stmt($cursor3);//liberas cursor
					?>	

					</td>
				</tr>
			</table>
			
		</table>

		</form>

		
			<!-- empieza el php -->
			<?php
				
					
			?>
	
			
	
</body>
</html>