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
		<title>Formulario Autoridad</title>
	</head>

	
<body> 
	<h1>Meter Autoridad</h1>
		<form name="input" method="post">
			<table>			
				<caption>Datos de la actividad</caption>
				
				<tr>
					<td>
						<b>Nombre de la Autoridad</b>
					</td>
					<td>
						<input type="text" value="" name="nombreAutoridad"><br>	
					</td>
				</tr>
				
				<tr>
					<td>
						<b>Cargo de la Autoridad:</b>
					</td>
					<td>
						<input type="text" value="" name="cargoAutoridad"><br>
					</td>
				</tr>
				
				<tr>
					<td>
						<b>Partido de la Autoridad:</b>
					</td>
					<td>
						<input type="text" value="" name="partidoAutoridad"><br>
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
				if(empty($_POST['nombreAutoridad'])) {
					echo "<p>Es necesario que completes el nombre de la autoridad.</p> ";
				}
				elseif(empty($_POST['cargoAutoridad'])) {
					echo "<p>Es necesario que completes el cargo de la autoridad.</p> ";
				}
				elseif(empty($_POST['partidoAutoridad'])) {
					echo "<p>Es necesario que completes el partido de la autoridad</p> ";
				}else{
					//en caso de estar completados los pasamos valores a las variables mediante el metodo POST
					$nombreAutoridad = $_POST['nombreAutoridad'];
					$cargoAutoridad = $_POST['cargoAutoridad'];
					$partidoAutoridad = $_POST['partidoAutoridad'];           
					
					//recorrer					
					echo "<table border='1'>";
					echo "<caption>DATOS DEL</caption>";
						echo "<tr>";
							echo "<td>";
								echo "Nombre de la autoridad"."<br>";
								echo $nombreAutoridad."<br>";
							echo "</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>";
								echo "Cargo de la autoridad"."<br>";
								echo $cargoAutoridad."<br>";
							echo "</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>";
								echo "Partido de la autoridad"."<br>";
								echo $partidoAutoridad."<br>";
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
					echo "Autoridad introducida"."<br>";
					//comprobamos que la autoridad no existe
					$sqlComprobarAutoridadExiste = "SELECT * FROM Autoridad";
					$nombre;
					$cargo;
					$partido;
					$ComprobarExiste = true;
					$cursor0 = sqlsrv_query($conn, $sqlComprobarAutoridadExiste);
					if ($cursor0) {
						while( $fila = sqlsrv_fetch_array( $cursor0, SQLSRV_FETCH_ASSOC) ) {
							  $nombre=$fila['nombre'];
							  $cargo =$fila['cargo'];
							  $partido =$fila['Partido'];
							  if($nombre == $nombreAutoridad){
								  if($cargo == $cargoAutoridad){
									  if($partido == $partidoAutoridad){
										  $ComprobarExiste = false;
									  }
								  }
							  }
							  
						}
					}
					sqlsrv_free_stmt($cursor0);//liberas cursor
					
					
					if($ComprobarExiste){
						//llenar tabla autoridad
						/////////////////////////////////
						$sqlInsercionAutoridad = "INSERT INTO Autoridad (nombre, cargo, Partido) VALUES ( ?, ?, ?)";

						$params = array($nombreAutoridad, $cargoAutoridad, $partidoAutoridad);
						$cursor1 = sqlsrv_query($conn, $sqlInsercionAutoridad, $params);

						if ($cursor1 === false) {
							echo "ha fallado<br>";
							die(print_r(sqlsrv_errors(), true));
						}else{
							echo "Autoridad introducida con exito"."<br>";
						}
						sqlsrv_free_stmt($cursor1);//liberas cursor

						
						
					}else{
						echo "Autoridad introducida ya existia"."<br>";
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