<?php

try {
	$database = "CadenaTiendas";  
	$server = "C6PC06"; 
	//$login = new PDO("sqlsrv:server=MYSQLSERVER\SQLEXPRESS;Database=db_name;ConnectionPooling=0", "user", "passw"); 
	$con = new PDO("sqlsrv:server=$server;Database=$database;ConnectionPooling=0",'','');
    $con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	echo '';

} catch (PDOException $e) {
    die( "Error connecting to SQL Server" ); 
}

//echo 'Conexión establecida con base de datos';

?>