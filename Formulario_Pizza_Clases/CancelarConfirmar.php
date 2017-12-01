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
               include 'Cliente.php';
               include 'Pizza.php';
               include 'ListaPedidos.php';
    					 //recibimos objetos por sesion
               $listaPedidos = unserialize($_SESSION['listaPedidos']);
               $cliente = unserialize($_SESSION['cliente']);

                if(isset($_POST['Cancelar'])){
                      $mensaje= "<form id=".'formularioRegreso'." action=".'FormularioPizzaNet.php'."><table><tr><td>La empresa esta su entera disposicion y desea saber si tiene alguna queja por el servicio ofrecido para poder mejorar en la calidad del servicio.
                      Muchas gracias por su visita</tr></td>
       						    <tr><td><input type=".'submit'." value=".'Inicio'. " name=".'Enviar'." class=".'centroBoton'.">
         						  </td></tr></table></form>";
                      echo '<div id="mensajeConfirmar" >'.$mensaje.'</div>';
         						  //Borramos las variables que ya no nos haran falta
         						  unset($listaPedidos);
        						  unset($cliente);
         						  //unset($_SESSION); se carga todo los datos de la sesion
     						 unset($_SESSION);
                }elseif(isset($_POST['Confirmar'])){
                      $mensaje= "<form id=".'formularioRegreso'." action=".'FormularioPizzaNet.php'."><table><tr><td>Le damos gracias
        							por su confianza, ".$cliente->getNombre() .", y le enviaremos su pedido en menos de media hora
                       a su dirección ".$cliente->getDireccion() .". Si hay algún problema nos pondremos en contacto a traves de su
                       teléfono : ".$cliente->getTelefono() ." o a traves de su email : ".$cliente->getEmail() .".</tr></td>
         							<tr><td><input type=".'submit'." value=".'Inicio'. " name=".'Enviar'." class=".'centroBoton'.">
          						 </td></tr></table></form>";
         						  echo '<h1>RESUMEN PEDIDO'.'</h1><br>';
                      echo '<img id="repartidor" src="imagenes/repartidor.png">';
         							echo $listaPedidos->recorrerListaFinal();
        							echo $listaPedidos->calcularPedidosPrecioTotal();
                       echo '<div id="mensajeCancelar" >'.$mensaje.'</div>';
         							//por ultimo destruyo los objetos. Tambien la sesion
        							//Borramos las variables que ya no nos haran falta
          						unset($listaPedidos);
         						 	unset($cliente);
          						//unset($_SESSION); se carga todo los datos de la sesion
          						unset($_SESSION);
                }else{//con else has recargado la pagina
         						 $mensaje= "<form id=".'formularioRegreso'." action=".'FormularioPizzaNet.php'."><table><tr><td>Al recargar o actualizar la páginas has perdido los datos.
         						 Si ya has enviado el pedido ya está en nuestra base datos así que ya ha sido enviado y no debes preucuparte. Si diste a cancelar y quieres pedir da
         						  a inicio.</tr></td>
         						 <tr><td><input type=".'submit'." value=".'Inicio'. " name=".'Enviar'." class=".'centroBoton'.">
         						 </td></tr></table></form>";
         						 echo '<div id="mensajeConfirmar" >'.$mensaje.'</div>';
                     //por ultimo destruyo los objetos. Tambien la sesion
                     //Borramos las variables que ya no nos haran falta
                     unset($listaPedidos);
                     unset($cliente);
                     //unset($_SESSION); se carga todo los datos de la sesion
                     unset($_SESSION);
     					 }
           ?>

     </section>



 	<!-- FOOTER -->
     <footer>
 				<h1>www.pizzanet.com</h1>
     </footer>
 </body>
 </html>
