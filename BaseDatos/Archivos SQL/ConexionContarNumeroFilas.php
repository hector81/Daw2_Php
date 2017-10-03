<?php
$servBd = "USUARIO\sqlexpress"; //serverName\instanceName

$conInfo = array( "Database"=>"Autos");
//Conexion
$con = sqlsrv_connect( $servBd, $conInfo );
if( $con === false ) {
    die( print_r( sqlsrv_errors(), true));
}

$sql = "SELECT * FROM Coche";
$params = array();
$opciones = array("Scrollable" => SQLSRV_CURSOR_KEYSET);
$cursor = sqlsrv_query($con, $sql, $params, $opciones);

$numFilas = sqlsrv_num_rows($cursor);

	if($numFilas === false)
			echo "Error al recuperar el numero de filas. ";
	else	
			echo $numFilas;


	
?>