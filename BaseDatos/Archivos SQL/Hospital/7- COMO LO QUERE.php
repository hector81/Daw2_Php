<?php
$servBd = "C6PC6\sqlexpress"; //serverName\instanceName

$usu = file_get_contents("Appli/uid.txt");//usuario
$contr = file_get_contents("Appli/pwd.txt");//contraseña


$conInfo = array( 'Database'=>'Hospital' ,'CharacterSet'=>'UTF-8','ReturnDatesAsStrins'=>'true','UID'=>$usu, 'PWD'=>$contr);
//Conexion
$con = sqlsrv_connect( $servBd, $conInfo );
if( $con === false ) {
    die( print_r( sqlsrv_errors(), true));
	echo "conexion fallida";
}else{//si conexion es true
	echo "conexion establecida";
}


//llamamos al procedimiento
$sql = "{call insPaciente(?, ?, ?, ?, ?, ?) }
VALUES(?,?,?,?,?,?); SELECT * FROM Paciente;";//llamas al procedimiento almacenado porque es mas rapido
//variables configuradas
$idPa=0;//entero
$numSS="";//string
$nombre="";//string
$apellido="";//string
$fNacimiento="";//string
$masculino = false;//booleano

//los datos que vamos a insertar
$datos = [['123456','uno','dos','25/10/2004',true],['234815','tres','cuatro','05/04/1995',false] ];
	
//ahora necesitamos parametros Y EN EL ORDEN ESPCIFICADO
$params= [
		  [&$numSS,SQLSRV_PARAMS_IN],
		  [&$nombre,SQLSRV_PARAMS_IN],
		  [&$apellido,SQLSRV_PARAMS_IN],
	   	  [&$fNacimiento,SQLSRV_PARAMS_IN],
		  [&$masculino,SQLSRV_PARAMS_IN],
		  [&$idPa,SQLSRV_PARAMS_OUT]
		 ];
//EL ULTIMO LLEVA SQLSRV_PARAMS_OUT PORQUE ES EL SALIDA

//PREPARAMOS EL CURSOR CON LOS PARAMETROS
$cursor = sqlsrv_prepare($con, $sql, $params);
//comprobamos que no tenga error la sentencia
if($cursor === false) {
	echo "Error al preparar la sentencia<br>";
    die( print_r( sqlsrv_errors(), true));
}

foreach($datos as $fila){//se recorre el array y por cada fila se ejecuta el cursor
	list($numSS ,$nombre, $apellido ,$fNacimiento, $masculino)=$params;
	echo $numSS ,$nombre, $apellido ,$fNacimiento, $masculino;
	
	sqlsrv_execute($cursor);
	sqlsrv_next_result($cursor);//para mover el resultado SI TIENE EN EJECUCION MAS DE UNA SENTENCIA
	echo "Valor Id: ".$idPa."\n<br>";//y recupera el valor del id
}
//liberamos el cursor
sqlsrv_free_stmt($cursor);
//libero antes el cursor anterior
///////////////////////////////////////
//llamamos a otro procedimiento
$sql2 = "{call selPacientesSig()}";
$cursor = sqlsrv_query($con, $sql2);
//comprobamos que no tenga error la sentencia
if($cursor === false) {
	echo "Error al preparar la sentencia<br>";
    die( print_r( sqlsrv_errors(), true));
}
////////////////////////////////////////
//llamamos procedimiento almacenado selPacientesSig
$sql = "{call selPacientesSig()}";//LA SENTENCIA LLAMA AL PROCEDIMIENTO ALMACENADO
$cursor = sqlsrv_query($con, $sql);//CREAMOS EL CURSOR

$fila = sqlsrv_fetch_array($cursor);
while($fila!=false){
		echo "$fila[0],$fila[1],$fila[2],$fila[3],$fila[4],$fila[5]\n<br>";
		sqlsrv_fetch_array($cursor);
	}


sqlsrv_free_stmt($cursor);//liberas cursor
//sqlsrv_close($con);//cierras conexion
//////////////////////////////////////
////////////////////////////////////////
//llamamos procedimiento almacenado leePaciente
echo '<br><br><br>';
$sql2 = "{call leePaciente()}";//LA SENTENCIA LLAMA AL PROCEDIMIENTO ALMACENADO
$cursor2 = sqlsrv_prepare($con, $sql2,array(), ['Scrollable'=>'dynamic']);//CREAMOS EL CURSOR
//comprobamos que no tenga error la sentencia
if($cursor2 === false) {
	echo "Error al preparar la sentencia<br>";
    die( print_r( sqlsrv_errors(), true));
}
//https://msdn.microsoft.com/en-us/library/cc296183(v=sql.105).aspx
//http://php.net/manual/es/function.sqlsrv-fetch.php

if(sqlsrv_fetch($cursor2, SQLSRV_SCROLL_LAST)=== true){
	sqlsrv_get_field($cursor2,0, SQLSRV_PHPTYPE_INT)."<br>";//idpaciente
	sqlsrv_get_field($cursor2,1, SQLSRV_PHPTYPE_STRING)."<br>";//ss
	sqlsrv_get_field($cursor2,2, SQLSRV_PHPTYPE_STRING)."<br>";
	sqlsrv_get_field($cursor2,3, SQLSRV_PHPTYPE_STRING)."<br>";
	sqlsrv_get_field($cursor2,4, SQLSRV_PHPTYPE_DATETIME)."<br>";
	sqlsrv_get_field($cursor2,5, SQLSRV_PHPTYPE_INT)."<br>";

}

	
sqlsrv_free_stmt($cursor2);//liberas cursor
sqlsrv_close($con);//cierras conexion
//////////////////////////////////////
?>