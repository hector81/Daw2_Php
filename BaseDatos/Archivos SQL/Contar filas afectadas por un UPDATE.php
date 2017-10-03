<?php
$servBd = "C6PC6\sqlexpress"; //serverName\instanceName

$conInfo = array( "Database"=>"Autos");
//Conexion
$con = sqlsrv_connect( $servBd, $conInfo );
if( $con === false ) {
    die( print_r( sqlsrv_errors(), true));
}

$sql = "UPDATE Distribucion SET cantidad = ? WHERE CodCoche = ?";

$params = array(4,"0006");
$cursor = sqlsrv_query($con, $sql, $params, $params);

$filasAfectadas = sqlsrv_rows_affected($cursor);

	if($filasAfectadas === false){
			die( print_r( sqlsrv_errors(), true));
	}		
	elseif($filasAfectadas == -1)	{
			echo "No hay información disponible <br>";
	}	
	else{
			echo $filasAfectadas. "filas actualizadas <br>";
	}
	
?>