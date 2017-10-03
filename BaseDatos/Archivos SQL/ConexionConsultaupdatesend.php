<?php
$servBd = "C6PC6\sqlexpress"; //serverName\instanceName

$conInfo = array( "Database"=>"Autos");
//Conexion
$con = sqlsrv_connect( $servBd, $conInfo );
if( $con === false ) {
    die( print_r( sqlsrv_errors(), true));
}

$sql = "UPDATE prueba SET data = ( ?) WHERE id= 100 ";
//abrir un flujo para datos de parametos  y ponerlo en el array $poarams
$datos = fopen("data://text/plain,[ Contenido largo aqui. ]", "r");

$params = array(&$datos);
//prepara la sentencia. Usa el array $option para deshabilitar
//el comportamiento predeterminado que es mandar todos los datos al ejecutar la consulta
$opciones = array("SendStreamParamsAtExec" =>0);
$cursor = sqlsrv_prepare($con, $sql, $params, $opciones);

	sqlsrv_execute($cursor);
	
	//manda hasta 8k de datos de parametros al servidor
	//en cada llamada a sqlsrv_send_stream_data
	$i=0;
	while(sqlsrv_send_stream_data($cursor)){
		$i++;
	}
	echo "$i llamadas realizadas.";

?>