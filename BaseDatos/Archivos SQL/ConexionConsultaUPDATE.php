<?php
$servBd = "C6PC6\sqlexpress"; //serverName\instanceName

$conInfo = array( "Database"=>"Autos");
//Conexion
$con = sqlsrv_connect( $servBd, $conInfo );
if( $con === false ) {
    die( print_r( sqlsrv_errors(), true));
}

$sql = "UPDATE Distribucion
		SET cantidad = ?
		WHERE CifConce = '0002'
			AND CodCoche = ?
		";
//Inicializacion parametros y prepara la sentencia
//Las variables $cantidad e $id están unidas a la sentencia $cursor
$cantidad = 0;
$id = "";
$cursor = sqlsrv_prepare($con, $sql, array(&$cantidad, &$id));
//la fiuncion prpare se utilizar para sentencias que se vayan a usar mas de una vez funcionen correctametne
//y si se usa prepare hay que usar execute
//sqlsrv_free libera recursos
		//errorswarnigs
		//sqlsrv_errors
		
		
if(!$cursor) {
    die( print_r( sqlsrv_errors(), true));
}
//configura la informacion CodCoche y cantidad
//Este array mapea CodCoche con cantidad en pares clave => valor
$cantidades = array('0006' => 20, '0008'=> 7, '0009'=>15);

//ejecuta la sentencia para cada coche
foreach($cantidades as $id=>$cantidad){
	//dado que $id y $ cantidad estan ligados a $cursor , sus valores
	//de atualziacion se usan en cada ejecucion de la sentencia
	if(sqlsrv_execute($cursor) === false){
		die( print_r( sqlsrv_errors(), true));
	}
	
}
	
?>