<?php
session_start();

echo 'Bienvendio a administracion <br />';
//$fechaActual = date('Y m d H:i:s', $_SESSION['instante']);

$fechaActual = date('d m Y', $_SESSION['instante']);
echo $fechaActual;
echo '<br /><a href="Indice.php">Volver a inicio</a>';
?>
<html>
	<head>
		<title>Formulario Actividad</title>
	</head>

	
<body> 
	<h1>Meter Actividad</h1>
		<form name="input" method="post">
			<table>			
				<caption>Datos de la actividad</caption>
				
				<tr>
					<td>
						<b>Nombre de la actividad</b>
					</td>
					<td>
						<input type="text" value="" name="nombreActividad"><br>	
					</td>
				</tr>
				
				<tr>
					<td>
						<b>Descripción de la actividad:</b>
					</td>
					<td>
						<input type="text" value="" name="descripcionActividad"><br>
					</td>
				</tr>
				
				<tr>
					<td>
						<b>Fecha inicial de la actividad</b>
					</td>
					<td>
						<input type="date" value="" name="fInicialActividad"><br>
					</td>
				</tr>
				
				<tr>
					<td>
						<b>Fecha final de la actividad</b>
					</td>
					<td>
						<input type="date" value="" name="fFinalActividad"><br>
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
				if(empty($_POST['nombreActividad'])) {
					echo "<p>Es necesario que completes el nombre de la actividad.</p> ";
				}
				elseif(empty($_POST['descripcionActividad'])) {
					echo "<p>Es necesario que completes la descripción de la actividad.</p> ";
				}
				elseif(empty($_POST['fInicialActividad'])) {
					echo "<p>Es necesario que completes la fecha de inicio de la actividad.</p> ";
				}elseif(empty($_POST['fFinalActividad'])) {
					echo "<p>Es necesario que completes la fecha de fin de la actividad.</p> ";
				}else{
					//en caso de estar completados los pasamos valores a las variables mediante el metodo POST
					$nombreActividad = $_POST['nombreActividad'];
					$descripcionActividad = $_POST['descripcionActividad'];
					$fInicialActividad = $_POST['fInicialActividad'];           
					$fFinalActividad = $_POST['fFinalActividad']; 
					
					//recorrer					
					echo "<table border='1'>";
					echo "<caption>DATOS DEL</caption>";
						echo "<tr>";
							echo "<td>";
								echo "Nombre de la actividad"."<br>";
								echo $nombreActividad."<br>";
							echo "</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>";
								echo "Descripción de la actividad"."<br>";
								echo $descripcionActividad."<br>";
							echo "</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>";
								echo "fInicialActividad"."<br>";
								echo $fInicialActividad."<br>";
							echo "</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>";
								echo "fFinalActividad"."<br>";
								echo $fFinalActividad."<br>";
							echo "</td>";
						echo "</tr>";						
					echo "</table>";
					
					//para cambiar la fecha a formato
					$fechaActual = date("Y-m-d");				

					//comprobamos fechas
					if($fInicialActividad < $fechaActual) {
						echo "<p>No puedes poner una actividad con fecha de inicio con fecha menor de hoy.</p> ";
					}elseif($fFinalActividad < $fechaActual ) {
						echo "<p>No puedes poner una actividad con fecha de fin con fecha menor de hoy.</p> ";
					}elseif($fInicialActividad > $fFinalActividad ) {
						echo "<p>La fecha de fin no puede ser menor que la de inicio de la actividad</p> ";
					}else{
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
						echo "Actividad introducida"."<br>";

						//hacemos una consulta para saber
						$sql = "SELECT fFinal
						FROM Actividad;";

		
						$cursor1 = sqlsrv_query($conn, $sql);
						//llenar tabla actividad
						/////////////////////////////////
						$sqlInsercionActividad = "INSERT INTO Actividad (nombre, descripcion, fInicio, fFin) VALUES ( ?, ?, ?, ?)";

						//$fechaCita = date_format($fechaCita, 'd/m/y');
						$params = array($nombreActividad, $descripcionActividad, $fInicialActividad, $fFinalActividad);
						$cursor1 = sqlsrv_query($conn, $sqlInsercionActividad, $params);

						if ($cursor1 === false) {
							echo "ha fallado<br>";
							die(print_r(sqlsrv_errors(), true));
						}else{
							echo "Actividad introducida con exito"."<br>";
						}
						sqlsrv_free_stmt($cursor1);//liberas cursor

						sqlsrv_close($conn);//cierras conexion
					}

					

					}//fin else
				
				//fin de la accion de introducir
				}
				//FIN  SESION////////
				session_destroy();
			?>
	
			
	
</body>
</html>