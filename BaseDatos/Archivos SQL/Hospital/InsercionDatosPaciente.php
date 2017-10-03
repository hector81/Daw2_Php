<?php

$serverName = "C6PC4\SQLEXPRESS"; //serverName\instanceName
$connectionInfo = array("Database" => "Hospital", "CharacterSet" => "UTF-8");
$conn = sqlsrv_connect($serverName, $connectionInfo);
if ($conn === false) {
    echo "no funciona la conexion <br>";
    die(print_r(sqlsrv_errors(), true));
} else {
    echo "Conectado.<br>";
}

$id = [1, 2, 3, 4, 5, 6, 7, 8];
$numSS = ['1234567809', '2134560849', '5214893204', '2458268421', '4521889732', '2178495635', '2548682574', '8524697301'];
$nombre = ['Luis', 'Maria', 'Pedro', 'Luisa', 'Petra', 'Abel', 'Ana', 'Nuño'];
$apellido = ['Gomez Gil', 'Perez Sanz', 'Saez Rey', 'Ruiz Rio', 'Roa Abad', 'Lara Rico', 'Lama Agar', 'Hera Rojo'];
$fNacimient = ['1993-10-07', '1980-05-07', '1973-02-10', '1986-09-09', '1992-01-08', '1975-12-12', '1968-08-13', '1979-10-05'];
$genero = [0, 1, 0, 1, 1, 0, 1, 0];


//$sql = "INSERT INTO paciente (IdPaciente, NumSS, Nombre, Apellido, FNacimiento, Genero)"
//        . "VALUES (1, '1234567809', 'Luis', 'Gomez Gil','1993-10-07', 0)";


for ($i = 0; $i < count($id); $i++) {
    $sql = "INSERT INTO paciente (IdPaciente, NumSS, Nombre, Apellido, FNacimiento, Genero) VALUES (?, ?, ?, ?, ?, ?)";
    $params = array($id[$i], $numSS[$i], $nombre[$i], $apellido[$i], $fNacimient[$i], $genero[$i]);
    $cursor = sqlsrv_query($conn, $sql, $params);
}



if ($cursor === false) {
    echo "ha fallado<br>";
    die(print_r(sqlsrv_errors(), true));
}