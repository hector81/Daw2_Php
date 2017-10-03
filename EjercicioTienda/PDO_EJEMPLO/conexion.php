<?php

$serverName = "C6PC06\sqlexpress";

 // Conecta mediante autenticación Windows
 try
 { $conexionBD = new PDO("sqlsrv:server=$serverName;Database=AdventureWorks2012", "", "");
   $conexionBD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 }catch(Exception $e)
 { die(print_r( $e->getMessage()));
 }

echo 'Conexión establecida con base de datos';

?>

