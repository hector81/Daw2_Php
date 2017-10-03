<?php
$servBd = "C6PC6\sqlexpress"; //serverName\instanceName

$conInfo = array( "Database"=>"Autos");
//Conexion
$con = sqlsrv_connect( $servBd, $conInfo );
if( $con === false ) {
    die( print_r( sqlsrv_errors(), true));
}

$sql = "INSERT INTO prueba(data, id) VALUES(?,?); SELECT * FROM prueba;";

$params = array("algunos datos", 1);

$cursor = sqlsrv_query($con, $sql, $params);

//consume el primer resultado (filas afectadas por INSERT) sin llamar a sqlsrv_next_result
echo "Filas afectadas : ". sqlsrv_rows_affected($cursor). "<br>";

//Se mueve al siguiente resultado y muestra resultado
$siguienteResultado = sqlsrv_next_result($cursor);

	if($siguienteResultado){
		while($fila = sqlsrv_fetch_array($cursor, SQLSRV_FETCH_ASSOC)){
			echo $fila['id']." : ".$fila['data']."<br>";
		}
	}elseif(is_null($siguienteResultado)){
		echo "no hay mas resultados <br>";
	}else{
		die(print_r(sqlsrv_errors(),true));
	}	

?>