<?php
session_start();

echo 'Bienvendio a administracion <br />';
//$fechaActual = date('Y m d H:i:s', $_SESSION['instante']);

$fechaActual = date('d m Y', $_SESSION['instante']);
echo $fechaActual;
echo '<br /><a href="Indice.php">Volver a inicio</a>';
//bbdd
$serverName = "USUARIO\SQLEXPRESS"; //serverName\instanceName
$connectionInfo = array("Database" => "Ayuntamiento", "CharacterSet" => "UTF-8");
$conn = sqlsrv_connect($serverName, $connectionInfo);
if ($conn === false) {
	echo "no funciona la conexion <br>";
	die(print_r(sqlsrv_errors(), true));
} else {
	echo "<br>Conectado.<br>";
}

//comprobar que haya eventos antes de rellenar participantes
$sqlComprobarExistenciaEventos = "SELECT * FROM Evento;";
$ExistenciaEventos = false;
$cursorEventos = sqlsrv_query($conn, $sqlComprobarExistenciaEventos);
if ($cursorEventos) {
	while( $fila = sqlsrv_fetch_array( $cursorEventos, SQLSRV_FETCH_ASSOC) ) {
		if($fila != null){
			$ExistenciaEventos = true;
		}			  
	}
}

if(!$ExistenciaEventos) {
	echo "<p>Para rellenar el formulario de participantes es necesario antes que existan eventos.</p> ";
	echo "<p>Introduce por lo menos un evento para poder rellenar al formulario de participante.</p> ";
	echo "<p><a href='EventoIntroduce.php'>Formulario Eventos</a>.</p> ";
}
?>
<html>
	<head>
		<title>Formulario Participante</title>
	</head>

	
<body> 
	<h1>Meter Participante</h1>
		<form name="input" method="post">
			<table>			
				<caption>Datos del Participante</caption>				
				<tr>
					<td>
						<b>Nombre del Participante</b>
					</td>
					<td>
						<input type="text" value="" name="nombreParticipante"><br>	
					</td>
				</tr>
				
				<tr>
					<td>
						<b>Nombre del evento en que participa</b>
					</td>
					<td>
						<input type="text" value="" name="nombreEvento"><br>
					</td>
				</tr>
			</table>
			
		</table>

		<input type="submit" name="Agregar" value="Agregar"/>
		</form>
		<a href="Indice.php">Vuelve atras</a>

		
			<!-- empieza el php -->
			<?php
			//SI LE DAMOS AL BOTON AGREGAR
			if(isset($_POST['Agregar'])) {	 
				
				//Comprobamos que los datos esten completados y no este vacio
				if(empty($_POST['nombreParticipante'])) {
					echo "<p>Es necesario que completes el nombre del participante.</p> ";
				}
				elseif(empty($_POST['nombreEvento'])) {
					echo "<p>Es necesario que completes el nombre del evento en que participa.</p> ";
				}
				elseif(!$ExistenciaEventos){
					echo "<p>Es necesario que para poner participantes antes haya un evento por lo menos.</p> ";
				}
				else{
					//en caso de estar completados los pasamos valores a las variables mediante el metodo POST
					$nombreParticipante = $_POST['nombreParticipante'];
					$nombreEvento = $_POST['nombreEvento'];          
					
					//recorrer					
					echo "<table border='1'>";
					echo "<caption>DATOS DEL</caption>";
						echo "<tr>";
							echo "<td>";
								echo "Nombre del Participante"."<br>";
								echo $nombreParticipante."<br>";
							echo "</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>";
								echo "Evento en el que participa"."<br>";
								echo $nombreEvento."<br>";
							echo "</td>";
						echo "</tr>";						
					echo "</table>";

					//bbdd
					$serverName = "USUARIO\SQLEXPRESS"; //serverName\instanceName
					$connectionInfo = array("Database" => "Ayuntamiento", "CharacterSet" => "UTF-8");
					$conn = sqlsrv_connect($serverName, $connectionInfo);
					if ($conn === false) {
						echo "no funciona la conexion <br>";
						die(print_r(sqlsrv_errors(), true));
					} else {
						echo "Conectado.<br>";
					}

					//comprobamos que el evento  existe
					$sqlComprobarEventoExiste1 = "SELECT * FROM Evento";
					$nombre;//para comprobar el nombre
				    $idEvento;
					$ComprobarExiste = false;
					$cursor1 = sqlsrv_query($conn, $sqlComprobarEventoExiste1);
					if ($cursor1) {
						while( $fila = sqlsrv_fetch_array( $cursor1, SQLSRV_FETCH_ASSOC) ) {
							  $nombre=$fila['nombre'];
							  if($nombre == $nombreEvento){
									$ComprobarExiste = true;
									$idEvento=$fila['id'];
							  }
							  
						}
					}
					
					sqlsrv_free_stmt($cursor1);//liberas cursor
					
					if($ComprobarExiste){
						//sacamos el id del participante////////////////
						$sqlSacarIdParticipante = "SELECT id FROM Participante WHERE nombre = '".$nombreParticipante."';";
						$idParticipante22;
						$comprobarFila= false;
						$cursor33 = sqlsrv_query($conn, $sqlSacarIdParticipante);
						if ($cursor33) {
							while( $fila = sqlsrv_fetch_array( $cursor33, SQLSRV_FETCH_ASSOC) ) {
									if($fila != null){
										$comprobarFila= true;
										$idParticipante22=$fila['id'];
									}
							}
						}
						
						$ComprobarExisteParti = false;
						
						if($comprobarFila){
							echo "El participante está apuntado a más eventos"."<br>";
							//comprobamos que el participante no está ya apuntado a ese evento
							$sqlComprobarParticipanteExiste = "SELECT * FROM Participa";
							$idParticip;
							$idEventoParti;
							
							$cursor0 = sqlsrv_query($conn, $sqlComprobarParticipanteExiste);
							if ($cursor0) {
								while( $fila = sqlsrv_fetch_array( $cursor0, SQLSRV_FETCH_ASSOC) ) {
									  $idEventoParti=$fila['idEvento'];
									  $idParticip=$fila['idParticipante'];
									  if($idEventoParti == $idEvento && $idParticipante22 == $idParticip){
											$ComprobarExisteParti = true;
									  }
									  
								}
							}
						}
					}
						
					
					if(!$ComprobarExiste){
						echo "El evento introducido no existe"."<br>";
					}elseif($ComprobarExisteParti){
						echo "El participante está apuntado ya a ese evento"."<br>";
					}
					else{
						if(!$comprobarFila){
							//llenar tabla Participante
							/////////////////////////////////
							$sqlInsercionParticipante = "INSERT INTO Participante (nombre) VALUES (?)";

							$params = array($nombreParticipante);
							$cursor2 = sqlsrv_query($conn, $sqlInsercionParticipante, $params);

							if ($cursor2 === false) {
								echo "ha fallado<br>";
								die(print_r(sqlsrv_errors(), true));
							}else{
								echo "Participante introducido con exito"."<br>";
							}
							sqlsrv_free_stmt($cursor2);//liberas cursor
							///////////////////////////////////////
						}
						
						//sacamos el id del participante////////////////
						$sqlSacarIdParticipante = "SELECT * FROM Participante";
						$idParticipante;
						$cursor3 = sqlsrv_query($conn, $sqlSacarIdParticipante);
						if ($cursor3) {
							while( $fila = sqlsrv_fetch_array( $cursor3, SQLSRV_FETCH_ASSOC) ) {
								  $nombre=$fila['nombre'];
								  if($nombre == $nombreParticipante){
										$idParticipante=$fila['id'];
								  }
								  
							}
						}
						
						sqlsrv_free_stmt($cursor3);//liberas cursor
						////////////////////////////////
						//llenar tabla Participa
						/////////////////////////////////
						$sqlInsercionParticipa = "INSERT INTO Participa (idEvento,idParticipante) VALUES (?,?)";
						
						$params = array($idEvento,$idParticipante);
						$cursor4 = sqlsrv_query($conn, $sqlInsercionParticipa, $params);

						if ($cursor4 === false) {
							echo "ha fallado<br>";
							die(print_r(sqlsrv_errors(), true));
						}else{
							echo "Tabla participa introducida con exito"."<br>";
						}
						sqlsrv_free_stmt($cursor4);//liberas cursor
						//////////////////////////////////////////

					}
						
						
						
						sqlsrv_close($conn);//cierras conexion
						

					}//fin else
				
				//fin de la accion de introducir
				}
				//FIN  SESION////////
				session_destroy();
			?>
	
			
	
</body>
</html>