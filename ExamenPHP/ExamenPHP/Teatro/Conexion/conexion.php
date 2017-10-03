<?php
$servidor = "JAVIER\SQLEXPRESS";
$conInfo = array("Database" => "Teatro", 'CharacterSet' => 'UTF-8');
$con = sqlsrv_connect($servidor, $conInfo);

if ($con == false) {
    die(print_r(sqlsrv_errors(), true));
}