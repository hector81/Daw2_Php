<!-- Consulta de datos. Mostrar todos los pacientes que tengan una ‘a’ en su nombre. Manejar la
lectura de datos mediante la función has_rows().-->
<?php
$servBd = "C6PC6\sqlexpress"; //serverName\instanceName

$conInfo = array( "Database"=>"Hospital");
//Conexion
$con = sqlsrv_connect( $servBd, $conInfo );
if( $con === false ) {
    die( print_r( sqlsrv_errors(), true));
}

$sql = "SELECT IdPaciente, NumSS, Nombre, Apellido, FNacimiento, Genero FROM Paciente WHERE Nombre LIKE '%a%' OR Nombre LIKE '%a' OR Nombre LIKE 'a%' ";
		
$cursor1 = sqlsrv_query($con, $sql);

$numeroFilas =0;
	

	
if ($cursor1) {
	
   $filas = sqlsrv_has_rows( $cursor1 );
   if ($filas === true)
     //PARA CONSULTA ASOCIATIVA
		while( $fila = sqlsrv_fetch_array( $cursor1, SQLSRV_FETCH_ASSOC) ) {
			  $fechaNacimiento = date_format($fila['FNacimiento'], 'd/m/y');
			  echo $fila['IdPaciente'].", ".$fila['NumSS'].", ".$fila['Nombre'].", ".$fila['Apellido'].", ".$fechaNacimiento.", ".$fila['Genero']."<br />";
			  $numeroFilas++;
		}
   else 
      echo "No hay resultados. <br />";
}	

echo "Filas afectadas : ". $numeroFilas. "<br>";	
	
if($cursor1 === false) {
    die( print_r( sqlsrv_errors(), true));
}



sqlsrv_free_stmt( $cursor1);


?>