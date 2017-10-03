<?php
session_start();

echo 'Bienvendio a administracion <br />';
//$fechaActual = date('Y m d H:i:s', $_SESSION['instante']);

$fechaActual = date('d m Y', $_SESSION['instante']);
echo $fechaActual;
echo '<br /><a href="Indice.php">Volver a inicio</a>';

//necesito que para haya un evento antes haya un concejal ,un patrocinador y una actividad
//bbdd
$serverName = "USUARIO\SQLEXPRESS"; //serverName\instanceName
$connectionInfo = array("Database" => "Ayuntamiento", "CharacterSet" => "UTF-8");
$conn = sqlsrv_connect($serverName, $connectionInfo);
if ($conn === false) {
	echo "<br>no funciona la conexion <br>";
	die(print_r(sqlsrv_errors(), true));
} else {
	echo "<br>Conectado.<br>";
}

//comprobar que la tabla Concejalia tenga algun registro
$sqlComprobarExistenciaConcejalia1 = "SELECT * FROM Concejalia;";
$ExistenciaConcejalia = false;
$cursorConcejalia = sqlsrv_query($conn, $sqlComprobarExistenciaConcejalia1);
if ($cursorConcejalia) {
	while( $fila = sqlsrv_fetch_array( $cursorConcejalia, SQLSRV_FETCH_ASSOC) ) {
		if($fila != null){
			$ExistenciaConcejalia = true;
		}			  
	}
}

//comprobar que la tabla Concejalia tenga algun registro
$sqlComprobarExistenciaPatrocinador1 = "SELECT * FROM Patrocinador;";
$ExistenciaPatrocinador = false;
$cursorPatrocinador = sqlsrv_query($conn, $sqlComprobarExistenciaPatrocinador1);
if ($cursorPatrocinador) {
	while( $fila = sqlsrv_fetch_array( $cursorPatrocinador, SQLSRV_FETCH_ASSOC) ) {
		if($fila != null){
			$ExistenciaPatrocinador = true;
		}			  
	}
}

//comprobar que la tabla Concejalia tenga algun registro
$sqlComprobarExistenciaActividad1 = "SELECT * FROM Actividad;";
$ExistenciaActividad = false;
$cursorActividad = sqlsrv_query($conn, $sqlComprobarExistenciaActividad1);
if ($cursorActividad) {
	while( $fila = sqlsrv_fetch_array( $cursorActividad, SQLSRV_FETCH_ASSOC) ) {
		if($fila != null){
			$ExistenciaActividad = true;
		}			  
	}
}

if(!$ExistenciaConcejalia || $ExistenciaPatrocinador || $ExistenciaActividad ) {
	echo "<p>Para rellenar el formulario de concejalia es necesario antes que existan por lo menos un concejal, un patrocinador y una actividad.</p> ";
	echo "<p><a href='Indice.php'>Vuelve al indice</a>.</p> ";
}
?>
<html>
	<head>
		<title>Formulario Eventos</title>
	</head>

	
<body> 
	<h1>Meter Eventos</h1>
		<form name="input" method="post">
			<table>			
				<caption>Datos del evento</caption>
				
				<tr>
					<td>
						<b>Nombre del evento</b>
					</td>
					<td>
						<input type="text" value="" name="nombreEvento"><br>	
					</td>
				</tr>
				<tr>
					<td>
						<b>Meter descripcion del evento</b>
					</td>
					<td>
						<input type="text" value="" name="descripcionEvento"><br>	
					</td>
				</tr>
				<tr>
					<td>
						<b>Meter fecha y hora del evento</b>
					</td>
					<td>
						<input type="date" value="" name="fechaEvento"><br>	
					</td>
				</tr>
				<tr>
					<td>
						<b>Meter lugar del evento</b>
					</td>
					<td>
						<input type="text" value="" name="lugarEvento"><br>	
					</td>
				</tr>
				<tr>
					<td>
						<b>Meter nombre de Actividad que le corresponde</b>
					</td>
					<td>
						<input type="text" value="" name="nombreActividad"><br>	
					</td>
				</tr>
				<tr>
					<td>
						<b>Meter nombre del concejal organizador</b>
					</td>
					<td>
						<input type="text" value="" name="nombreConceOrganiza"><br>	
					</td>
				</tr>
				<tr>
					<td>
						<b>Meter nombre del patrocinador</b>
					</td>
					<td>
						<input type="text" value="" name="nombrePatrocina"><br>	
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
				if(empty($_POST['nombreEvento'])) {
					echo "<p>Es necesario que completes el nombre del evento.</p> ";
				}elseif(empty($_POST['descripcionEvento'])) {
					echo "<p>Es necesario que completes la descripcion del evento.</p> ";
				}elseif(empty($_POST['fechaEvento'])) {
					echo "<p>Es necesario que completes la fecha del evento.</p> ";
				}elseif(empty($_POST['lugarEvento'])) {
					echo "<p>Es necesario que completes el lugar del evento.</p> ";
				}elseif(empty($_POST['nombreActividad'])) {
					echo "<p>Es necesario que completes el nombre de la Actividad.</p> ";
				}elseif(empty($_POST['nombreConceOrganiza'])) {
					echo "<p>Es necesario que completes el nombre del concejal encargado.</p> ";
				}elseif(empty($_POST['nombrePatrocina'])) {
					echo "<p>Es necesario que completes el nombre del patrocinador.</p> ";
				}else{
					//en caso de estar completados los pasamos valores a las variables mediante el metodo POST
					$nombreEvento = $_POST['nombreEvento'];
					$descripcionEvento = $_POST['descripcionEvento'];
					$fechaEvento = $_POST['fechaEvento'];
					$lugarEvento = $_POST['lugarEvento'];
					$nombreActividad = $_POST['nombreActividad'];
					$nombreConceOrganiza = $_POST['nombreConceOrganiza'];
					$nombrePatrocina = $_POST['nombrePatrocina'];
					
					//recorrer para mostrar					
					echo "<table border='1'>";
					echo "<caption>DATOS DEL</caption>";
						echo "<tr>";
							echo "<td>";
								echo "Nombre del evento"."<br>";
								echo $nombreEvento."<br>";
							echo "</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>";
								echo "Descripcion del evento"."<br>";
								echo $descripcionEvento."<br>";
							echo "</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>";
								echo "Fecha del evento"."<br>";
								echo $fechaEvento."<br>";
							echo "</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>";
								echo "Lugar del evento"."<br>";
								echo $lugarEvento."<br>";
							echo "</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>";
								echo "Nombre de la actividad relacionada"."<br>";
								echo $nombreActividad."<br>";
							echo "</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>";
								echo "Nombre del concejal organizador"."<br>";
								echo $nombreConceOrganiza."<br>";
							echo "</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>";
								echo "Nombre del Patrocinador organizador"."<br>";
								echo $nombrePatrocina."<br>";
							echo "</td>";
						echo "</tr>";
					echo "</table>";

					//comprobamos que el evento no existe
					$sqlComprobarEventoExiste = "SELECT * FROM Evento";
					$nombreEventoComprobar;
					$ComprobarExiste = true;
					$cursor0 = sqlsrv_query($conn, $sqlComprobarEventoExiste);
					if ($cursor0) {
						while( $fila = sqlsrv_fetch_array( $cursor0, SQLSRV_FETCH_ASSOC) ) {
							  $nombreEventoComprobar=$fila['nombre'];
							  if($nombreEvento == $nombreEventoComprobar){
								  $ComprobarExiste = false;
							  }
						}
					}
					
					//sacamos el id de la Actividad
					$sqlComprobarActividadExiste = "SELECT * FROM Actividad WHERE nombre = '" .$nombreActividad ."';";
					$ComprobarActividadExiste = false;
					$idActividad;
					//Sacamos tambien la fecha inicio y fecha fin
					$fechaInicio;
					$fechaFin;
					$cursor1 = sqlsrv_query($conn, $sqlComprobarActividadExiste);
					if ($cursor1) {
						while( $fila = sqlsrv_fetch_array( $cursor1, SQLSRV_FETCH_ASSOC) ) {
							if($fila != null){
								$idActividad=$fila['id'];
								$fechaInicio=$fila['fInicio'];
								$fechaFin=$fila['fFin'];
								$ComprobarActividadExiste = true;
							}
							  
						}
					}
					
					//sacamos el id del concejal
					$sqlComprobarConcejalExiste = "SELECT * FROM Concejalia WHERE nombre = '" .$nombreConceOrganiza ."';";
					$ComprobarConcejalExiste = false;
					$idConcejal;
					$cursor2 = sqlsrv_query($conn, $sqlComprobarConcejalExiste);
					if ($cursor2) {
						while( $fila = sqlsrv_fetch_array( $cursor2, SQLSRV_FETCH_ASSOC) ) {
							if($fila != null){
							  $idConcejal=$fila['id'];
							  $ComprobarConcejalExiste = true;
							}
						}
					}
			
					//sacamos el id del Patrocinador
					$sqlComprobarPatrocinadorExiste = "SELECT * FROM Patrocinador WHERE nombre = '" .$nombrePatrocina ."';";
					$ComprobarPatrocinadorExiste = false;
					$idPatrocinador;
					$cursor3 = sqlsrv_query($conn, $sqlComprobarPatrocinadorExiste);
					if ($cursor3) {
						while( $fila = sqlsrv_fetch_array( $cursor3, SQLSRV_FETCH_ASSOC) ) {
							if($fila != null){
							  $idPatrocinador=$fila['id'];
							  $ComprobarPatrocinadorExiste = true;
							}							  
						}
					}
						
					//para cambiar la fecha a formato
					$fechaActual = date("Y-m-d H:i:s");
					$fechaInicio = date_format($fechaInicio, 'Y-m-d H:i:s');
					$fechaFin = date_format($fechaFin, 'Y-m-d H:i:s');

					//HACEMOS LAS COMPROBACIONES
					if(!$ComprobarExiste){
						echo "El evento ya existe. Introduce otro. ";
					}elseif(!$ComprobarActividadExiste){
						echo "La actividad no existe. ";
					}elseif(!$ComprobarConcejalExiste){
						echo "El concejal no existe. ";
					}elseif(!$ComprobarPatrocinadorExiste){
						echo "El Patrocinador no existe. ";
					}elseif($fechaEvento < $fechaActual ){
						echo "La fecha del evento no puede ser menor que la fecha actual. ";
					}elseif(($fechaEvento < $fechaInicio) || ($fechaEvento > $fechaFin) ){
						echo "La fecha del evento no puede ser ni mayor que la fecha fin ni menor que la fecha de inicio de la actividad relacionada. ";
					}else{
						//sacamos fecha de la Actividad
						$sqlComprobarActividadFecha = "SELECT * FROM Actividad WHERE nombre = '" .$nombreActividad ."';";
						$fechaActividad;
						$cursor121 = sqlsrv_query($conn, $sqlComprobarActividadExiste);
						if ($cursor121) {
							while( $fila = sqlsrv_fetch_array( $cursor121, SQLSRV_FETCH_ASSOC) ) {
								if($fila != null){
									$fechaActividad = date_format($fila['fInicio'], 'y/m/d');
								}
								  
							}
						}
						
						if($fechaEvento >= $fechaActividad){
						
							//introducir evento
							$sqlInsercionEvento = "INSERT INTO Evento (nombre, descripcion, fyh,lugar,idActividad,idConceOrganiza,idPatrocina) VALUES ( ?, ?, ?, ?, ?, ?, ?)";

							$params = array($nombreEvento, $descripcionEvento, $fechaEvento,$lugarEvento,$idActividad,$idConcejal,$idPatrocinador);
							$cursor4 = sqlsrv_query($conn, $sqlInsercionEvento, $params);

							if ($cursor4 === false) {
								echo "ha fallado<br>";
								die(print_r(sqlsrv_errors(), true));
							}else{
								echo "Evento introducido con exito"."<br>";
							}
							sqlsrv_free_stmt($cursor4);//liberas cursor
							
						}else{
							echo "La fecha del evento no puede ser mayor que la de la actividad que le corresponde";
						}
	
					}//fin else

						sqlsrv_close($conn);//cierras conexion

					}//fin else
				
				//fin de la accion de introducir
				}
				//FIN  SESION////////
				session_destroy();
			?>
	
			
	
</body>
</html>