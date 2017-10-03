
<?php
session_start();


	
if(isset($_POST['Enviar'])) {	 			
	//Comprobamos que los datos esten completados y no este vacio
	if(empty($_POST['NombreProducto'])) {
		echo "<p>Es necesario que completes NombreProducto.</p> ";
	}elseif(empty($_POST['numeroProductos'])) {
		echo "<p>Es necesario que completes numero Productos.</p> ";
	}else{
										
		//en caso de estar completados los pasamos valores a las variables mediante el metodo POST
		$NombreProducto = $_POST['NombreProducto']; 
		$numeroProductos = $_POST['numeroProductos']; 

		echo $NombreProducto." : ".$numeroProductos."<br>";
		
		//bbdd conexion
		$serverName = "C6PC6\SQLEXPRESS"; //serverName\instanceName
		$connectionInfo = array("Database" => "Compras", "CharacterSet" => "UTF-8");
		$conn = sqlsrv_connect($serverName, $connectionInfo);
		if ($conn === false) {
			echo "no funciona la conexion <br>";
			die(print_r(sqlsrv_errors(), true));
		} else {
			echo "Conectado.<br>";
		}
		echo "";
		////////averiguar precio iva///////////////
		$sqlSELECTprod = "SELECT Productos.PrecioProducto , Productos.IVA FROM Productos WHERE Productos.NombreProducto LIKE '$NombreProducto';";
		$precioProducto;
		$IVA;
		$cursor2 = sqlsrv_query($conn, $sqlSELECTprod);
		if ($cursor2) {
				while( $fila = sqlsrv_fetch_array( $cursor2, SQLSRV_FETCH_ASSOC) ) {
					  $precioProducto =$fila['PrecioProducto'];
					  $IVA =$fila['IVA'];
				}
		}	

		if($cursor2 === false) {
			die( print_r( sqlsrv_errors(), true));
		}
		sqlsrv_free_stmt($cursor2);//liberas cursor
		///////////
		
		//HACER CALCULOS
		$precioProductoElegidoCantidad = (($numeroProductos*$precioProducto)/100)*(100+$IVA);
		echo "El precio de " . $numeroProductos . " ". $NombreProducto . " con IVA DE ".$IVA. " ES DE " . $precioProductoElegidoCantidad. " EUROS EN TOTAL<BR>";
		
		
		
		
		echo "¿quieres?<br>";
		echo "<form name='input' method='post'>";
		echo "<input type='button' name='Seguir compra' value='Seguir compra' id='Seguir compra'/><br> ";
		echo "<input type='button' name='Acabar compra' value='Acabar compra' id='Acabar compra'/><br> ";
		echo "</form>";
		
		if(isset($_POST['Seguir compra'])){
			
			
		}elseif(isset($_POST['Acabar compra'])){
			echo "EL PRECIO FINAL ES DE " . $precioProductoElegidoCantidad. " EUROS EN TOTAL<BR>";
		}
		
		
	}//fin else


}//fin de la accion de introducir

//FIN  SESION////////
session_destroy();


?>