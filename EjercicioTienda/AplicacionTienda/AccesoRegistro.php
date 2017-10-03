<?php
session_start();
include 'conexion.php';
echo 'Bienvenido a acceso a clientes<br />';
echo '<br /><a href="Indice.php">Volver a inicio</a>';
?>
<html>
	<head>
		<title>Acceso Clientes</title>
	</head>

	
<body> 
		<form name="input" method="post" >
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
				$contrasenia = "";
				//Comprobamos que los datos esten completados y no este vacio
				if(empty($_POST['usuarioClienteComprobar'])) {
					echo "<p>Es necesario que completes tu nombre de usuario.</p> ";
				}else{
													
					//en caso de estar completados los pasamos valores a las variables mediante el metodo POST
					$usuarioClienteComprobar = $_POST['usuarioClienteComprobar']; 

						// dwes
						// e8dc8ccd5e5f9e3a54f07350ce8a2d3d
						//comprobamos USUARIO 
						$USUARIO= "";
						$usuarioConfirmado="";
						$ComprobarUsuario= true;
						
							$sql = "SELECT usuario FROM dbo.usuario;";
							foreach ($conexionBD->query($sql) as $row) {
								$USUARIO =$row['usuario'];
								if($USUARIO == $usuarioClienteComprobar){
									$ComprobarUsuario = false;
									$usuarioConfirmado = $USUARIO;
									echo $usuarioConfirmado;
								}
							}
							
							//para la identificacion hash en el caso de que el usuario exista 		
							if($ComprobarUsuario==false){
								$sqlPassword = "SELECT contrasenia FROM dbo.usuario WHERE usuario LIKE '$usuarioConfirmado';";	
								echo $sqlPassword;
								foreach ($conexionBD->query($sqlPassword) as $row) {
									$contrasenia = $row['contrasenia'];
								}
							}
					}//fin else

				
				if($ComprobarUsuario==false){
					//para que vaya directamente a la tienda
					$_SESSION['USUARIO_CLIENTE'] = $usuarioClienteComprobar;
					$_SESSION['USUARIO_PASSWORD'] = $contrasenia;
					header('Location: http://localhost/Ej/EjercicioTienda/AplicacionTienda/app/plantillas/paginaWebFotos.php');
				}else{
					echo "Usuario no correcto";
				}
		
				}//fin de la accion de introducir
				
	
			
			?>
			
	
</body>
</html>