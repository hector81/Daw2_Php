<?php
session_start();

echo 'Bienvendio a administracion <br />';
//$fechaActual = date('Y m d H:i:s', $_SESSION['instante']);

$fechaActual = date('d m Y', $_SESSION['instante']);
echo $fechaActual."<br>";
echo '<br /><a href="Indice.php">Volver a inicio</a><br>';
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

//comprobar que la tabla autoridad tenga algun registro
$sqlComprobarExistenciaAutoridades = "SELECT * FROM Autoridad;";
$ExistenciaAutoridades = false;
$cursorAutoridades = sqlsrv_query($conn, $sqlComprobarExistenciaAutoridades);
if ($cursorAutoridades) {
	while( $fila = sqlsrv_fetch_array( $cursorAutoridades, SQLSRV_FETCH_ASSOC) ) {
		if($fila != null){
			$ExistenciaAutoridades = true;
		}			  
	}
}

if(!$ExistenciaAutoridades) {
	echo "<p>Para rellenar el formulario de concejalia es necesario antes que existan autoridades.</p> ";
	echo "<p>Introduce por lo menos una autoridad para poder acceder al formulario concejalia.</p> ";
	echo "<p><a href='AutoridadIntroduce.php'>Formulario Autoridades</a>.</p> ";
}
?>
<html>
	<head>
		<title>Formulario Concejalia</title>
	</head>

	
<body> 
	<h1>Meter Concejalia</h1>
		<form name="input" method="post">
			<table>			
				<caption>Datos de la Concejalia</caption>
				
				<tr>
					<td>
						<b>Meter nombre de la autoridad</b>
					</td>
					<td>
						<input type="text" value="" name="nombreAutoridad"><br>	
					</td>
				</tr>
				<tr>
					<td>
						<b>Meter descripcion de la autoridad</b>
					</td>
					<td>
						<input type="text" value="" name="descripcionConcejalia"><br>	
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
					echo "<p>Es necesario que completes el nombre de Autoridad.</p> ";
				}elseif(empty($_POST['descripcionConcejalia'])) {
					echo "<p>Es necesario que completes la descripcion de la concejalia.</p> ";
				}elseif(!$ExistenciaAutoridades) {
					echo "<p>No podras rellenar hasta que en autoridades haya algun registro.</p> ";
				}else{
					//en caso de estar completados los pasamos valores a las variables mediante el metodo POST
					$nombreAutoridad = $_POST['nombreAutoridad'];
					$descripcionConcejalia = $_POST['descripcionConcejalia'];
					//comprobamos que la autoridad existe
					
					//comprobamos que la autoridad no existe
					$sqlComprobarAutoridadExiste = "SELECT nombre FROM Autoridad";
					$nombreAuto;
					$ComprobarExiste = true;
					$cursor0 = sqlsrv_query($conn, $sqlComprobarAutoridadExiste);
					if ($cursor0) {
						while( $fila = sqlsrv_fetch_array( $cursor0, SQLSRV_FETCH_ASSOC) ) {
							  $nombreAuto=$fila['nombre'];
							  if($nombreAuto == $nombreAutoridad){
								  $ComprobarExiste = false;
							  }
						}
					}
					sqlsrv_free_stmt($cursor0);//liberas cursor
					
					//comprobar el id del concejal
					$sqlComprobarExistenciaConcejalia = "SELECT * FROM Concejalia WHERE nombre ='".$nombreAutoridad."';";
					$ExistenciaConcejalia = false;
					$cursorConcejalia = sqlsrv_query($conn, $sqlComprobarExistenciaConcejalia);
					if ($cursorConcejalia) {
						while( $fila = sqlsrv_fetch_array( $cursorConcejalia, SQLSRV_FETCH_ASSOC) ) {
							if($fila != null){
								$ExistenciaConcejalia = true;
							}			  
						}
					}

					//si la autoridad existe
					if($ComprobarExiste){
						echo "La Autoridad no existe. Da a volver a rellenar. ";
						echo "<a href='ConcejaliaIntroduce.php'>Vuelve atras</a>";
					}elseif($ExistenciaConcejalia){
						echo "El concejal ya existe. Da a volver a rellenar. ";
						echo "<a href='ConcejaliaIntroduce.php'>Vuelve atras</a>";
					}else{
						//sacar id autoridad
						$sqlComprobarAutoridadExiste = "SELECT id FROM Autoridad WHERE nombre = '" .$nombreAutoridad ."';";
						$idAuto;
						$cursor0 = sqlsrv_query($conn, $sqlComprobarAutoridadExiste);
						if ($cursor0) {
							while( $fila = sqlsrv_fetch_array( $cursor0, SQLSRV_FETCH_ASSOC) ) {
								  $idAuto=$fila['id'];
							}
						}
						sqlsrv_free_stmt($cursor0);//liberas cursor

						//recorrer para mostrar					
						echo "<table border='1'>";
						echo "<caption>DATOS DEL</caption>";
							echo "<tr>";
								echo "<td>";
									echo "Nombre de la concejalia"."<br>";
									echo $nombreAuto."<br>";
								echo "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>";
									echo "Descripcion de la autoridad"."<br>";
									echo $descripcionConcejalia."<br>";
								echo "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>";
									echo "Id de la autoridad"."<br>";
									echo $idAuto."<br>";
								echo "</td>";
							echo "</tr>";						
						echo "</table>";
						//introducir autoridad
						$sqlInsercionConcejalia = "INSERT INTO Concejalia (nombre, descripcion, idAutoridad) VALUES ( ?, ?, ?)";

						$params = array($nombreAuto, $descripcionConcejalia, $idAuto);
						$cursor2 = sqlsrv_query($conn, $sqlInsercionConcejalia, $params);

						if ($cursor2 === false) {
							echo "ha fallado<br>";
							die(print_r(sqlsrv_errors(), true));
						}else{
							echo "Concejalia introducida con exito"."<br>";
						}
						sqlsrv_free_stmt($cursor2);//liberas cursor
					
						
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