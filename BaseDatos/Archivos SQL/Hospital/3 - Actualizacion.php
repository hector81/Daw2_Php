<!-- Actualización de datos. Actualizar los nombres que empiecen por la letra ‘A’ agregando una
‘J’ (pasando la ‘A’ mayúscula a ‘a’ minúscula). Obtener información de las filas afectadas.-->
<?php
$servBd = "C6PC6\sqlexpress"; //serverName\instanceName

$conInfo = array( "Database"=>"Hospital");
//Conexion
$con = sqlsrv_connect( $servBd, $conInfo );
if( $con === false ) {
    die( print_r( sqlsrv_errors(), true));
}

$sql = "UPDATE Paciente
		SET nombre = CONCAT('J', LOWER(nombre))
		WHERE nombre LIKE 'A%'; 
		";

$cursor = sqlsrv_query($con, $sql);

//COMPROBAR CURSOR	
if($cursor === false) {
    die( print_r( sqlsrv_errors(), true));
}

//consume el primer resultado (filas afectadas por INSERT) sin llamar a sqlsrv_next_result
echo "Filas afectadas : ". sqlsrv_rows_affected($cursor). "<br>";

		




?>