<?php
session_start();

echo 'Bienvendio a alta a clientes<br />';

echo date('Y m d H:i:s', $_SESSION['instante']);

echo '<br /><a href="Indice.php">Volver a inicio</a><br /><br /><br />';
?>
<html>
	<head>
		<title>FORMULARIO ALTA CLIENTES</title>
	</head>

	
<body> 
		<form name="input" method="post" > <!-- action="ConfirmarPaciente.php" Combos dependientes accesibles -->
			<table>			
				<caption>Datos del cliente</caption>
				
				<tr>
					<td>
						<b>Nombre del cliente</b>
					</td>
					<td>
						<input type="text" value="" name="nombreCliente"><br>	
					</td>
				</tr>
				
				<tr>
					<td>
						<b>Primer apellido del cliente</b>
					</td>
					<td>
						<input type="text" value="" name="apellido1Cliente"><br>	
					</td>
				</tr>
				
				<tr>
					<td>
						<b>Segundo apellido del cliente</b>
					</td>
					<td>
						<input type="text" value="" name="apellido2Cliente"><br> 
					</td>
				</tr>
				
				<tr>
					<td>
						<b>Teléfono del cliente</b>
					</td>
					<td>
						<input type="text" value="" name="telefonoCliente"><br>
					</td>
				</tr>

				<tr>
					<td>
						<b>DNI del cliente</b>
						<b>NO MAS DE 9 CARACTERES</b>
					</td>
					<td>
						<input type="text" value="" name="dniCliente"><br>
					</td>
				</tr>
				
				<tr>
					<td>
						<b>Escoge nombre de usuario</b>
						<b>NO MAS DE 9 CARACTERES</b>
					</td>
					<td>
						<input type="text" value="" name="usuarioCliente"><br>
					</td>
				</tr>
				
				<tr>
					<td>
						<b>Escoge contraseña de usuario</b>
						<b>NO MAS DE 9 CARACTERES</b>
					</td>
					<td>
						<input type="text" value="" name="PASSWORDCliente"><br>
						<br>
					</td>
				</tr>
				
				<tr>
					<td>
						<b>Pon tu dirección</b>
					</td>
					<td>
						<input type="text" value="" name="direccionCliente"><br>
						<br>
					</td>
				</tr>
				
				<tr>
					<td>
						<b>Pon tu ciudad</b>
					</td>
					<td>
						<input type="text" value="" name="ciudadCliente"><br>
					</td>
				</tr>
				
				<tr>
					<td>
						<b>Pon tu provincia</b>
					</td>
					<td>
						<input type="text" value="" name="provinciaCliente"><br>
					</td>
				</tr>
				
				<tr>
					<td>
						<b>Pon tu fecha de nacimiento</b>
					</td>
					<td>
						<input type="text" value="" name="cumpleCliente"><br>
					</td>
				</tr>		
			
		</table>

		<input type="submit" name="Agregar" value="Alta"/>
		</form>
		<?php
			$hoy = date("20y-m-d");
			echo "Día de hoy: ".$hoy."<br>";
			$hoyHora = date("h:i"); 
			echo "Hora de hoy: ".$hoyHora."<br>";
		
			//-- empieza el php -->
			
			//SI LE DAMOS AL BOTON AGREGAR
			if(isset($_POST['Agregar'])) {	 
				
				//Comprobamos que los datos esten completados y no este vacio
				if(empty($_POST['nombreCliente'])) {
					echo "<p>Es necesario que completes tu nombre.</p> ";
				}
				elseif(empty($_POST['apellido1Cliente'])) {
					echo "<p>Es necesario que completes tu apellido primero.</p> ";
				}
				elseif(empty($_POST['apellido2Cliente'])) {
					echo "<p>Es necesario que completes tu apellido segundo.</p> ";
				}elseif(empty($_POST['telefonoCliente'])) {
					echo "<p>Es necesario que completes tu telefono.</p> ";
				}elseif(empty($_POST['dniCliente'])) {
					echo "<p>Es necesario que completes tu DNI.</p> ";
				}elseif(empty($_POST['usuarioCliente'])) {
					echo "<p>Es necesario que completes tu nombre de usuario.</p> ";
				}elseif(empty($_POST['PASSWORDCliente'])) {
					echo "<p>Es necesario que completes tu contraseña.</p> ";
				}elseif(empty($_POST['direccionCliente'])) {
					echo "<p>Es necesario que completes tu direccion.</p> ";
				}elseif(empty($_POST['ciudadCliente'])) {
					echo "<p>Es necesario que completes tu ciudad.</p> ";
				}elseif(empty($_POST['provinciaCliente'])) {
					echo "<p>Es necesario que completes tu provincia.</p> ";
				}elseif(empty($_POST['cumpleCliente'])) {
					echo "<p>Es necesario que completes tu fecha de nacimiento.</p> ";
				}else{
													
					//en caso de estar completados los pasamos valores a las variables mediante el metodo POST
					
					
					$nombreCliente = $_POST['nombreCliente'];
					$apellido1Cliente = $_POST['apellido1Cliente'];
					$apellido2Cliente = $_POST['apellido2Cliente'];           
					$telefonoCliente = $_POST['telefonoCliente']; 
					$dniCliente = $_POST['dniCliente']; 
					$usuarioCliente = $_POST['usuarioCliente']; 
					$PASSWORDCliente = $_POST['PASSWORDCliente']; 
					$direccionCliente = $_POST['direccionCliente'];
					$ciudadCliente = $_POST['ciudadCliente'];
					$provinciaCliente = $_POST['provinciaCliente'];
					$cumpleCliente = $_POST['cumpleCliente'];
					
					//bbdd conexion
					$serverName = "C6PC6\SQLEXPRESS"; //serverName\instanceName
					$connectionInfo = array("Database" => "Compras", "CharacterSet" => "UTF-8");
					$conn = sqlsrv_connect($serverName, $connectionInfo);
					if ($conn === false) {
						echo "no funciona la conexion <br>";
						die(print_r(sqlsrv_errors(), true));
					} else {
						echo "Conectado.<br>";
					}
					//comprobamos fecha, dni y hora
					$sqlConsultaUsuarioContraseña = "SELECT Clientes.dniCliente, Clientes.UsuarioCliente FROM Clientes ";
					$CLIENTES_DNI='';
					$CLIENTES_USUARIOS='';
					$clienteExiste= true;
					$cursor0 = sqlsrv_query($conn, $sqlConsultaUsuarioContraseña);
					if ($cursor0) {
							while( $fila = sqlsrv_fetch_array( $cursor0, SQLSRV_FETCH_ASSOC) ) {
								  $CLIENTES_DNI=$fila['dniCliente'];
								  $CLIENTES_USUARIOS =$fila['UsuarioCliente'];
								  if($CLIENTES_DNI == $dniCliente || $CLIENTES_USUARIOS == $usuarioCliente){
									  $clienteExiste = false;
								  }
								  
							}
					}
					sqlsrv_free_stmt($cursor0);//liberas cursor
					
					
					
					if($clienteExiste==false){
						echo "Ya hay un cliente con ese DNI o ese usuario<br>";
					}elseif($clienteExiste == true){
						//recorrer					
						echo "<table border='1'>";
						echo "<caption>DATOS ENVIADOS DEL CLIENTE</caption>";
							echo "<tr>";
								echo "<td>";
									echo "Nombre del cliente"."<br>";
									echo $nombreCliente."<br>";
								echo "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>";
									echo "apellido1Cliente"."<br>";
									echo $apellido1Cliente."<br>";
								echo "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>";
									echo "apellido2Cliente"."<br>";
									echo $apellido2Cliente."<br>";
								echo "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>";
									echo "telefonoCliente"."<br>";
									echo $telefonoCliente."<br>";
								echo "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>";
									echo "dniCliente"."<br>";
									echo $dniCliente."<br>";
								echo "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>";
									echo "usuarioCliente"."<br>";
									echo $usuarioCliente."<br>";
								echo "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>";
									echo "PASSWORDCliente"."<br>";
									echo $PASSWORDCliente."<br>";
								echo "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>";
									echo "direccionCliente"."<br>";
									echo $direccionCliente."<br>";
								echo "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>";
									echo "ciudadCliente"."<br>";
									echo $ciudadCliente."<br>";
								echo "</td>";
							echo "</tr>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>";
									echo "provinciaCliente"."<br>";
									echo $provinciaCliente."<br>";
								echo "</td>";
							echo "</tr>";	
							echo "</tr>";
							echo "<tr>";
								echo "<td>";
									echo "cumpleCliente"."<br>";
									echo $cumpleCliente."<br>";
								echo "</td>";
							echo "</tr>";	
							
						echo "</table>";
						//llenar cliente
						/////////////////////////////////
						$sqlInsercionDatosClientes = "INSERT INTO Clientes (NombreCliente, PrimerApellidoCliente, SegundoApellidoCliente, dniCliente,UsuarioCliente,PasswordCliente,DireccionCliente,CiudadCliente,ProvinciaCliente,FechaNacimientoCliente) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
						
						$params = array($nombreCliente, $apellido1Cliente, $apellido2Cliente, $telefonoCliente,$dniCliente,$usuarioCliente,$PASSWORDCliente,$direccionCliente,$ciudadCliente,$provinciaCliente,$cumpleCliente);
						$cursor = sqlsrv_query($conn, $sqlInsercionDatosClientes, $params);

						if ($cursor === false) {
							echo "ha fallado<br>";
							die(print_r(sqlsrv_errors(), true));
						}else{
							echo "Cliente introducido con exito"."<br>";
						}
						sqlsrv_free_stmt($cursor);//liberas cursor
						sqlsrv_close($conn);//liberas cursor
						
					}
				}//fin else
			
			//fin de la accion de introducir
			}//
			?>
	
			
	
</body>
</html>