<?php
session_start();
//echo 'session_id = ',session_id(),'<br>';
include 'Funciones.php';
$cliente = $_SESSION['cliente'];//recibimos el cliente por sesion
//header('Location: procesamientoPedido.php');
//header( "Location:".$_SERVER['PHP_SELF'] );
?>
<html>
  <head>
    <title>Pizza Net</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="estilos.css">
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
      <section id="contenedor">
          <!-- SECTION 2-->
          <section id="principal">
          <h2>PRECIOS</h2>
            <!-- ARTICLE -->
              <article>
                <h1><span class="tituloPrecio" style="color:red;">TIPOS PIZZAS PRECIO</span></h1>
                <div class="columna1">
                    <h3><span class="negro">Margarita :</span> 4 euros</h3>
                    <img src="imagenes/pizza-margarita.jpg">
                </div>
                <div class="columna2">
                    <h3><span class="negro">Barbacoa :</span> 4.5 euros</h3>
                    <img src="imagenes/pizza-barbacoa.jpg">
                </div>
                <div class="columna3">
                    <h3><span class="negro">4 estaciones :</span> 5 euros</h3>
                    <img src="imagenes/pizza-4-estaciones.jpg">
                </div>
                <div class="columna1">
                    <h3><span class="negro">4 quesos :</span> 3.75 euros</h3>
                    <p><img src="imagenes/pizza-4-quesos.jpg">
                </div>
                <div class="columna2">
                    <h3><span class="negro">Carboranara :</span> 4 euros</h3>
                    <img src="imagenes/pizza-carbonara.jpg">
                </div>
                <div class="columna3">
                    <h3><span class="negro">Romana :</span> 5 euros</h3>
                    <img src="imagenes/pizza-romana.jpg">
                </div>
                <div class="columna1">
                    <h3><span class="negro">Mediterráneo :</span> 4.25 euros</h3>
                    <img src="imagenes/pizza-mediterranea.jpg">
                </div>
                <div class="aclarar"></div>
                <h1><span class="tituloPrecio" style="color:red;">TAMAÑOS PIZZA PRECIO</span></h1>
                <div class="columna1">
                    <h3><span class="negro">Normal :</span> 4 euros</h3>
                    <img src="imagenes/pizza-tamano-normal.jpg">
                </div>
                <div class="columna2">
                    <h3><span class="negro">Grande :</span> 5 euros</h3>
                    <img src="imagenes/pizza-tamano-grande.jpg">
                </div>
                <div class="columna3">
                    <h3><span class="negro">Familiar :</span> 6.5 euros</h3>
                    <img src="imagenes/pizza-tamano-familiar.jpg">
                </div>
                <div class="aclarar"></div>
                <h1><span class="tituloPrecio" style="color:red;">MASA PIZZA PRECIO</span></h1>
                </div>
                <div class="columna1">
                    <h3><span class="negro">Fina :</span> 2 euros</h3>
                    <img src="imagenes/pizza-masa-fina.jpg">
                </div>
                <div class="columna2">
                    <h3><span class="negro">Normal :</span> 2.5 euros</h3>
                    <img src="imagenes/pizza-masa-normal.jpg">
                </div>
                <div class="aclarar"></div>
                <h1><span class="tituloPrecio" style="color:red;">EXTRAS PIZZA PRECIO</span></h1>
                </div>
                <div class="columna1">
                    <h3><span class="negro">Queso :</span> 1 euro</h3>
                    <img src="imagenes/queso.jpg">
                </div>
                <div class="columna2">
                    <h3><span class="negro">Pimiento :</span> 1 euro</h3>
                    <img src="imagenes/pimiento.jpg">
                </div>
                <div class="columna3">
                    <h3><span class="negro">Cebolla :</span> 1 euro</h3>
                    <img src="imagenes/cebolla.jpg">
                </div>
                <div class="columna1">
                    <h3><span class="negro">Jamón :</span> 1 euro</h3>
                    <img src="imagenes/jamon.jpg">
                </div>
                <div class="columna2">
                    <h3><span class="negro">Pollo :</span> 1 euro</h3>
                    <img src="imagenes/pollo.jpg">
                </div>
              </article>
          </section>
          <!-- ASIDE -->

      <!-- ASIDE -->
      <aside>
      <?php
            if(isset($_POST['Borrar'])){
              //recibimos el arrayPedidos por sesion cada vez que enviamos otro pedido
              $arrayPedidos = $_SESSION['arrayPedidos'];

              //borramos el pedido por posicion
              $posicionBorrar = trim($_POST['indice']);
              $arrayPedidos =borrarPedidoArrayPosicion($posicionBorrar,$arrayPedidos);

              //volvemos a enviar otra el id y el arrayPedidos por si acaso se hace otro pedido
              $_SESSION['arrayPedidos'] = $arrayPedidos;
              echo 'HAS BORRADO UN PEDIDO';
            }
            if(isset($_POST['Enviar'])){
                if(empty(($_POST['tipoPizza']))){
                    echo 'El tipo de pizza debe ponerse.<br>';generarErrorVuelta();
                }elseif(empty(($_POST['tamanoPizza']))){
                    echo 'El tamaño de pizza debe ponerse.<br>';generarErrorVuelta();
                }elseif(empty(($_POST['masaPizza']))){
                    echo 'La masa de pizza debe ponerse.<br>';generarErrorVuelta();
                }elseif(empty($_POST['extrasPizza'])){//no pones trim porque es un array
                    echo 'El extra de pizza debe ponerse.<br>';generarErrorVuelta();
                }elseif(empty(($_POST['numeroPizzas']))){
                    echo 'El número de pizzas debe ponerse.<br>';generarErrorVuelta();
                }elseif((trim($_POST['numeroPizzas']))<1){
                    echo 'Por lo menos debes poner una pizza.<br>';generarErrorVuelta();
                }elseif(!is_numeric($_POST['numeroPizzas'])){
                    echo 'Debes poner un número.<br>';generarErrorVuelta();
                }else{
                    $tipoPizza = trim($_POST['tipoPizza']);
                    $tamanoPizza = trim($_POST['tamanoPizza']);
                    $masaPizza = trim($_POST['masaPizza']);
                    $extrasPizza = $_POST['extrasPizza'];//no pones trim porque es un array
                    $numeroPizzas = trim($_POST['numeroPizzas']);

                    //calculamos el precio de este pedido
                    $precioPedido = calcularPrecioPedido($tipoPizza,$tamanoPizza,$masaPizza,$extrasPizza,$numeroPizzas);
                    //creamos el pedido
                    $pedido = crearPedido($tipoPizza,$tamanoPizza,$masaPizza,$extrasPizza,$numeroPizzas,$precioPedido);

                    //guardamos pedido
                    //recibimos el arrayPedidos por sesion cada vez que enviamos otro pedido
                    $arrayPedidos = $_SESSION['arrayPedidos'];

                    //esto es por seguridad por si se actualiza la pagina por accidente
                    $booleano = compararArrays($tipoPizza,$tamanoPizza,$masaPizza,$extrasPizza,$numeroPizzas,$arrayPedidos);
                        if($booleano){
                          //destruimos el pedido y decimos que no se puede meter un pedido imagetruecolortopalette
                          unset($pedido);
                          echo 'No se puede añadir un pedido igual a otro por seguridad o por si se actualiza la página';
                          //volvemos a enviar otra el id y el arrayPedidos por si acaso se hace otro pedido
                          $_SESSION['arrayPedidos'] = $arrayPedidos;
                        }else{
                          //añadimos el pedido al arrayPedidos
                          $arrayPedidos = anadirPedidoArray($pedido,$arrayPedidos);
                          //volvemos a enviar otra el id y el arrayPedidos por si acaso se hace otro pedido
                          $_SESSION['arrayPedidos'] = $arrayPedidos;
                          echo 'HAS AÑADIDO UN PEDIDO';
                        }

                    }//fin else
                }//fin if isset
                if((!isset($_POST['Enviar']))&&(!isset($_POST['Borrar']))){//este else es por si al racargar no perdamos los datos
                  //recibimos el arrayPedidos por sesion cada vez que enviamos otro pedido
                  $arrayPedidos = $_SESSION['arrayPedidos'];
                  //volvemos a enviar otra el id y el arrayPedidos por si acaso se hace otro pedido
                  $_SESSION['arrayPedidos'] = $arrayPedidos;
                  echo 'HAS RECARGADO LA PÁGINA';
                }
                //lo ponemos aqui para que al recargar no de problemas repitiendolos
                //recorremos el pedido e imprimimos el pedido
                //recibimos el arrayPedidos por sesion cada vez que enviamos otro pedido
                $arrayPedidos = $_SESSION['arrayPedidos'];
                //volvemos a enviar otra el id y el arrayPedidos por si acaso se hace otro pedido
                $_SESSION['arrayPedidos'] = $arrayPedidos;
                echo '<br>TIENES '.count($arrayPedidos) .' PEDIDOS<br>';
                echo '<div id="parteIzquierdaSegunda">';
                echo '<h1>TU PEDIDO</h1>';
                  generarFormularioPedido();
                echo '</div>';

                echo '<div id="parteIzquierdaSegunda">';
                echo '<h1>RESUMEN PEDIDOS</h1>';
                    //recorremos los pedidos de ese cliente
                    recorrerPedidosCliente($arrayPedidos);
                echo '</div>';
                $precioTotal = 0.0;
                mostrarDatosFacturaCliente($precioTotal,$cliente,$arrayPedidos);
       ?>


     </table>
    </form>

    </aside>

    </section>



    <!-- FOOTER -->
    <footer>
    <h1>www.pizzanet.com</h1>
    </footer>


</body>
</html>
