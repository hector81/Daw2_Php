<!-- Consulta de datos. Mostrar todos los registros de la tabla realizando una proyección
explícita de los tipos SQL Server a tipos PHP.
What is the difference between projection and selection? Is it:

Projection: for selecting the columns of table; and
Selection : to select the rows of table?
-->

<?php  
$servBd = "USUARIO\sqlexpress"; //serverName\instanceName

$conInfo = array( "Database"=>"Hospital");
//Conexion
$conn = sqlsrv_connect( $servBd, $conInfo );
if( $conn === false ) {
    die( print_r( sqlsrv_errors(), true));
}

$sql = "SELECT IdPaciente, NumSS, Nombre, Apellido, FNacimiento, Genero FROM Paciente";

$stmt = sqlsrv_query($conn, $sql);  
if( $stmt === false )  
{  
     echo "Error in statement execution.\n";  
     die( print_r( sqlsrv_errors(), true));  
}  
 
$i=1;

foreach (sqlsrv_field_metadata($stmt) as $fieldMetadata) {
    echo "<table border='1'>";
    echo "<tr><td colspan='2'> SQL: </td></tr>";
    foreach ($fieldMetadata as $name => $value) {
        echo var_dump($value);
        echo "<tr><td>$name:</td><td> $value </td></tr>";
    }
    echo "</table>";
    $i++;
    echo "<br><br>";
}
 

?>