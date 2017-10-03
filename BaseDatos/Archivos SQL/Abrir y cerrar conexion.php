<?php
$serverName = "C6PC6\sqlexpress"; //serverName\instanceName

// Puesto que no se han especificado UID ni PWD en el array  $connectionInfo,
// La conexión se intentará utilizando la autenticación Windows.
$connectionInfo = array( "Database"=>"Autos");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Conexión establecida.<br />";
	 if(sqlsrv_close($conn)){
		 echo "Conexion cerrada";
	 }else{
		  echo "No se ha podido cerrar la conexion";
	 }	 
}else{	
    echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>