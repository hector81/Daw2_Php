<?php
$servBd = "C6PC6\sqlexpress"; //serverName\instanceName

$conInfo = array( "Database"=>"Autos");
//Conexion
$con = sqlsrv_connect( $servBd, $conInfo );
if( $con === false ) {
    die( print_r( sqlsrv_errors(), true));
}

/*INICIAR LA TRANSACCION*/
if(sqlsrv_begin_transaction($con) === false){
	die( print_r( sqlsrv_errors(), true));
}

/*INICIARLIZAR LOS PARAMETROS*/
$cif = '0004'; $dni= '0009'; $coche = '0014'; $color= 'ROJO' ; $pv = 4515;

/*  PREPARAR Y EJECUTAR LA PRIMERA SENTENCIA*/

$sql1 = "INSERT INTO venta(CifConce, dni, CodCoche, Color, Pvp) VALUES(?,?,?,?);";

$params1 = array($cif, $dni, $coche, $color, $pv);
$cursor1 = sqlsrv_query($con, $sql1, $params1);
	
/*PREPARAR Y EJECUTAR LA SEGUNDA SENTENCIA */
$sql2 = "UPDATE Distribucion SET Cantidad = (Cantidad -1) WHERE CifConce = ? AND CodCoche = ?";

$params2 = array($cif,$coche);
$cursor2 = sqlsrv_query($con, $sql2, $params2);

/*Si ambas sentencias finalizaron con exito consolidar la transaccion*/
/*En caso contrario revertirla*/
if($cursor1 && $cursor2){
	sqlsrv_commit($con);
	echo "Transaccion consolidada .<br>";
}else{
	sqlsrv_rollback($con);
	echo "Transaccion no consolidada .<br>";
}

?>