<html>

<head>
	<title>BIENVENIDOS A PIZZA NET</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="estilos.css">
</head>

<body>
	<h1>BIENVENIDOS A PIZZA NET</h1>

	<!-- HEADER  -->
    <header>
      <div id="parteCentralIzquierda"><img src="imagenes/pizza.jpg"></div>
      <?php
        $fecha = date('d/m/Y');
        $hora = date('H:i:s');
        echo '<div id="parteCentralDerecha">FECHA: <input type="text" value="'.$fecha.'"><br>HORA<input type="text" value="'.$hora.'"></div>';
      ?><div class="aclarar"></div>
    </header>

	<!-- SECTION 1-->
    <section class="seccionFINAL">
          <?php
           session_start();
           include 'Funciones.php';
           if(isset($_POST['Cancelar'])){
             $mensaje= "<form id=".'formularioRegreso'." action=".'PizzaNet.php'."><table><tr><td>La empresa esta su entera disposicion y desea saber si tiene alguna queja por el servicio ofrecido para poder mejorar en la calidad del servicio.
             Muchas gracias por su visita</tr></td>
						 <tr><td><input type=".'submit'." value=".'Inicio'. " name=".'Enviar'." class=".'centroBoton'.">
						 </td></tr></table></form>";
             echo '<div id="mensajeConfirmar" >'.$mensaje.'</div>';
						 //Borramos las variables que ya no nos haran falta
						 unset($arrayPedidos);
						 unset($_SESSION['nombre']);
						 unset($_SESSION['direccion']);
						 unset($_SESSION['email']);
						 unset($_SESSION['telefono']);
						 unset($_SESSION['facturaTotal']);
						 //unset($_SESSION); se carga todo los datos de la sesion
						 acabarSesion();
						 unset($_SESSION);
						 //session_destroy();
						 //session_unset();
           }elseif(isset($_POST['Confirmar'])){
             $mensaje= "<form id=".'formularioRegreso'." action=".'PizzaNet.php'."><table><tr><td>Le damos gracias por su confianza, ".$_SESSION['nombre'] .", y le enviaremos su pedido en menos de media hora
              a su dirección ".$_SESSION['direccion'] .". Si hay algún problema nos pondremos en contacto a traves de su
              teléfono : ".$_SESSION['telefono'] ." o a traves de su email : ".$_SESSION['email'] .".</tr></td>
							<tr><td><input type=".'submit'." value=".'Inicio'. " name=".'Enviar'." class=".'centroBoton'.">
 						 </td></tr></table></form>";
						  echo '<h1>RESUMEN PEDIDO'.'</h1><br>';
              echo '<img id="repartidor" src="imagenes/repartidor.png">';
							$arrayPedidos = $_SESSION['arrayPedidos'];
							recorrerPedidosClienteFINAL($arrayPedidos);
							echo '<div id="facturaTotal">TOTAL FACTURA = '.$_SESSION['facturaTotal'].'</div>';
              echo '<div id="mensajeCancelar" >'.$mensaje.'</div>';
							//por ultimo destruyo los arrays de arrayPedidos y cliente. Tambien la sesion
							unset($arrayPedidos);
							unset($_SESSION['nombre']);
							unset($_SESSION['direccion']);
							unset($_SESSION['email']);
							unset($_SESSION['telefono']);
							unset($_SESSION['facturaTotal']);
							//unset($_SESSION); se carga todo los datos de la sesion
							acabarSesion();
							unset($_SESSION);
							//session_destroy();
							//session_unset();
           }else{//con else has recargado la pagina
						 $mensaje= "<form id=".'formularioRegreso'." action=".'PizzaNet.php'."><table><tr><td>Al recargar o actualizar la páginas has perdido los datos.
						 Si ya has enviado el pedido ya está en nuestra base datos así que ya ha sido enviado y no debes preucuparte. Si diste a cancelar y quieres pedir da
						  a inicio.</tr></td>
						<tr><td><input type=".'submit'." value=".'Inicio'. " name=".'Enviar'." class=".'centroBoton'.">
						</td></tr></table></form>";
						 echo '<div id="mensajeConfirmar" >'.$mensaje.'</div>';
					 }


        ?>





    </section>



	<!-- FOOTER -->
    <footer>
				<h1>www.pizzanet.com</h1>
    </footer>
</body>
</html>
