<?php
$servBd = "C6PC6\sqlexpress"; //serverName\instanceName

$conInfo = array( "Database"=>"Autos");
//Conexion
$con = sqlsrv_connect( $servBd, $conInfo );
if( $con === false ) {
    die( print_r( sqlsrv_errors(), true));
}

$sql = "UPDATE Distribucion
		SET cantidad = ?
		WHERE CifConce = '0002'
			AND CodCoche = ?
		";
//Inicializacion parametros y prepara la sentencia
//Las variables $cantidad e $id están unidas a la sentencia $cursor
$cantidad = 0;
$id = "";
$cursor = sqlsrv_prepare($con, $sql, array(&$cantidad, &$id));
		
	
?>