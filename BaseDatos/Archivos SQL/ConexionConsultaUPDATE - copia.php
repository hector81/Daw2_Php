<?php
$servBd = "C6PC6\sqlexpress"; //serverName\instanceName

$conInfo = array( "Database"=>"Autos");
//Conexion
$con = sqlsrv_connect( $servBd, $conInfo );
if( $con === false ) {
    die( print_r( sqlsrv_errors(), true));
}

$sql = "SELECT Pvp FROM Venta
		";

$cursor = sqlsrv_prepare($con, $sql);

		
		
if($cursor === false) {
    die( print_r( sqlsrv_errors(), true));
}
if(sqlsrv_execute($cursor) === false){

		die( print_r( sqlsrv_errors(), true));
	}
	
	
	
	///////
	$totalVentas =0;
	$cuenta =0;
	
	while(($fila = sqlsrv_fetch_array($cursor)) && $totalVentas <= 10000){
		$pvp = $fila[0];
		$totalVentas += $pvp;
		$cuenta++;
	}

	echo "$cuenta ventas contabilizadas para los primeros $totalVentas € de ingresos .<br>"
	
	//cancela los resultado pendientes. La sentencia se puede reutilizar
	//sqlsrv_cancel($cursor);
?>