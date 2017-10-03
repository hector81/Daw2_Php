<?php
$serverName = "C6PC6\sqlexpress"; //serverName\instanceName

$connectionInfo = array( "Database"=>"Autos");
$con = sqlsrv_connect( $serverName, $connectionInfo );
if( $con === false ) {
    die( print_r( sqlsrv_errors(), true));
}

$sql = "SELECT CodCoche, Nombre, modelo , Pvp FROM Coche";
$cursor = sqlsrv_query( $con, $sql );
if( $cursor === false) {
    die( print_r( sqlsrv_errors(), true) );
}

while( $fila = sqlsrv_fetch_array( $cursor, SQLSRV_FETCH_NUMERIC) ) {
      echo $fila[0].", ".$fila[1].", ".$fila[2].", ".$fila[3]."<br />";
}

sqlsrv_free_stmt( $cursor);
?>