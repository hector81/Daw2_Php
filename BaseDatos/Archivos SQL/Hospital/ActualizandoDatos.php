<?php

$serverName = "C6PC4\SQLEXPRESS"; //serverName\instanceName
$connectionInfo = array("Database" => "Hospital", "CharacterSet" => "UTF-8", "ReturnDatesAsStrings" => true);
$conn = sqlsrv_connect($serverName, $connectionInfo);
if ($conn === false) {
    echo "no funciona la conexion <br>";
    die(print_r(sqlsrv_errors(), true));
} else {
    echo "Conectado.<br>";
}
$sql1 = "UPDATE Paciente set Nombre = LOWER(Nombre) WHERE Nombre like 'A%'";
$cursor = sqlsrv_query($conn, $sql1);

$sql2 = "UPDATE Paciente set Nombre = CONCAT('J', Nombre) WHERE Nombre like 'A%'";
$cursor2 = sqlsrv_query($conn, $sql2);

echo "Filas afectadas : " . sqlsrv_rows_affected($cursor) . "<br>";


if ($cursor === false) {
    echo "ha fallado<br>";
    die(print_r(sqlsrv_errors(), true));
}


