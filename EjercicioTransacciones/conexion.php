<?php

try {
	$database = "CadenaTiendas";  
	$server = "C6PC06"; 
	$conexionBD = new PDO("sqlsrv:server=$server;Database=$database",'','');
    $conexionBD->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	echo '';

} catch (PDOException $e) {
    die( "Error connecting to SQL Server" ); 
}

echo 'Conexión establecida con base de datos';

/*
$col1 = "N'Fotografía'";  
$col2 = "N'Artículos fotografía'";  


$query = "INSERT INTO familia(nombre,descripcion) values(?,?)";  
$stmt = $conexionBD->prepare( $query, array( PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY, PDO::SQLSRV_ATTR_QUERY_TIMEOUT => 1  ) );  
$stmt->execute( array($col1, $col2 ) );  
echo $stmt->rowCount();  

$stmt = null ;
*/


?>
