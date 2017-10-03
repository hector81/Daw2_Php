<?php
//http://www.mclibre.org/consultar/php/lecciones/php_expresiones_regulares.html
session_start();
include 'Carrito.php';
include 'Articulo.php';
$carrito= new Carrito();
//if(//hay que comprobar que la sesion del carrito este iniciada)
//para la fecha
$hoy = date("20y-m-d");
echo "Día de hoy: ".$hoy."<br>";
$hoyHora = date("h:i"); 
echo "Hora de hoy: ".$hoyHora."<br>";
//para la identificacion
$ComprobarUsuario = $_SESSION['USUARIO_COMPROBADO'] ;
$usuarioClienteComprobar = $_SESSION['USUARIO_CLIENTE'] ;


if($ComprobarUsuario == false){
	echo 'Bienvendio a tienda ' .$usuarioClienteComprobar.'<br />';

}else{
	echo 'Datos incorrectos<br>';
}	

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
	
	//bbdd conexion
	$serverName = "C6PC6\SQLEXPRESS"; //serverName\instanceName
	$connectionInfo = array("Database" => "Compras", "CharacterSet" => "UTF-8");
	$conn = sqlsrv_connect($serverName, $connectionInfo);
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
	$nuevaConexionOno= "select IdCliente from LogCliente where IdCliente='".$IDCLIENTE ."';";
	$stmtComprobacion=sqlsrv_query($conn, $nuevaConexionOno);
	$numFilas = sqlsrv_num_rows($stmtComprobacion);	
	if($numFilas=== false){
		//insertar log
		//INSERTAR EN BBDD VENTAS
		$sqlInsertarLogUsuario = "INSERT INTO LogCliente (IdCliente,HoraConexion,CierreConexion,onlineCliente)
		VALUES(?,?,?,?)";
		$PARAMSLOG = array($IDCLIENTE,date('d/m/Y'). ' '.date('H:i:s'),date('d/m/Y'). ' '.date('H:i:s'),1);
		$cursorInsercionlOGuSUARIO = sqlsrv_query($conn, $sqlInsertarLogUsuario, $PARAMSLOG);

				if ($cursorInsercionlOGuSUARIO === false) {
					echo "ha fallado<br>";
					die(print_r(sqlsrv_errors(), true));
				}else{
					echo "conexion con exito"."<br>";
				}
					sqlsrv_free_stmt($cursorInsercionlOGuSUARIO);//liberas cursor
	}else{
		$updateLOG="update LogCliente set  HoraConexion ='".date('H:i:s').' '.date('d/m/Y')."' where IdCliente='".$IDCLIENTE."';";
		$cursor9 = sqlsrv_query($conn, $updateLOG);

		sqlsrv_free_stmt($cursor9);//liberas cursor
	}
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
		<input type="submit" name="Cerrar" value="Cerrar Sesion"/>
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

						$articulo = new Articulo($NombreProducto, $precio, $numeroProducto);
						$carrito->agregarProductoCarrito($articulo) ;
						$mostarCarro=$carrito->getPedidos();
						echo "<table><tr><td>Nombre</td><tr><td>Precio</td><tr><td>Cantidad</td><tr><td>Total</td></tr>";
						for($i=0; $i<$mostarCarro.lenght; $i++){
							echo "<tr>".$mostarCarro[i]->getNombre()."</td><td>".$mostarCarro[i]->getPrecio()."</td><td>".$mostarCarro[i]->getCantidad()."</td></tr>";
						}
						
						
						//$_SESSION['carrito']= //serializarlo el carrito
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
						
						
						//AHORA AGREGAMOS EL PRODUCTO COMPRADO AL CARRITO DE LA COMPRA
						//
				
						
						
					}
					sqlsrv_close($conn);//cierras conexion
					
					
				}//fin comprobacion stock
					
			}elseif(isset($_POST['Cerrar'])) {
				$salida = date('d/m/Y'). ' '.date('H:i:s');
				//MODIFICAR DATOS EN EL STOCK
				$sqlUPDATE_ALTERAR_STOCK="update LogCliente set CierreConexion ='".$salida."' ,onlineCliente ='0' where IdCliente='".$IDCLIENTE."';";

				//Inicializacion parametros y prepara la sentencia
				//Las variables $cantidad e $id están unidas a la sentencia $cursor
				$cursor4 = sqlsrv_query($conn, $sqlUPDATE_ALTERAR_STOCK);

				//consume el primer resultado (filas afectadas por UPDATE) sin llamar a sqlsrv_next_result
				echo "Filas afectadas : ". sqlsrv_rows_affected($cursor4). "<br>";
				echo 'Total Stock despues '. $STOCK_despues_comprar."<br>";; 
				sqlsrv_free_stmt($cursor4);//liberas cursor
						////FIN -MODIFICAR
				session_destroy();
				sqlsrv_close($conn);//cierras conexion
				header('Location: http://localhost/ejercicios%20php/Pagina%20de%20Compras%20con%20sesiones/Indice.php');
			}
		
		?>		

</body>
</html>