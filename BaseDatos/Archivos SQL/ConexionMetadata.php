<?php
$servBd = "C6PC6\sqlexpress"; //serverName\instanceName

$conInfo = array( "Database"=>"Autos");
//Conexion
$con = sqlsrv_connect( $servBd, $conInfo );
if( $con === false ) {
    die( print_r( sqlsrv_errors(), true));
}

$sql = "SELECT * FROM Coche";

$cursor = sqlsrv_prepare($con, $sql);

foreach(sqlsrv_field_metadata($cursor) as $campoMetadato){
	foreach($campoMetadato as $nombre => $valor){
		echo "$nombre: $valor<br>";
	}
	echo "<br>";
}
	
?>