<?php ob_start() ?>
<h1 id="present">Bienvenido <?php echo $_SESSION['usuario'].' perteneciente al grupo de: '.$_SESSION['grupo'] ;?></h1>
  <fieldset>
    <legend>VER CARRITO</legend>
    <div><span ><?= isset($error)?$error: null; ?></span></div>
    <div id="contenedor">
      <h1 align='center'>Este es el carrito de <?php echo $_SESSION['usuario'] ?></h1>
        <form name="formBusqueda" action="index.php?ctl=verCarrito" method='post'>
            <table border='1'>

                    <?php foreach ($carrito as  $compra):?>
                          <tr style="background-color:green;text-align:left;">
                                <td><?php echo "ID COMPRA: " ;?></td>
                                <td><?php echo "ID ARTICULO: " ;?></td>
                                <td><?php echo "CANTIDAD: ";?></td>
                                <td><?php echo "FECHA COMPRA: " ;?></td>
                                <td><?php echo "USUARIO: " ;?></td>
                                <td><?php echo "ID TIENDA: " ;?></td>
                          </tr>
                          <tr>
                                <td><?php echo $compra->getIdCompra() ;?></td>
                                <td><?php echo $compra->getIdArt() ;?></td>
                                <td><?php echo $compra->getCantidad() ;?></td>
                                <td><?php echo $compra->getFechaCompra() ;?></td>
                                <td><?php echo $compra->getUsuario() ;?></td>
                                <td><?php echo $compra->getIdTienda() ;?></td>
                          </tr>

                    <?php endforeach; ?>

            </table>
            <table>
              <tr>
                <td>
                    <h1>Pon ID de la compra para quitar</h1>
                </td>
                <td>
                    <div>
                      <label for='idCompra'>ID COMPRA:</label><br/>
                      <input type='number' name='idCompra' id='idCompra' maxlength="50"><br>
                    </div>
                    <div>
                      <input type='submit' value='QUITAR DEL CARRITO'><br>
                    </div>
                </td>
              </tr>
              <tr>
                <td>
                    <h1>TOTAL COMPRA</h1>
                </td>
                <td>
                      <?php echo $resultado; ?>
                </td>
              </tr>
            </table>
        </form>
      </div>
  </fieldset>

<?php $contenido = ob_get_clean() ?>

<?php include_once 'baseUsuario.php' ?>
