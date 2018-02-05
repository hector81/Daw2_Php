<?php
session_start();
//para llamar al archivo function_exists
include 'Cliente.php';
include_once 'Conexion.php';
include 'Funciones.php';
include 'LineaPedido.php';
include 'ExtrasPedido.php';
include 'Precios.php';
include 'Tamanio.php';
include 'Pizza.php';
//RECIBIMOS LOS DATOS POR sesion//esto es para luego introducir un array total

//esto es para luego introducir un array de pedidos
$arrayTOTALdatosPEDIDOS = unserialize($_SESSION['arrayTOTALdatosPEDIDOS']);
$arrayTOTALNECESARIOINSERCIONES = unserialize($_SESSION['arrayTOTALNECESARIOINSERCIONES']);
$arrayImportes = unserialize($_SESSION['arrayImportes']);

$cliente = unserialize($_SESSION['cliente']);//se puede enviar un array por POST
$_SESSION['cliente'] = serialize($cliente);

$totalFacturaPedidos = unserialize($_SESSION['totalFacturaPedidos']);
$_SESSION['totalFacturaPedidos'] = serialize($totalFacturaPedidos);
//esto es para las recargas de la confirmación
$boolConfirmacion = false;
$_SESSION['boolConfirmacion'] = serialize($boolConfirmacion);
?>
<html>
  <head>
    <title>Pizza Net</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="estilos.css">
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
          <section id="contenedor">
              <!-- SECTION 2-->
              <section id="principal">
                  <?php ensenarDatosPreciosPizzas(); ?>
              </section>
              <!-- ASIDE -->
              <aside class="izquierdaAside">
                <h2>PEDIDO</h2>
                <?php
                if(isset($_POST['Borrar'])){

                  //recibimos el arrayPedidos por sesion cada vez que enviamos otro pedido
                  $arrayTOTALdatosPEDIDOS = unserialize($_SESSION['arrayTOTALdatosPEDIDOS']);
                  $arrayTOTALNECESARIOINSERCIONES = unserialize($_SESSION['arrayTOTALNECESARIOINSERCIONES']);

                  //borramos el pedido por posicion
                  $posicionBorrar = trim($_POST['indice']);
                  $arrayTOTALdatosPEDIDOS =borrarPedidoArrayPosicion($posicionBorrar,$arrayTOTALdatosPEDIDOS);
                  $arrayTOTALNECESARIOINSERCIONES =borrarPedidoArrayPosicion($posicionBorrar,$arrayTOTALNECESARIOINSERCIONES);
                  $arrayImportes =borrarPedidoArrayPosicion($posicionBorrar,$arrayImportes);
                  //para poner bien el totalPrecio
                  $totalFacturaPedidos = unserialize($_SESSION['totalFacturaPedidos']);
                  $totalFacturaPedidos = averiguarPreciosTotalesEnCasoBorrado($arrayTOTALdatosPEDIDOS);
                  $_SESSION['totalFacturaPedidos'] = serialize($totalFacturaPedidos);
                  //volvemos a enviar otra el id y el arrayPedidos por si acaso se hace otro pedido
                  $_SESSION['arrayTOTALdatosPEDIDOS'] = serialize($arrayTOTALdatosPEDIDOS);
                  $_SESSION['arrayTOTALNECESARIOINSERCIONES'] = serialize($arrayTOTALNECESARIOINSERCIONES);
                  $_SESSION['arrayImportes'] = serialize($arrayImportes);
                  echo '<div class="errorAviso">HAS BORRADO UN PEDIDO</div>';
                }
                if(isset($_POST['Enviar'])){
                    if(empty($_POST['tipoPizza']) || !isset($_POST['tipoPizza'])){
                        echo '<div class="errorAviso">El tipo de pizza debe ponerse.</div><br>';generarErrorVuelta();
                    }elseif(empty($_POST['tamanoPizza']) || !isset($_POST['tamanoPizza'])){
                        echo '<div class="errorAviso">El tamaño de pizza debe ponerse.</div><br>';generarErrorVuelta();
                    }elseif(empty($_POST['masaPizza']) || !isset($_POST['masaPizza'])){
                        echo '<div class="errorAviso">La masa de pizza debe ponerse.</div><br>';generarErrorVuelta();
                    }
                    //elseif(empty($_POST['extrasPizza']) || !isset($_POST['extrasPizza'])){
                    //    echo 'El extra de pizza debe ponerse.<br>';ensenarDatosPreciosPizzas();generarErrorVuelta();
                    //}
                    elseif(empty($_POST['cantidadPizzas']) || !isset($_POST['cantidadPizzas'])){
                        echo '<div class="errorAviso">La cantidad de pizzas debe ponerse.</div><br>';generarErrorVuelta();
                    }elseif(!is_numeric ($_POST['cantidadPizzas'])){
                        echo '<div class="errorAviso">La cantidad debe ser numérica.</div><br>';generarErrorVuelta();
                    }else{//else 1º

                        //efectuamos operaciones para sacar los datos por POST
                        $tipoPizza = $_POST['tipoPizza'];
                        if(comprobarPizzaYapedida($arrayTOTALNECESARIOINSERCIONES,$tipoPizza) == true){
                            echo '<div class="errorAviso">No se puede pedir otra pizza del mismo tipo . Quizás haya ocurrido
                            porque hayas recargado la página o por equivocación.</div><br>';generarErrorVuelta();
                        }else{
                          $cantidadPizzas = $_POST['cantidadPizzas'];
                          $tamanoPizza = $_POST['tamanoPizza'];
                          $masaPizza = $_POST['masaPizza'];
                          $extrasArray = [];//lo creamos vacio
                          //los extras no son obligatorios
                          if(!empty($_POST['extrasPizza'])){
                            $extrasArray = $_POST['extrasPizza'];
                          }else{
                            $extrasArray = $extrasArray;
                          }
                          $numeroPizzas = $_POST['cantidadPizzas'];
                          //ESTOS DATOS LOS ENVIO POR SESION POR SI RECARGA LA PAGINA
                          $_SESSION['tipoPizza'] = $tipoPizza;
                          $_SESSION['cantidadPizzas'] = $cantidadPizzas;
                          $_SESSION['tamanoPizza'] = $tamanoPizza;
                          $_SESSION['masaPizza'] = $masaPizza;
                          $_SESSION['extrasPizza'] = $extrasArray;

                          //INICIO VARIABLES NECESARIAS
                          $idPizza = 0;
                          $IdTamanio = 0;
                          $idExtras = [];
                          $idPRECIO = 0;
                          $preciosExtras = 0;
                          $preciosTamanioPizza = 0;
                          //hacemos averiguaciones con una sola transacción
                          try{
                              $con = empezarConexion();
                              $con->beginTransaction();
                              $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                              $idPizza = averiguarIdPizza($con,$tipoPizza);//AVERIGUAMOS EL ID DE LA PIZZA
                              $descripcion = averiguarDescripcionPizza($idPizza);//averiguamos descripcion pizza
                              $objetoPizza = new Pizza($idPizza,$tipoPizza,$descripcion);//creamos un objeto pizza
                              $IdTamanio = averiguarIdTamanio($con,$tamanoPizza);//AVERIGUAMOS EL ID DE TAMANIO
                              $objetoTamanio  = new Tamanio($IdTamanio,$tamanoPizza);//creamos un objeto tamanio
                              $idPRECIO = averiguarIdPrecioPizza($con,$IdTamanio,$idPizza);//averiguar IDPRECIO
                              //creamos un objeto precios
                              $pv = averiguarPVprecios($con,$idPRECIO,$idPizza,$IdTamanio);//averigumaos los pv precios
                              $objetoPrecio  = new Precios($idPRECIO,$idPizza,$IdTamanio,$pv);//creamos un objeto tamanio
                              $idExtras = averiguarIdExtas($con,$extrasArray);//AVERIGUAMOS los id de EXTRAS
                              $preciosExtras = averiguarPreciosTotalExtras($con,$idExtras);//averiguar precio CON LOS datos
                              $preciosTamanioPizza = averiguarPrecioTamanio($con,$IdTamanio,$idPizza);//averiguar precio TAMANIO
                              $con->commit();
                          }catch(PDOException $ex){
                            die(print_r($ex->getMessage()));
                            $con->rollBack();
                          }finally{
                            $con = null;
                          }

                          $totalPrecio =($preciosExtras + $preciosTamanioPizza)*$numeroPizzas;
                          //acumulamos el total de los posibles pedidos para enviarlos por sesion
                          $totalFacturaPedidos += $totalPrecio;//sumamos todos los precios al total
                          $_SESSION['totalFacturaPedidos'] = serialize($totalFacturaPedidos);

                          //esto es para los arrayImportes
                          $arrayImportes = anadirPedidoArray($totalPrecio,$arrayImportes);
                          $_SESSION['arrayImportes'] = serialize($arrayImportes);

                          //ENVIAMOS DATOS POR sesion
                          $_SESSION['idPizza'] = serialize($idPizza);
                          $_SESSION['IdTamanio'] = serialize($IdTamanio);
                          $_SESSION['masaPizza'] = serialize($masaPizza);
                          $_SESSION['idExtras'] = serialize($idExtras);
                          $_SESSION['idPRECIO'] = serialize($idPRECIO);
                          $_SESSION['numeroPizzas'] = serialize($numeroPizzas);
                          $_SESSION['totalPrecio'] = serialize($totalPrecio);

                          /////////////////////////////////
                          //EL CLIENTE YA LO HEMOS ENVIADO POR SESION Y NO HACE FALTA VOLVER A HACERLO
                          $objetoPedido = array(
                            'TIPO PIZZA = ' => $tipoPizza,
                            'NUMERO PIZZAS PEDIDAS = ' => $cantidadPizzas,
                            'TAMAÑO PIZZA = ' => $tamanoPizza,
                            'MASA PIZZA = ' => $masaPizza,
                            'LOS EXTRAS DE PIZZA = ' => $extrasArray,
                            'EL PRECIO DE LOS EXTRAS ES = ' => $preciosExtras,
                            'EL PRECIO DEL TAMAÑO ES = ' => $preciosTamanioPizza,
                            'EL PRECIO TOTAL DEL PEDIDO ES  = ' => $totalPrecio
                          );
                          $arrayTOTALdatosPEDIDOS = anadirPedidoArray($objetoPedido,$arrayTOTALdatosPEDIDOS);
                          $_SESSION['arrayTOTALdatosPEDIDOS'] = serialize($arrayTOTALdatosPEDIDOS);

                          //$arrayTOTALNECESARIOINSERCIONES
                          $objetoIDSnecesarios = array(
                            'idPRECIO' => $idPRECIO,
                            'numeroPizzas' => $numeroPizzas,
                            'masaPizza' => $masaPizza,
                            'idExtras' => $idExtras,
                            'TIPO PIZZA' => $tipoPizza,
                            'TAMAÑO PIZZA' => $tamanoPizza
                          );
                          $arrayTOTALNECESARIOINSERCIONES = anadirPedidoArray($objetoIDSnecesarios,$arrayTOTALNECESARIOINSERCIONES);
                          $_SESSION['arrayTOTALNECESARIOINSERCIONES'] = serialize($arrayTOTALNECESARIOINSERCIONES);
                          /////////////////////////////////////////
                          //////////////////////////////////////////////////////

                        }//fin else comprobar dos veces el tipo pizza pedido



                    }//fin else 1º
                }//fin if isset
                ?>
                <?php
                    $cliente->recorrerCliente();//recorrer cliente
                    generarFormularioPedido();

                    echo '<h1 class="parrafoDatosDerecha" style="color:red;background:yellow;border:1px solid black;">TOTAL DE LA FACTURA = '.$totalFacturaPedidos.'</h1><br>';
                    recorrerPedidoArray($arrayTOTALdatosPEDIDOS);
                    ///esto debe salir tanto si borras, añades ,recarges o actualizes
                    echo '<div id="parteIzquierdaTercera">';
                        echo '<form name='."formularioCancelar".' action='."CancelarConfirmar.php".' method='."POST".' >';
                        echo '</table>';
                            echo '<table>';
                            echo '<td><input type='."submit".' value='."Cancelar pedido".' name='."Cancelar".' class='."centroBoton".'></td>';
                            echo '<td><input type='."submit".' value='."Confirmar pedidos".' name='."Confirmar".' class='."centroBoton".'></td>';
                        echo '</table>';
                        echo '</form>';
                    echo '</div>';
                 ?>
              </aside>
        </section>
        <!-- FOOTER -->
        <footer>
        <h1>www.pizzanet.com</h1>
        </footer>
</body>
</html>
