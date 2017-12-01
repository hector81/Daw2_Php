<?php
session_start();
$actual = 'Hoy es el día '.date('d/m/Y').' son las ' .date('H:i:s').'<br>';
echo $actual;
echo 'session_id = ',session_id(),'<br>';
//para llamar al archivo function_exists
include 'Cliente.php';
include 'Pizza.php';
include 'ListaPedidos.php';
include 'Funciones.php';
$listaPedidos = unserialize($_SESSION['listaPedidos']);
$cliente = unserialize($_SESSION['cliente']);

$_SESSION['listaPedidos'] = serialize($listaPedidos);
$_SESSION['cliente'] = serialize($cliente);
?>
<html>
  <head>
    <title>Pizza Net</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="estilos.css">
  </head>
<body>
        <h1>PIZZA NET PEDIDOS</h1>
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
              <aside>
                <?php
                if(isset($_POST['Borrar'])){
                    //borramos por posicion que enviamos por hidden en formulario
                    $numeroBorrar=  $_POST['numeroBorrar'];
                    $listaPedidos->borrarPedidoNumero($numeroBorrar);
                    $listaPedidos->cambiarIndicesBorrado();//esto es para volver a poner los indices en orden
                }
                if(isset($_POST['Enviar'])){
                    if(empty($_POST['tipoPizza']) || !isset($_POST['tipoPizza'])){
                        echo 'El tipo de pizza debe ponerse.<br>';generarErrorVuelta();
                    }elseif(empty($_POST['tamanoPizza']) || !isset($_POST['tamanoPizza'])){
                        echo 'El tamaño de pizza debe ponerse.<br>';generarErrorVuelta();
                    }elseif(empty($_POST['masaPizza']) || !isset($_POST['masaPizza'])){
                        echo 'La masa de pizza debe ponerse.<br>';generarErrorVuelta();
                    }elseif(empty($_POST['extrasPizza']) || !isset($_POST['extrasPizza'])){
                        echo 'El extra de pizza debe ponerse.<br>';generarErrorVuelta();
                    }elseif(empty($_POST['numeroPizzas']) || !isset($_POST['numeroPizzas'])){
                        echo 'El número de pizzas debe ponerse.<br>';generarErrorVuelta();
                    }else{//else 1º
                      if(!is_numeric($_POST['numeroPizzas'])){
                          echo 'El número de pizzas debe ser numérico.<br>';generarErrorVuelta();
                      }else{//else 2º
                        //creamos la pizza. Usamos $listaPedidos->contarPizzas() para saber las pizzas y aumentar el indice
                        $pizza = new Pizza($listaPedidos->contarPizzas(),$_POST['tipoPizza'],$_POST['tamanoPizza'],$_POST['masaPizza'],$_POST['extrasPizza'],$_POST['numeroPizzas']);
                        //hacemos el try catch para la excepcion
                        try{
                            $pizza->enviarErrorNumeroPizzas($_POST['numeroPizzas']);
                            //esto es por seguridad por si se actualiza la pagina por accidente
                            $booleano = $listaPedidos->compararPizza($pizza);
                              if($booleano){
                                //destruimos el pedido y decimos que no se puede meter un pedido imagetruecolortopalette
                                unset($pizza);
                                echo 'No se puede añadir un pedido igual a otro por seguridad o por si se actualiza la página';
                                //volvemos a enviar por sesion la lista pedidos
                                $_SESSION['listaPedidos'] = serialize($listaPedidos);
                              }else{
                                echo '<h1>DATOS ENVIADOS </h1>';
                                $precio = $pizza->calcularPrecioPizza();//calculamos precio
                                $pizza->imprimirPedidoPizza($precio);//y la imprimimos
                                //añadimos ListaPedidos
                                $listaPedidos->anadirPizzas($pizza);
                                //header("Location:procesamientoPedido.php");
                                echo '<br>HAS AÑADIDO UN PEDIDO<br>';
                              }
                         }catch(Exception $e){
                           echo $e->getMessage();
                         }finally{
                           echo 'Los datos han sido enviados.<br>';
                         }
                        /////fin del try catch
                      }//fin else 2º
                    }//fin else 1º
                }//fin if isset
                if((!isset($_POST['Enviar']))&&(!isset($_POST['Borrar']))){//este else es por si al racargar no perdamos los datos
                  echo 'HAS RECARGADO LA PÁGINA';

                }
                ///esto debe salir tanto si borras, añades ,recarges o actualizes
                //recorrer cliente
                $cliente->recorrerCliente();
                generarFormularioPedido();
                //recorremos toda la lista
                $listaPedidos->recorrerLista();
                //ponemos el total del valor de las pizzas en total
                echo $listaPedidos->calcularPedidosPrecioTotal();
                echo $listaPedidos->contarPedidosTotal();
                //volvemos a enviar por sesion la lista pedidos
                $_SESSION['listaPedidos'] = serialize($listaPedidos);
                echo '<div id="parteIzquierdaTercera">';
                    echo '<form name='."formularioCancelar".' action='."CancelarConfirmar.php".' method='."POST".' >';
                    echo '</table>';
                        echo '<table>';
                        echo '<td><input type='."submit".' value='."Cancelar pedido".' name='."Cancelar".' class='."centroBoton".'></td>';
                        echo '<td><input type='."submit".' value='."Confirmar pedidos".' name='."Confirmar".' class='."centroBoton".'></td>';
                      //  echo '<td><input type='."hidden".' value='.$listaPedidos.' name='."listaPedidos".' class='."centroBoton".'></td>';
                        //echo '<td><input type='."hidden".' value='.$cliente.' name='."cliente".' class='."centroBoton".'></td>';
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
