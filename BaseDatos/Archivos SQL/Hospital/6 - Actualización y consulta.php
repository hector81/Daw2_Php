<!-- Actualización y consulta simultánea de datos. Actualizar los nombres que empiecen por la
letra ‘J’ eliminando esa letra del nombre y consultar posteriormente cómo queda la tabla
expresando las dos sentencias SQL a la vez en una única variable PHP.-->
<?php
$servBd = "C6PC6\sqlexpress"; //serverName\instanceName

$conInfo = array( "Database"=>"Hospital");
//Conexion
$con = sqlsrv_connect( $servBd, $conInfo );
if( $con === false ) {
    die( print_r( sqlsrv_errors(), true));
}

$sql = "UPDATE Paciente
		SET nombre = REPLACE(nombre, 'J', '')
		WHERE nombre LIKE 'J%';SELECT * FROM paciente;SELECT * FROM Paciente
		";

$cursor = sqlsrv_query($con, $sql);

	//consume el primer resultado (filas afectadas por UPDATE) sin llamar a sqlsrv_next_result
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
?>