<?php
session_start();


//para cerrar sesion
echo '<a href="Indice.php">Volver a inicio</a><br><br><br><br>';

	
?>
<?php	
	//Comprobar si la sesion esta abierta, es decir
	//ha tansmitido una variable "sesion" mediante URL
	if(!isset($_GET['sesion']))
	{
		//Variable  "sesion" vacia = sin sesion => inicar sesion
		//Para este ejmeplo  identificador de sesion
		$sesion = sha1(uniqid());
		$fecha = date('\e\l d/m/Y a las H:i:s');//fecha
		$mensaje= "Nueva sesion : $sesion - $fecha";
	}
	else
	{
		//Variable "sesion" no vacia = sesion abierta
		// => recuperar la información de la URL
		$sesion = $_GET['sesion'];
		$fecha = $_GET['fecha'];
		//construir un mensaje
		$mensaje ="Sesión ya iniciada : $sesion - $fecha";		
	}
	//Construcción de los parametros de la URL : $sesion + $fecha
	// $sesion no necesita codificarse
	$url = "?sesion&fecha =". rawurlencode($fecha);
	//Determinación de la fecha y de la hora
	//del inicio de sesion
	$actual = 'Hoy es el día '.date('d/m/Y').' son las ' .date('H:i:s');
	
?>
<html>
	<head>
		<title>Acceso Tienda</title>
	</head>

	
<body> 
		<?= $actual; ?></b><br>
		<?= $mensaje; ?><br>
		<form name="input" method="post" >
			<table>			
				<caption>Tienda</caption>
				
				<tr>
					<td>
						<b>Escoge producto</b>
					</td>
					<td>
						<?php
							//bbdd conexion
							$serverName = "C6PC6\SQLEXPRESS"; //serverName\instanceName
							$connectionInfo = array("Database" => "Compras", "CharacterSet" => "UTF-8");
							$conn = sqlsrv_connect($serverName, $connectionInfo);
							////////averiguar especialidad///////////
							$sqlProductos = "SELECT NombreProducto FROM Productos ;";
							$cursorProductos = sqlsrv_query($conn, $sqlProductos);
							if ($cursorProductos) {
								echo "<select name='NombreProducto' id='NombreProducto'>";
									while( $fila = sqlsrv_fetch_array( $cursorProductos, SQLSRV_FETCH_ASSOC) ) {
										echo "<option value='".$fila['NombreProducto']."'>".$fila['NombreProducto']."</option>";
									}
								echo "</select>";
							}

							sqlsrv_free_stmt($cursorProductos);//liberas cursor
						?>	
					</td>
				</tr>
				
				<tr>
					<td>
						<b>¿Cuantos articulos?</b>
					</td>
					<td>
						<input type="text" value="" name="numeroProducto"><br>
						<br>
					</td>
				</tr>
				
				
				
			</table>
			
		</table>
	
		<input type="submit" name="Enviar" value="Enviar"/>
		</form>
		<?php
			
	
				
			//SI LE DAMOS AL BOTON AGREGAR
			if(isset($_POST['Enviar'])) {
				$numeroProducto = $_POST['numeroProducto'];
				$NombreProducto = $_POST['NombreProducto'];
				//averiguar stock
				$sqlPRODUCTOver = "SELECT Productos.StockProducto FROM Productos WHERE Productos.NombreProducto LIKE '$NombreProducto';";
				$NUMPRODUCTO;
				$cursor3 = sqlsrv_query($conn, $sqlPRODUCTOver);
				if ($cursor3) {
						while( $fila = sqlsrv_fetch_array( $cursor3, SQLSRV_FETCH_ASSOC) ) {
							
							  $NUMPRODUCTO =$fila['StockProducto'];
						}
				}
				sqlsrv_free_stmt($cursor3);//liberas cursor
				if($NUMPRODUCTO <1){
					echo "Este producto ya no tiene stock"."<br>";					
				}else{
					//COMPROBAR QUE EL PEDIDO NO SUPERE EL STOCK
					//sacamos el numero de productos
					echo 'Total Stock anterior '. $NUMPRODUCTO."<br>";
					$STOCK_despues_comprar=0;
					$STOCK_despues_comprar = $NUMPRODUCTO - $numeroProducto ;
					if($STOCK_despues_comprar < 0){
						echo "No puedes comprar mas del stock"."<br>";
					}else{
						//bbdd conexion
						/////calcular precio venta
						$sqlPrecioProducto = "SELECT PrecioProducto , IVA  FROM Productos WHERE NombreProducto='".$NombreProducto."';";
						$precio;
						$iva;
						$cursorPrecioProductos = sqlsrv_query($conn, $sqlPrecioProducto);
						//comprobaremos que el producto tenga stcok
						if ($cursorPrecioProductos) {
							while( $fila = sqlsrv_fetch_array( $cursorPrecioProductos, SQLSRV_FETCH_ASSOC) ) {
								$precio = $fila['PrecioProducto'];
								$iva = $fila['IVA'];
							}
						}

						sqlsrv_free_stmt($cursorPrecioProductos);//liberas cursor
						
						
						$totalProducto =0.0;
						$totalProducto = (($precio*$numeroProducto)/100)*(100+$iva);
						echo "El IVA es del ".$iva."%<br>";
						echo "La factura es de ".$totalProducto." euros<br>";
						echo $numeroProducto. ' ' .$NombreProducto."<br>";
						//restar producto tienda//
						
						
						//MODIFICAR DATOS EN EL STOCK
						$sqlUPDATE_ALTERAR_STOCK="update Productos set StockProducto='".$STOCK_despues_comprar."' where NombreProducto='".$NombreProducto."';";

						//Inicializacion parametros y prepara la sentencia
						//Las variables $cantidad e $id están unidas a la sentencia $cursor
						$cursor4 = sqlsrv_query($conn, $sqlUPDATE_ALTERAR_STOCK);

						//consume el primer resultado (filas afectadas por UPDATE) sin llamar a sqlsrv_next_result
						echo "Filas afectadas : ". sqlsrv_rows_affected($cursor4). "<br>";
						echo 'Total Stock despues '. $STOCK_despues_comprar."<br>";; 
						sqlsrv_free_stmt($cursor4);//liberas cursor
						////FIN -MODIFICAR
						
						///AVERIGUAR DATOS CLIENTES PÀRA METER EN Ventas				
						$sqlDatosClientes = "SELECT IdCliente,NombreCliente,PrimerApellidoCliente,SegundoApellidoCliente,dniCliente FROM Clientes WHERE UsuarioCliente='".$usuarioClienteComprobar."';";
						$IDCLIENTE;
						$NOMBRECLIENTE;
						$APELLIDO1CLIENTE;
						$APELLIDO2CLIENTE;
						$DNICLIENTE;
						$cursor1 = sqlsrv_query($conn, $sqlDatosClientes);
						if ($cursor1) {
								while( $fila = sqlsrv_fetch_array( $cursor1, SQLSRV_FETCH_ASSOC) ) {
									$IDCLIENTE  =$fila['IdCliente'];
									$NOMBRECLIENTE =$fila['NombreCliente'];
									$APELLIDO1CLIENTE =$fila['PrimerApellidoCliente'];
									$APELLIDO2CLIENTE =$fila['SegundoApellidoCliente'];
									$DNICLIENTE =$fila['dniCliente'];
								}
						}	

						if($cursor1 === false) {
							die( print_r( sqlsrv_errors(), true));
						}
						sqlsrv_free_stmt($cursor1);//liberas cursor
						
						//AVERIGURAR DAROS PRODUCTOS PARA METER EN VENTAS
						$sqlDatosProductos = "SELECT IdProducto FROM Productos WHERE NombreProducto LIKE '$NombreProducto' ";
						$IDPRODUCTO;
						$cursor2 = sqlsrv_query($conn, $sqlDatosProductos);
						if ($cursor2) {
								while( $fila = sqlsrv_fetch_array( $cursor2, SQLSRV_FETCH_ASSOC) ) {
									$IDPRODUCTO =$fila['IdProducto'];
								}
						}	

						if($cursor2 === false) {
							die( print_r( sqlsrv_errors(), true));
						}
						sqlsrv_free_stmt($cursor2);//liberas cursor
						
						//INSERTAR EN BBDD VENTAS
						$sqlInsertarVentas = "INSERT INTO Ventas (IdCliente,IdProducto,NombreProducto,NombreCliente,PrimerApellidoCliente,SegundoApellidoCliente,dniCliente,UnidadesPedidas,PrecioProducto,IVA, PrecioFinal)
						VALUES(?,?,?,?,?,?,?,?,?,?,?)";
						$PARAMS = array($IDCLIENTE,$IDPRODUCTO,$NombreProducto,$NOMBRECLIENTE,$APELLIDO1CLIENTE,$APELLIDO2CLIENTE,$DNICLIENTE,$numeroProducto,$precio,$iva, $totalProducto);
						$cursorInsercionVentas = sqlsrv_query($conn, $sqlInsertarVentas, $PARAMS);

								if ($cursorInsercionVentas === false) {
									echo "ha fallado<br>";
									die(print_r(sqlsrv_errors(), true));
								}else{
									echo "Venta introducido con exito"."<br>";
								}
						sqlsrv_free_stmt($cursorInsercionVentas);//liberas cursor
						sqlsrv_close($conn);//cierras conexion
					}
					
					
					
				}//fin comprobacion stock
					
			}
		
		?>		

</body>
</html>