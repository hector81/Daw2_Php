<?php
$servBd = "C6PC6\sqlexpress"; //serverName\instanceName

$conInfo = array( "Database"=>"Autos");
//Conexion
$con = sqlsrv_connect( $servBd, $conInfo );
if( $con === false ) {
    die( print_r( sqlsrv_errors(), true));
}

$cursor = sqlsrv_query($con, "SELECT * FROM Coche");

if($cursor) {
	$filas = sqlsrv_has_rows($cursor);
	if($filas === true)
			echo "Hay filas. <br>";
	else	
			echo "No hay  filas. <br>";
}

	
?>