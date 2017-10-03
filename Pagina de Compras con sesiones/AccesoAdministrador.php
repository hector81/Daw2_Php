<?php
session_start();

echo 'Bienvendio a acceso a clientes<br />';

//echo date('Y m d H:i:s', $_SESSION['instante']);

echo '<br /><a href="Indice.php">Volver a inicio</a>';
?>
<html>
	<head>
		<title>Acceso Clientes</title>
	</head>

	
<body> 
		<form name="input" method="post" >    <!-- action="Tienda.php" -->
			<table>			
				<caption>Acceso del cliente</caption>
				
				<tr>
					<td>
						<b>usuario</b>
					</td>
					<td>
						<input type="text" value="" name="usuarioClienteComprobar"><br>
					</td>
				</tr>
				
				<tr>
					<td>
						<b>contraseña de usuario</b>
					</td>
					<td>
						<input type="text" value="" name="PASSWORDClienteComprobar"><br>
						<br>
					</td>
				</tr>

			
		</table>

		<input type="submit" name="Enviar" value="Enviar"/>
		</form>
		<?php
			$hoy = date("20y-m-d");
			echo "Día de hoy: ".$hoy."<br>";
			$hoyHora = date("h:i"); 
			echo "Hora de hoy: ".$hoyHora."<br>";
			//SI LE DAMOS AL BOTON AGREGAR
			if(isset($_POST['Enviar'])) {	 
				
				//Comprobamos que los datos esten completados y no este vacio
				if(empty($_POST['usuarioClienteComprobar'])) {
					echo "<p>Es necesario que completes tu nombre de usuario.</p> ";
				}elseif(empty($_POST['PASSWORDClienteComprobar'])) {
					echo "<p>Es necesario que completes tu contraseña.</p> ";
				}else{
													
					//en caso de estar completados los pasamos valores a las variables mediante el metodo POST
					$usuarioClienteComprobar = $_POST['usuarioClienteComprobar']; 
					$PASSWORDClienteComprobar = $_POST['PASSWORDClienteComprobar']; 
				
					echo $usuarioClienteComprobar;
					

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
						//comprobamos USUARIO Y CONTRASEÑA
						$sqlConsultaUsuarioContraseña = "SELECT Clientes.UsuarioCliente, Clientes.PasswordCliente FROM Clientes ;";
						$USUARIO;
						$PASSWORD;
						$ComprobarUsuario= true;
						$cursorComprobar = sqlsrv_query($conn, $sqlConsultaUsuarioContraseña);
						if ($cursorComprobar) {
								echo "Comprobando usuario<br>";
								while( $fila = sqlsrv_fetch_array( $cursorComprobar, SQLSRV_FETCH_ASSOC) ) {
									  $USUARIO = $fila['UsuarioCliente'];
									  $PASSWORD = $fila['PasswordCliente'];
									  if($USUARIO == $usuarioClienteComprobar && $PASSWORD == $PASSWORDClienteComprobar){
										  $ComprobarUsuario = false;
									  }
									  
								}
						}
						sqlsrv_free_stmt($cursorComprobar);//liberas cursor
						sqlsrv_close($conn);//liberas cursor

					}//fin else
				
				
				$_SESSION['USUARIO_COMPROBADO'] = $ComprobarUsuario;
				$_SESSION['USUARIO_CLIENTE'] = $usuarioClienteComprobar;
				if($ComprobarUsuario==false){
				//para que vaya directamente a la tienda
				header('Location: http://localhost/ejercicios%20php/Pagina%20de%20Compras%20con%20sesiones/Tienda.php');
				}else{
					echo "Usuario no correcto";
				}
		
				}//fin de la accion de introducir
				
	
			
			?>
			
	
</body>
</html>