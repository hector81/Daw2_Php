<?php ob_start(); include 'nl2br2.php' ?>

    <h1>Bienvenido <?php echo $_SESSION['userNombre'].' perteneciente al grupo de: '.$_SESSION['grupoUser'] ;?></h1>
    <div><span ><?= isset($error)?$error: null; ?></span></div>

      <?php
          $idReserva =0; $precioProducto = 0;$cantidad=0; $precioPedido =0; $precioTotal=0;
          //para la confirmacion
          if($carrito==null){
              $error = "El carrito del usuario ".$_SESSION['userNombre']." está vacio.";
          }else{

                foreach ($carrito as $key => $value) {
                    echo '<table class="articulosIzquierda">';
                        echo '<tr>';
                          echo '<td>ID USUARIO</td>';
                          echo '<td>'.$value->getIdUsuario().'</td>';
                        echo '</tr>';
                        echo '<tr>';
                          echo '<td>ID ARTICULO</td>';
                          echo '<td>'.$value->getIdArticulo().'</td>';
                        echo '</tr>';
                        echo '<tr>';
                          echo '<td>CANTIDAD DEL ARTICULO PEDIDO</td>';
                          echo '<td>'.$value->getCantidad().'</td>';
                        echo '</tr>';
                        echo '<tr>';
                          echo '<td>PRECIO DEL ARTICULO</td>';
                          echo '<td>'.$value->getPReserva().'</td>';
                        echo '</tr>';
                        echo '<tr>';
                          echo '<td>ID TIENDA</td>';
                          echo '<td>'.$value->getIdTienda().'</td>';
                        echo '</tr>';

                        $precioPedido = $value->getPReserva()*$value->getCantidad();

                        echo '<tr><td>';
                        echo '<form action="index.php?ctl=borrarArticuloDelCarrito" method="POST" name="borrarArticuloDelCarrito">';
                          echo '<input type="hidden" name="idUsuario" value="'.$value->getIdUsuario().'">';
                          echo '<input type="hidden" name="idArticulo" value="'.$value->getIdArticulo().'">';
                          echo '<input type="submit" name="botonBorrado" value="Borrar del pedido">';
                        echo '</form>';
                        echo '</td></tr>';
                        echo '<tr><td>PRECIO PEDIDO</td><td>'.$precioPedido.'</td></tr>';
                    echo '</table>';
                    $precioTotal += $precioPedido;
              }
          }

          echo '<table class="totalCarrito">';
              echo '<tr><td>PRECIO TOTAL CARRITO</td><td>'.$precioTotal.'</td></tr>';
              echo '<tr><td>';
              echo '<form action="index.php?ctl=confirmarVenta" method="POST" name="confirmarVenta">';
                //echo '<input type="hidden" name="idUsuario" value="'.$value->getIdUsuario().'">';
                echo '<input type="hidden" name="precioTotal" value="'.$precioTotal.'">';
                echo '<input type="submit" name="botonConfirmar" value="CONFIRMAR CARRITO">';
              echo '</form></td></tr>';
          echo '</table>';
       ?>



<?php $contenido = ob_get_clean() ?>

<?php
include_once 'baseUsuario.php';
?>
