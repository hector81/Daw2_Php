<!-- 2. Consulta de datos. Mostrar todos los registros de la tabla. Realizar la lectura de todas las
formas posibles. Obtener información de las filas leídas.-->
<?php
$servBd = "C6PC6\sqlexpress"; //serverName\instanceName

$conInfo = array( "Database"=>"Hospital");
//Conexion
$con = sqlsrv_connect( $servBd, $conInfo );
if( $con === false ) {
    die( print_r( sqlsrv_errors(), true));
}

$sql = "SELECT IdPaciente, NumSS, Nombre, Apellido, FNacimiento, Genero FROM Paciente";
		
$cursor1 = sqlsrv_query($con, $sql);
$cursor2 = sqlsrv_query($con, $sql);
		
	
if($cursor1 === false || $cursor2 === false) {
    die( print_r( sqlsrv_errors(), true));
}

//PARA CONSULTA ASOCIATIVA
while( $fila = sqlsrv_fetch_array( $cursor1, SQLSRV_FETCH_ASSOC) ) {
	  $fechaNacimiento = date_format($fila['FNacimiento'], 'd/m/y');
      echo $fila['IdPaciente'].", ".$fila['NumSS'].", ".$fila['Nombre'].", ".$fila['Apellido'].", ".$fechaNacimiento.", ".$fila['Genero']."<br />";
}

sqlsrv_free_stmt( $cursor1);

//PARA CONSULTA NUMERICA

while( $fila = sqlsrv_fetch_array( $cursor2, SQLSRV_FETCH_NUMERIC) ) {
	  $fechaNacimiento = date_format($fila[4], 'd/m/y');
      echo $fila[0].", ".$fila[1].", ".$fila[2].", ".$fila[3].", ".$fechaNacimiento.", ".$fila[5]."<br />";
}

sqlsrv_free_stmt( $cursor2);

?>