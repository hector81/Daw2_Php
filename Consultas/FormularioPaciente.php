<!-- 

-->
<html>
	<head>
		<title>Formulario Pacientes</title>
	</head>

	
<body> 
		<form name="input" method="post" > <!-- action="ConfirmarPaciente.php" Combos dependientes accesibles -->
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
							$serverName = "USUARIO\SQLEXPRESS"; //serverName\instanceName
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
		
			<!-- empieza el php -->
			<?php
			//SI LE DAMOS AL BOTON AGREGAR
			if(isset($_POST['Agregar'])) {	 
				
				//Comprobamos que los datos esten completados y no este vacio
				if(empty($_POST['nombrePaciente'])) {
					echo "<p>Es necesario que completes tu nombre.</p> ";
				}
				elseif(empty($_POST['direccionPaciente'])) {
					echo "<p>Es necesario que completes tu dirección.</p> ";
				}
				elseif(empty($_POST['telefonoPaciente'])) {
					echo "<p>Es necesario que completes tu teléfono.</p> ";
				}elseif(empty($_POST['dniPaciente'])) {
					echo "<p>Es necesario que completes tu DNI.</p> ";
				}elseif(empty($_POST['fechaCita'])) {
					echo "<p>Es necesario que completes fecha cita.</p> ";
				}elseif(empty($_POST['horaCita'])) {
					echo "<p>Es necesario que completes hora cita.</p> ";
				}elseif(empty($_POST['minutoCita'])) {
					echo "<p>Es necesario que completes minuto cita.</p> ";
				}elseif(empty($_POST['medicoCita'])) {
					echo "<p>Es necesario que completes medico cita.</p> ";
				}elseif(empty($_POST['especialidadCita'])) {
					echo "<p>Es necesario que completes especialidad cita.</p> ";
				}elseif(empty($_POST['comentarios'])) {
					echo "<p>Es necesario poner un comentario.</p> ";
				}else{
													
					//en caso de estar completados los pasamos valores a las variables mediante el metodo POST
					
					
					$nombrePaciente = $_POST['nombrePaciente'];
					$direccionPaciente = $_POST['direccionPaciente'];
					$telefonoPaciente = $_POST['telefonoPaciente'];           
					$dniPaciente = $_POST['dniPaciente']; 
					$fechaCita = $_POST['fechaCita']; 
					$horaCita = $_POST['horaCita']; 
					$minutoCita = $_POST['minutoCita']; 
					$medicoCita = $_POST['medicoCita'];
					$especialidadCita = $_POST['especialidadCita'];
					$comentarios = $_POST['comentarios'];

					/*
					session_start();

					$_SESSION['nombrePaciente'] = $nombrePaciente ;
					$_SESSION['direccionPaciente'] = $direccionPaciente ;
					$_SESSION['telefonoPaciente'] = $telefonoPaciente ;
					$_SESSION['dniPaciente'] = $dniPaciente ;
					$_SESSION['fechaCita'] = $fechaCita ;
					$_SESSION['horaCita'] = $horaCita ;
					$_SESSION['minutoCita'] = $minutoCita ;
					$_SESSION['medicoCita'] = $medicoCita ;
					$_SESSION['especialidadCita'] = $especialidadCita ;
					$_SESSION['comentarios'] = $comentarios ;
					
					*/
					//convertir hora
					$horarioCita = substr($horaCita, 0,3).$minutoCita;					
					//recorrer					
					echo "<table border='1'>";
					echo "<caption>DATOS ENVIADOS</caption>";
						echo "<tr>";
							echo "<td>";
								echo "Nombre del paciente"."<br>";
								echo $nombrePaciente."<br>";
							echo "</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>";
								echo "Dirección del paciente"."<br>";
								echo $direccionPaciente."<br>";
							echo "</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>";
								echo "Teléfono del paciente"."<br>";
								echo $telefonoPaciente."<br>";
							echo "</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>";
								echo "DNI del paciente"."<br>";
								echo $dniPaciente."<br>";
							echo "</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>";
								echo "Fecha de la cita"."<br>";
								echo $fechaCita."<br>";
							echo "</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>";
								echo "Hora de la cita"."<br>";
								echo $horarioCita."<br>";
							echo "</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>";
								echo "Medico de la cita"."<br>";
								echo $medicoCita."<br>";
							echo "</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>";
								echo "Especialidad de la cita"."<br>";
								echo $especialidadCita."<br>";
							echo "</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>";
								echo "Comentarios"."<br>";
								echo $comentarios."<br>";
							echo "</td>";
						echo "</tr>";						
					echo "</table>";

					//comprobar hora y dia
					function comprobarHorarios($fechaCita,$horarioCita){
						$boolComp = false;
						$hoyHora = date("h:i");
						$hoy = date("20y-m-d");	
						if($hoy > $fechaCita){
							echo "El dia esta pasada de la actual"."<br>";
							$boolComp = false;
						}elseif($hoy == $fechaCita){
							if($hoyHora > $horarioCita){
								echo "La hora esta pasada de la actual"."<br>";
								$boolComp = false;
							}else{
								echo "HORARIO CORRECTO<br>";
								$boolComp = true;
							}
						}elseif($hoy < $fechaCita){
							echo "HORARIO CORRECTO<br>";
							$boolComp = true;
						}
						return $boolComp;
					}
					
					if(comprobarHorarios($fechaCita,$horarioCita)== true){
						//bbdd conexion
						$serverName = "USUARIO\SQLEXPRESS"; //serverName\instanceName
						$connectionInfo = array("Database" => "Consultas", "CharacterSet" => "UTF-8");
						$conn = sqlsrv_connect($serverName, $connectionInfo);
						if ($conn === false) {
							echo "no funciona la conexion <br>";
							die(print_r(sqlsrv_errors(), true));
						} else {
							echo "Conectado.<br>";
						}
						//comprobamos fecha, dni y hora
						$sqlDNI = "SELECT Paciente.DniPaciente, Citas.FechaCita, Citas.HoraCita,Citas.MedicoCita FROM Paciente, Citas ";
						$DNI;
						$FECHA;
						$HORA;
						$MEDICO;
						$ComprobarDniPaciente = true;
						$ComprobarCoincidenciaFecha = true;
						$cursor0 = sqlsrv_query($conn, $sqlDNI);
						if ($cursor0) {
								while( $fila = sqlsrv_fetch_array( $cursor0, SQLSRV_FETCH_ASSOC) ) {
									  $DNI=$fila['DniPaciente'];
									  $FECHA =$fila['FechaCita'];
									  $FECHA = date_format($FECHA, '20y-m-d');//convertir la fecha
									  $HORA =$fila['HoraCita'];
									  $MEDICO =$fila['MedicoCita'];
									  if($dniPaciente == $DNI && $medicoCita == $MEDICO){
										  $ComprobarDniPaciente = false;
									  }else{
										  $ComprobarDniPaciente = true;
									  }					  
									  if($fechaCita ==$FECHA && $horarioCita == $HORA && $medicoCita == $MEDICO ){
										  $ComprobarCoincidenciaFecha= false;
									  }else{
										  $ComprobarCoincidenciaFecha = true;
									  }
									  
								}
						}
						sqlsrv_free_stmt($cursor0);//liberas cursor
						if($ComprobarDniPaciente == false){
							echo "Usuario ya tiene pedida una cita con ese medico"."<br>";
						}elseif($ComprobarCoincidenciaFecha == false){
							echo "Ese dia el medico ya tiene otra cita"."<br>";
						}else{
							//llenar tabla paciente
							/////////////////////////////////
							$sqlInsercionDatosPaciente = "INSERT INTO paciente (NombrePaciente, DireccionPaciente, TelefonoPaciente, DniPaciente) VALUES ( ?, ?, ?, ?)";

							//$fechaCita = date_format($fechaCita, 'd/m/y');
							$params = array($nombrePaciente, $direccionPaciente, $telefonoPaciente, $dniPaciente);
							$cursor = sqlsrv_query($conn, $sqlInsercionDatosPaciente, $params);

							if ($cursor === false) {
								echo "ha fallado<br>";
								die(print_r(sqlsrv_errors(), true));
							}else{
								echo "Cita pedida con exito"."<br>";
							}
							sqlsrv_free_stmt($cursor);//liberas cursor
							////////averiguar id paciente///////////////
							$sqlIdPaciente = "SELECT IdPaciente FROM Paciente WHERE DniPaciente LIKE '$dniPaciente' ";
							$idPaciente;
							$cursor1 = sqlsrv_query($conn, $sqlIdPaciente);
							if ($cursor1) {
									while( $fila = sqlsrv_fetch_array( $cursor1, SQLSRV_FETCH_ASSOC) ) {
										  $idPaciente =$fila['IdPaciente'];
									}
							}	

							if($cursor1 === false) {
								die( print_r( sqlsrv_errors(), true));
							}
							sqlsrv_free_stmt($cursor1);//liberas cursor
							////////averiguar id medico///////////////
							$sqlIdMedico = "SELECT Medicos.IdMedico FROM Medicos WHERE Medicos.NombreMedico LIKE '$medicoCita';";
							$idMedico;
							$cursor2 = sqlsrv_query($conn, $sqlIdMedico);
							if ($cursor2) {
									while( $fila = sqlsrv_fetch_array( $cursor2, SQLSRV_FETCH_ASSOC) ) {
										  $idMedico =$fila['IdMedico'];
									}
							}	

							if($cursor2 === false) {
								die( print_r( sqlsrv_errors(), true));
							}
							sqlsrv_free_stmt($cursor2);//liberas cursor
							/////////////////////////////////////////
							////llenar tabla cita
							$sqlInsercionCita = "INSERT INTO Citas (IdPaciente,IdMedico,NombrePaciente,DireccionPaciente,TelefonoPaciente,DniPaciente,FechaCita,HoraCita,MedicoCita,EspecialidadCita,Comentarios ) 
							VALUES (?,?,?,?,?,?,?,?,?,?,?)";
							//$fechaCita = date_format($fechaCita, 'd/m/y');
							$params2 = array($idPaciente,$idMedico, $nombrePaciente, $direccionPaciente, $telefonoPaciente, $dniPaciente,$fechaCita,$horarioCita,$medicoCita,$especialidadCita, $comentarios);
							$cursor3 = sqlsrv_query($conn, $sqlInsercionCita, $params2);

							if ($cursor3 === false) {
								echo "ha fallado<br>";
								die(print_r(sqlsrv_errors(), true));
							}else{
								echo "Cita INTRODUCIDA"."<br>";
							}

							sqlsrv_free_stmt($cursor3);//liberas cursor
							sqlsrv_close($conn);//cierras conexion
						}
						
					}else{
						echo "INTRODUCE FECHA POSTERIOR A LA ACTUAL<br>";
					}

					}//fin else
				
				//fin de la accion de introducir
				}//
			?>
	
			
	
</body>
</html>