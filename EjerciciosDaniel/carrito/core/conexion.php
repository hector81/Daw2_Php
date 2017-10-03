<?php

try {
    $user = 'root';
    $pass = 'root';
    $server = 'DESKTOP-QFUK212\SQLEXPRESS';
    $db = 'CadenaTiendas';
    
    $dsn = 'sqlsrv:Server='.$server.';Database='.$db;

    $con = new PDO($dsn, $user, $pass);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error con la conexión a SQL Server");
}


