<?php
$servBd = "C6PC6\sqlexpress"; //serverName\instanceName

$conInfo = array( "Database"=>"Autos");
//Conexion
$con = sqlsrv_connect( $servBd, $conInfo );
if( $con === false ) {
    die( print_r( sqlsrv_errors(), true));
}

$sql = "SELECT * FROM Coche";

$cursor = sqlsrv_query($con, $sql);

		
		
if($cursor === false) {
    die( print_r( sqlsrv_errors(), true));
}

$numColum = sqlsrv_num_fields($cursor);

	while(sqlsrv_fetch($cursor)){
		//iTERATE through the fields of each row
		for($i =0; $i < $numColum; $i++){
				echo sqlsrv_get_field($cursor, $i). " ";
				echo "<br>";
		}
	}
?>