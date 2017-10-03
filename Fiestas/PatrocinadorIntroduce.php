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
		<title>Formulario Patrocinador</title>
	</head>

	
<body> 
	<h1>Meter Autoridad</h1>
		<form name="input" method="post">
			<table>			
				<caption>Datos del Patrocinador</caption>				
				<tr>
					<td>
						<b>Nombre del Patrocinador</b>
					</td>
					<td>
						<input type="text" value="" name="nombrePatrocinador"><br>	
					</td>
				</tr>
				
				<tr>
					<td>
						<b>Cantidad aportada por el patrocinador</b>
					</td>
					<td>
						<input type="text" value="" name="cantidadPatrocinador"><br>
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
				if(empty($_POST['nombrePatrocinador'])) {
					echo "<p>Es necesario que completes el nombre del patrocinador.</p> ";
				}
				elseif(empty($_POST['cantidadPatrocinador'])) {
					echo "<p>Es necesario que completes la cantidad aportada por el patrocinador.</p> ";
				}
				else{
					//en caso de estar completados los pasamos valores a las variables mediante el metodo POST
					$nombrePatrocinador = $_POST['nombrePatrocinador'];
					$cantidadPatrocinador = $_POST['cantidadPatrocinador'];          
					
					//recorrer					
					echo "<table border='1'>";
					echo "<caption>DATOS DEL</caption>";
						echo "<tr>";
							echo "<td>";
								echo "Nombre del Patrocinador"."<br>";
								echo $nombrePatrocinador."<br>";
							echo "</td>";
						echo "</tr>";
						echo "<tr>";
							echo "<td>";
								echo "Cantidad aportada por el patrocinador"."<br>";
								echo $cantidadPatrocinador."<br>";
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
					echo "Patrocinador introducido"."<br>";
					//comprobamos que la autoridad no existe
					$sqlComprobarAutoridadExiste = "SELECT * FROM Patrocinador";
					$nombre;
					$cantidad;
					$ComprobarExiste = true;
					$cursor0 = sqlsrv_query($conn, $sqlComprobarAutoridadExiste);
					if ($cursor0) {
						while( $fila = sqlsrv_fetch_array( $cursor0, SQLSRV_FETCH_ASSOC) ) {
							  $nombre=$fila['nombre'];
							  $cantidad =$fila['cantidad'];
							  if($nombre == $nombrePatrocinador){
								  if($cantidad == $cantidadPatrocinador){
										  $ComprobarExiste = false;
								  }  
							  }
							  
						}
					}
					sqlsrv_free_stmt($cursor0);//liberas cursor
					
					
					if($ComprobarExiste){
						//llenar tabla patrocinador
						/////////////////////////////////
						$sqlInsercionPatrocinador = "INSERT INTO Patrocinador (nombre, cantidad) VALUES (?, ?)";

						$params = array($nombrePatrocinador, $cantidadPatrocinador);
						$cursor1 = sqlsrv_query($conn, $sqlInsercionPatrocinador, $params);

						if ($cursor1 === false) {
							echo "ha fallado<br>";
							die(print_r(sqlsrv_errors(), true));
						}else{
							echo "Patrocinador introducido con exito"."<br>";
						}
						sqlsrv_free_stmt($cursor1);//liberas cursor

						
						
					}else{
						echo "Patrocinador introducido ya existe"."<br>";
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