<?php
$servBd = "C6PC6\sqlexpress"; //serverName\instanceName

$conInfo = array( "Database"=>"Hospital");
//Conexion
$con = sqlsrv_connect( $servBd, $conInfo );
if( $con === false ) {
    die( print_r( sqlsrv_errors(), true));
}else{//si conexion es true
	echo "conexion establecida";
}

$sql = "INSERT INTO paciente(IdPaciente, NumSS, Nombre, Apellido, FNacimiento, Genero) 
VALUES(?,?,?,?,?,?); SELECT * FROM paciente;";

$params1 = array(1, "1234567809","Luis", "Gómez Gil",'10-10-1991', true);
$params2 = array(2, "2134560849","María", "Pérez Sanz",'10-10-1991', false);
$params3 = array(3, "5214893204","Pedro", "Sáez Rey",'10-10-1991', true);
$params4 = array(4, "2458268421","Luisa", "Ruiz Río",'10-10-1991', false);
$params5 = array(5, "4521889732","Petra", "Roa Abad",'10-10-1991', false);
$params6 = array(6, "2178495635","Abel", "Lara Rico",'10-10-1991', true);
$params7 = array(7, "2548682574","Ana", "Lama Agar",'10-10-1991', false);
$params8 = array(8, "8524697301","Nuño", "Hera Rojo",'10-10-1991', true);

$arrayParams = array($params1,$params2,$params3,$params4,$params5,$params6,$params7,$params8);

$cuenta = count($arrayParams);
	
for($i = 0; $i< $cuenta; $i++){
	$cursor = sqlsrv_query($con, $sql, $arrayParams[$i]);
	//consume el primer resultado (filas afectadas por INSERT) sin llamar a sqlsrv_next_result
	echo "Filas afectadas : ". sqlsrv_rows_affected($cursor). "<br>";
	
	//Se mueve al siguiente resultado y muestra resultado
	$siguienteResultado = sqlsrv_next_result($cursor);
	
	if($siguienteResultado){
		while($fila = sqlsrv_fetch_array($cursor, SQLSRV_FETCH_ASSOC)){
			$fechaNacimiento = date_format($fila['FNacimiento'], 'd/m/y');
			echo $fila['IdPaciente']." , ".$fila['NumSS']." , ".$fila['Nombre']." , ".$fila['Apellido']." , ".$fechaNacimiento." , ".$fila['Genero']."<br>";
		}
	}elseif(is_null($siguienteResultado)){
		echo "no hay mas resultados <br>";
	}else{
		die(print_r(sqlsrv_errors(),true));
	}
}
	

?>