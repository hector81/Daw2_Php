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
		<title>Formulario Tablas</title>
	</head>

	
<body> 
	<h1>Meter tabla</h1>
		<form name="input" method="post">
			<table>							
				<tr>
					<td>
						<b>Nombre de la tabla</b>
					</td>
					<td>
						<input type="text" value="" name="nombreTabla"><br>	
					</td>
				</tr>

			</table>
			
		</table>
		<p>Nombres de las tablas: Actividad, Autoridad, Concejalia, Evento, Participante, Patrocinador .</p>
		<input type="submit" name="Agregar" value="Agregar"/>
		</form>
		<a href="Indice.php">Vuelve atras</a>

		
			<!-- empieza el php -->
			<?php
			//SI LE DAMOS AL BOTON AGREGAR
			if(isset($_POST['Agregar'])) {	 
				
				//Comprobamos que los datos esten completados y no este vacio
				if(empty($_POST['nombreTabla'])) {
					echo "<p>Es necesario poner la tabla.</p> ";
				}

				else{
					//en caso de estar completados los pasamos valores a las variables mediante el metodo POST
					$nombreTabla = $_POST['nombreTabla'];    
					
					//recorrer					
					echo "<table border='1'>";
					echo "<caption>DATOS DEL</caption>";
						echo "<tr>";
							echo "<td>";
								echo "Nombre de la tabla"."<br>";
								echo $nombreTabla."<br>";
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
					
					if($nombreTabla != 'Actividad' && $nombreTabla != 'Autoridad' && $nombreTabla != 'Concejalia' && $nombreTabla != 'Evento' && $nombreTabla != 'Participante' 
					&& $nombreTabla != 'Patrocinador'){
						echo "Pon bien el nombre de la tabla"."<br>";
					}else{
						if($nombreTabla == 'Actividad'){
							$sql = "SELECT id, nombre, descripcion, fInicio, fFin FROM Actividad";
							$cursor0 = sqlsrv_query($conn, $sql);						
							if ($cursor0) {
								while( $fila = sqlsrv_fetch_array( $cursor0, SQLSRV_FETCH_ASSOC) ) {
									$fecha1 =$fila['fInicio'];
									$fecha2 = $fila['fFin'];
									$fecha1 = date("Y-m-d H:i:s"); 
									$fecha2 = date("Y-m-d H:i:s"); 
									echo "<table border='1'>";
									echo "<tr><th>id</th>";
									echo "<th>nombre</th>";
									echo "<th>descripcion</th>";
									echo "<th>fInicio</th>";
									echo "<th>fFin</th></tr>";
									/////////////////////////////
									echo "<tr>";
									echo "<td>".$fila['id']."</td>";
									echo "<td>".$fila['nombre']."</td>";
									echo "<td>".$fila['descripcion']."</td>";
									echo "<td>".$fecha1."</td>";
									echo "<td>".$fecha2."</td>";
									echo "</tr>";
									echo "</table>";  
									  
								}
							}

							
						}
						if($nombreTabla == 'Autoridad'){
							$sql = "SELECT id, nombre, cargo, Partido FROM Autoridad";
							$cursor0 = sqlsrv_query($conn, $sql);						
							if ($cursor0) {
								while( $fila = sqlsrv_fetch_array( $cursor0, SQLSRV_FETCH_ASSOC) ) {
									echo "<table border='1'>";
									echo "<tr><th>id</th>";
									echo "<th>nombre</th>";
									echo "<th>cargo</th>";
									echo "<th>Partido</th>";
									echo "</tr>";
									/////////////////////////////
									echo "<tr>";
									echo "<td>".$fila['id']."</td>";
									echo "<td>".$fila['nombre']."</td>";
									echo "<td>".$fila['cargo']."</td>";
									echo "<td>".$fila['Partido']."</td>";
									echo "</tr>";
									echo "</table>";  
									  
								}
							}
						}
						if($nombreTabla == 'Concejalia'){
							$sql = "SELECT id, nombre, descripcion, idAutoridad FROM Concejalia";
							$cursor0 = sqlsrv_query($conn, $sql);						
							if ($cursor0) {
								while( $fila = sqlsrv_fetch_array( $cursor0, SQLSRV_FETCH_ASSOC) ) {
									echo "<table border='1'>";
									echo "<tr><th>id</th>";
									echo "<th>nombre</th>";
									echo "<th>descripcion</th>";
									echo "<th>idAutoridad</th>";
									echo "</tr>";
									/////////////////////////////
									echo "<tr>";
									echo "<td>".$fila['id']."</td>";
									echo "<td>".$fila['nombre']."</td>";
									echo "<td>".$fila['descripcion']."</td>";
									echo "<td>".$fila['idAutoridad']."</td>";
									echo "</tr>";
									echo "</table>";  
									  
								}
							}
						}
						if($nombreTabla == 'Evento'){
							$sql = "SELECT id, nombre, descripcion, fyh,lugar,idActividad,idConceOrganiza,idPatrocina FROM Evento";
							$cursor0 = sqlsrv_query($conn, $sql);						
							if ($cursor0) {
								while( $fila = sqlsrv_fetch_array( $cursor0, SQLSRV_FETCH_ASSOC) ) {
									$fecha1 =$fila['fyh'];
									$fecha1 = date("Y-m-d H:i:s"); 
									echo "<table border='1'>";
									echo "<tr><th>id</th>";
									echo "<th>nombre</th>";
									echo "<th>descripcion</th>";
									echo "<th>fyh</th>";
									echo "<th>lugar</th>";
									echo "<th>idActividad</th>";
									echo "<th>idConceOrganiza</th>";
									echo "<th>idPatrocina</th></tr>";
									/////////////////////////////
									echo "<tr>";
									echo "<td>".$fila['id']."</td>";
									echo "<td>".$fila['nombre']."</td>";
									echo "<td>".$fila['descripcion']."</td>";
									echo "<td>".$fecha1."</td>";
									echo "<td>".$fila['lugar']."</td>";
									echo "<td>".$fila['idActividad']."</td>";
									echo "<td>".$fila['idConceOrganiza']."</td>";
									echo "<td>".$fila['idPatrocina']."</td>";
									echo "</tr>";
									echo "</table>";  
									  
								}
							}
						}
						if($nombreTabla == 'Participante'){
							$sql = "SELECT id, nombre FROM Participante";
							$cursor0 = sqlsrv_query($conn, $sql);						
							if ($cursor0) {
								while( $fila = sqlsrv_fetch_array( $cursor0, SQLSRV_FETCH_ASSOC) ) { 
									echo "<table border='1'>";
									echo "<tr><th>id</th>";
									echo "<th>nombre</th></tr>";
									/////////////////////////////
									echo "<tr>";
									echo "<td>".$fila['id']."</td>";
									echo "<td>".$fila['nombre']."</td>";
									echo "</tr>";
									echo "</table>";  
									  
								}
							}
						}
						if($nombreTabla == 'Patrocinador'){
							$sql = "SELECT id, nombre, cantidad FROM Patrocinador";
							$cursor0 = sqlsrv_query($conn, $sql);						
							if ($cursor0) {
								while( $fila = sqlsrv_fetch_array( $cursor0, SQLSRV_FETCH_ASSOC) ) {
									echo "<table border='1'>";
									echo "<tr><th>id</th>";
									echo "<th>nombre</th>";
									echo "<th>cantidad</th></tr>";
									/////////////////////////////
									echo "<tr>";
									echo "<td>".$fila['id']."</td>";
									echo "<td>".$fila['nombre']."</td>";
									echo "<td>".$fila['cantidad']."</td>";
									echo "</tr>";
									echo "</table>";  
									  
								}
							}
						}
					
					}
					
					
					echo "</table>";
					
					
					
					sqlsrv_close($conn);//cierras conexion

					}//fin else
				
				//fin de la accion de introducir
				}
				//FIN  SESION////////
				session_destroy();
			?>
	
			
	
</body>
</html>