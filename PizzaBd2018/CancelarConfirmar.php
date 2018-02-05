<?php
session_start();
include 'Cliente.php';
include_once 'Conexion.php';
include 'Funciones.php';
//include 'Pedido.php';
include 'LineaPedido.php';
include 'ExtrasPedido.php';
include 'Extras.php';
include 'Precios.php';
include 'Tamanio.php';
include 'Pizza.php';
//recibimos objetos por sesion
$cliente = unserialize($_SESSION['cliente']);
$_SESSION['cliente'] = serialize($cliente);
//recibimos todos los pedidos y su datos
$arrayTOTALdatosPEDIDOS = unserialize($_SESSION['arrayTOTALdatosPEDIDOS']);
$arrayTOTALNECESARIOINSERCIONES = unserialize($_SESSION['arrayTOTALNECESARIOINSERCIONES']);
$totalFacturaPedidos = unserialize($_SESSION['totalFacturaPedidos']);
$arrayImportes  = unserialize($_SESSION['arrayImportes']);
$boolConfirmacion  = unserialize($_SESSION['boolConfirmacion']);

?>
 <html>
     <head>
         	<title>BIENVENIDOS A PIZZA NET</title>
         	<meta charset="utf-8" />
         	<link rel="stylesheet" type="text/css" href="estilos.css">
     </head>
 <body>
 	<h1 class="tituloPresentacion">PIZZA NET PEDIDOS</h1>
 	<!-- HEADER  -->
  <header>
    <div id="parteCentralIzquierda"><img src="imagenes/pizza.jpg"></div>
    <div id="parteCentralCentral"><h4>Cambia tu idea de la pizza</h4></div>
    <?php
      $fecha = date('d/m/Y');
      $hora = date('H:i:s');
      echo '<div id="parteCentralDerecha">FECHA: <input type="text" value="'.$fecha.'"><br>HORA<input type="text" value="'.$hora.'"></div>';
    ?><div class="aclarar"></div>
  </header>

 	<!-- SECTION 1-->
     <section class="seccionFINAL">
           <?php ////este es para el caso en que haya cofirmado en el caso de que no haya pedidos
                if(count($arrayTOTALdatosPEDIDOS) < 1 && isset($_POST['Confirmar'])){
                    $mensaje= "<form id=".'formularioRegreso'." action=".'IndexPizzaBd.php'."><table><tr><td>Lo sentimos
                      ". " ".$cliente->getNombre()."En el envío de este pedido no consta ninguna petición de pizza.
                    Muchas gracias por su visita</tr></td>
                    <tr><td><input type=".'submit'." value=".'Inicio'. " name=".'Enviar'." class=".'centroBoton'.">
                    </td></tr></table></form>";
                    echo '<div id="mensajeConfirmar" >'.$mensaje.'</div>';
                    //Borramos las variables que ya no nos haran falta
                    unset($cliente);
                    unset($arrayTOTALdatosPEDIDOS);
                    unset($arrayTOTALNECESARIOINSERCIONES);
                    unset($totalFacturaPedidos);
                    unset($arrayImportes);
                    unset($_SESSION);//se carga todo los datos de la sesion
                }//este if es para el caso en que cancele
                elseif(isset($_POST['Cancelar']) && !isset($_POST['Confirmar'])){
                      $mensaje= "<form id=".'formularioRegreso'." action=".'IndexPizzaBd.php'."><table><tr><td>Lo sentimos
                       ".$cliente->getNombre()."Has cancelado tu pedido. Si deseas volver a pedir da a inicio .
                      Muchas gracias por su visita</tr></td>
       						    <tr><td><input type=".'submit'." value=".'Inicio'. " name=".'Enviar'." class=".'centroBoton'.">
         						  </td></tr></table></form>";
                      echo '<div id="mensajeConfirmar" >'.$mensaje.'</div>';
         						  //Borramos las variables que ya no nos haran falta
        						  unset($cliente);
                      unset($arrayTOTALdatosPEDIDOS);
                      unset($arrayTOTALNECESARIOINSERCIONES);
                      unset($totalFacturaPedidos);
                      unset($arrayImportes);
         						  unset($_SESSION);//unset($_SESSION); se carga todo los datos de la sesion
                }//este if es por si confirma los pedidos y se hacen las inserciones
                elseif(isset($_POST['Confirmar']) && count($arrayTOTALdatosPEDIDOS) > 0 && !isset($_POST['Cancelar'])  && $boolConfirmacion == false){
                      $mensaje= "<form id=".'formularioRegreso'." action=".'IndexPizzaBd.php'.">
                      <table>
                          <tr>
                              <td>!OIDO COCINA!
                							     AVISAD A , ".$cliente->getNombre() .", y le serviremos su pedido en 10 minutos para llevarlo
                                   a su dirección ".$cliente->getDireccion() .". Si hay algún problema nos pondremos en contacto a traves de su
                                   teléfono : ".$cliente->getTlfno() ." o a traves de su email : ".$cliente->getECorreo() ."
                               </td>
                           </tr>
                           <tr>
                               <td style='color:red;''>
                                  <br><br> TOTAL DE LA FACTURA
                                  ".$totalFacturaPedidos."<br><br>
                                </td>
                            </tr>
   							           <tr>
                                <td>
                                    <input type=".'submit'." value=".'Inicio'. " name=".'Enviar'." class=".'centroBoton'.">
  						                  </td>
                           </tr>
                      </table>
                      </form>";

         						  echo '<h1>RESUMEN PEDIDO'.'</h1><br>';
                      echo '<img id="repartidor" src="imagenes/repartidor.png">';

                       echo '<div id="mensajeCancelar" >'.$mensaje.'</div>';
                       recorrerPedidoTOTAL($arrayTOTALdatosPEDIDOS);
                       ///HABRA QUE HACER TODAS LAS INSERCCIONES EN LA MISMA TRANSACCION
                       //si estan dentrop de la misma transaccion tiene que usar la misma conexion
                       //INSERTMAOS LOS OBEJTOS CON LOS DATOS AVERIGUADOS
                       //iNICIAMOS DATOS NECESARIOS PARA LAS INSERCCIONES QUE LUEGO SACAMOS DE $arrayTOTALNECESARIOINSERCIONES
                       $idPRECIO = 0;
                       $numeroPizzas = 0;
                       $masaPizza = '';
                       $idExtras = [];
                       $tipoPizza = '';
                       $tamanoPizza = '';
                       try
                       {
                             $con = empezarConexion();
							               $con->beginTransaction();
                             $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

                             /////////INSERTAMOS EL CLIENTE
                             //COMPROBAR QUE EXISTE EL CLIENTE PARA INSERTARLO CON EL METODO existeCLIENTE O NO
                             $boolCliente = existeCliente($con,$cliente->getNombre(),$cliente->getDireccion(),$cliente->getTlfno(),$cliente->getECorreo());
                             if($boolCliente){
                                  introducirCliente($con,$cliente->getNombre(),$cliente->getDireccion(),$cliente->getTlfno(),$cliente->getECorreo());
                                  echo '<h1 class="clientes">VEMOS QUE ES SU PRIMERA VEZ. GRACIAS POR CONFIAR EN NOSOTROS</h1><br>';
                             }else{
                                  echo '<h1 class="clientes">VEMOS QUE ES UN CLIENTE ANTIGUO. GRACIAS POR VOLVER A CONFIAR EN NOSOTROS</h1><br>';
                             }

                             //AVERIGUAMOS EL ID DEL Cliente
                             $idCliente = averiguarIdCliente($con,$cliente->getNombre(),$cliente->getDireccion(),$cliente->getTlfno(),$cliente->getECorreo());
                             $cont =0;
                             //esta funcion inserta el pedido y a la vez devuelve el id del pedido
                             ////////////INSERTAMOS PEDIDO
                             $booleanoSERVIDO = true;
                             $importe = $arrayImportes[$cont];
                             $importe = (float)$importe;
                             $idPEDIDO = insertarPedido($con,$idCliente,$booleanoSERVIDO,$importe);//ponemos bit 1
                             //recorremso el array por sesion con los datos necesarios para insertar extras y linea pedidos
                             foreach ( $arrayTOTALNECESARIOINSERCIONES as $key1 => $value1) {

                                $idPRECIO = 0;
                                $numeroPizzas = '';
                                $masaPizza = '';

                                $idExtras = [];
                                $tipoPizza = '';
                                $tamanoPizza = '';
                                 //$pedido = devolverObjetoPedido($con,$idCliente);
                                 $cont++;
                                      foreach ($value1 as $key2 => $value2) {
                                        if($key2 == 'idPRECIO'){
                                          $idPRECIO = $value2;
                                        }elseif($key2 == 'numeroPizzas'){
                                          $numeroPizzas = $value2;
                                        }elseif($key2 == 'masaPizza'){
                                          $masaPizza = $value2;
                                        }elseif($key2 == 'idExtras'){
                                          $idExtras = $value2;
                                        }elseif($key2 == 'TIPO PIZZA'){
                                          $tipoPizza = $value2;
                                        }elseif($key2 == 'TAMAÑO PIZZA'){
                                          $tamanoPizza = $value2;
                                        }

                                      }
                                  /////el bucle acaba aqui
                                  ///////////////////////////INSERTAMOS LINEA PEDIDO, EL IDPEDIDO YA LO TENEMOS
                                  introducirLineaPedido($con,$idPEDIDO,$idPRECIO,$numeroPizzas,$masaPizza,$tipoPizza,$tamanoPizza);
                                  //INSERTAMOS LOS Etras del pedido en la TABLA EXTRASPÈDIDO
                                  introducirExtrasPedido($con,$idPEDIDO,$idPRECIO,$idExtras);
                             }
                             $con->commit();
                       }//fin del try
                       catch(PDOException $ex){
                         die(print_r($ex->getMessage()));
                         $con->rollBack();
                       }finally{
                         $con = null;
                       }
                      //pongo la confirmacion a true para la recargar
                      $boolConfirmacion = true;
                      $_SESSION['boolConfirmacion'] = serialize($boolConfirmacion);
         							//por ultimo destruyo los objetos. Tambien la sesion
                      //Borramos las variables que ya no nos haran falta
        						  unset($cliente);
                      unset($arrayTOTALdatosPEDIDOS);
                      unset($arrayTOTALNECESARIOINSERCIONES);
                      unset($totalFacturaPedidos);
                      unset($arrayImportes);
         						  unset($_SESSION);//unset($_SESSION); se carga todo los datos de la sesion
                }elseif(isset($_POST['Confirmar']) && $boolConfirmacion == true){//con else has recargado la pagina
         						 $mensaje= "<form id=".'formularioRegreso'." action=".'IndexPizzaBd.php'."><table><tr><td>Al recargar o actualizar la páginas has perdido los datos.
         						 Si ya has enviado el pedido ya está en nuestra base datos así que ya ha sido enviado y no debes preucuparte. Si diste a cancelar y quieres pedir da
         						  a inicio.</tr></td>
         						 <tr><td><input type=".'submit'." value=".'Inicio'. " name=".'Enviar'." class=".'centroBoton'.">
         						 </td></tr></table></form>";
         						 echo '<div id="mensajeConfirmar" >'.$mensaje.'</div>';
                     //por ultimo destruyo los objetos. Tambien la sesion
                     //Borramos las variables que ya no nos haran falta
                     unset($cliente);
                     unset($arrayTOTALdatosPEDIDOS);
                     unset($arrayTOTALNECESARIOINSERCIONES);
                     unset($totalFacturaPedidos);
                     unset($arrayImportes);
                     unset($_SESSION);//unset($_SESSION); se carga todo los datos de la sesion
     					 }
           ?>

     </section>



 	<!-- FOOTER -->
     <footer>
 				<h1>www.pizzanet.com</h1>
     </footer>
 </body>
 </html>
