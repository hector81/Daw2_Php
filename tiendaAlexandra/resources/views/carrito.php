<?php ob_start();
if(isset($_SESSION['carrito']) && count($params['art'])>0){
  if(isset($_GET['error'])):?>
<h3>Ha habido un error al confirmar el carrito, por favor vuelve a intentarlo</h3><?php endif; ?>
  <div><span ><?= isset($params['error'])?$params['error']: null; ?></span></div>
<h2>Tu carrito de la compra es: </h2>
<table class="table table-striped table-hover">
  <tr>
    <th class='center'>Nombre</th>
    <th class='center'>PVP</th>
    <th colspan='2' class='center'>Cantidad</th>
    <th class='center'>Total Unitario</th>
  </tr>
  <?php
  $total=0;
  $articulos=$params['art'];

foreach ($articulos as $key=> $articulo) :
  $cantidad= $articulo['cantidad'];
  $pvp=number_format ( $articulo['PVP'], 2);
  $totalUnitario= $cantidad * $pvp;
  $total += $totalUnitario;
  ?>
      <tr>
          <td><?= $articulo['nombre'] ?></td>
          <td class='center'><?= $pvp ?>€ </td>
          <td id='modificarCantidad' class='center'>
            <form action='index.php?ctl=modificarCantidad' method='post'>
              <input id='cantidad' type='number' name='cantidad' value='<?=$cantidad ?>' width='10px' min='1' max='10' step='1'>
              <input type='hidden' name='id' value='<?= $articulo['id']?>'>
              <button type='submit' class='fa fa-refresh fa-1' aria-hidden='true'></button>
            </form>
          </td>
          <td id='eliminarProducto' class='center'>
            <form action='index.php?ctl=eliminarProducto' method='post'>
            <input type='hidden' name='id' value='<?= $articulo['id']?>'>
            <button type='submit' class='fa fa-trash-o fa-1' aria-hidden='true'></button>
          </form>
          </td>
          <td class='precioEnvio center'><?= number_format($totalUnitario,2); ?>€ </td>
        </tr>
        <?php
endforeach;
         ?>
         <tr>
           <td colspan='4'><b>TOTAL</b></td>
           <td class='precio'><?= number_format($total,2); ?>€ </td>
         </tr>

      <tr>
        <td colspan='5'>
          <!--dentro de la celda creamos nueva tabla con los gastos de envío-->
          <form action='index.php?ctl=carrito' method='post'>
            <table class="table table-striped table-hover">
              <tr>
                <th colspan='8'>Gastos de envío</th>
              </tr>
              <tr>
                <td colspan='4'><input type='radio' name='compra' value='tienda' <?php echo (!isset($_POST['compra']) || $_POST['compra']=='tienda')?'checked':''; ?>/>Recoger en Tienda</td>
                <td>
                  <form action='index.php?ctl=seleccionarTienda' method='post'>
                    <select name="tiendaSeleccionada">
                      <option value="0">Selecciona una tienda</option>
                      <?php
                      $infoTiendas=$params['tiendas'];
                      foreach ($infoTiendas as $key => $value): ?>
                          <option value="<?=$value['id']?>" <?php if(isset($params['tiendaSeleccionada']) && $value['id'] == $params['tiendaSeleccionada'] ){ echo "selected";} ?> >
                          "<?=$value['nombre']?>",<?=$value['ciudad']?>- <?= $value['provincia'] ?>
                          </option>
                      <?php  endforeach; ?>
                    </select>
                    <input type="submit" value="Seleccionar tienda">
                  </form>
                </td>
                <td>
                  <?php if(isset($_POST['compra']) && $_POST['compra'] == 'tienda' && $params['disponibilidad'] == true){
                    ?><input type='hidden' name='disponibilidad' value='Disponibilidad inmediata'/> Disponibilidad inmediata.
                  <?php }else if(isset($_POST['compra']) && $_POST['compra'] == 'tienda' && $params['disponibilidad'] == false){?><input type='hidden' name='disponibilidad' value='Disponible en dos días'/> Disponible en dos días. <?php }?>
                </td>
                  <td class='blue cursiva'>
                    <?php if(isset($_POST['compra']) && $_POST['compra'] == 'tienda'){?>
                      <i class="fa fa-check fa-1" aria-hidden="true"></i>
                    <?php } ?>
                  </td>
                <td class='precioEnvio center'>¡Gratis!</td>
             </tr>
             <tr>
               <td colspan='6' class=''><input type='radio' name='compra' value='Online' <?php echo (isset($_POST['compra']) && $_POST['compra']=='Online')?'checked':''; ?>/>Comprar Online</td>
               <td class='blue cursiva'>
                   <?php if(isset($_POST['compra']) && $_POST['compra'] == 'Online'){?>
                     <i class="fa fa-check fa-1" aria-hidden="true"></i>
                   <?php } ?>
               </td>
               <td class='precioEnvio center'>+5.99€</td>
            </tr>
             <tr>
               <td colspan='8'><input type='submit' name='envio' value='Añadir envío'></td>
             </tr>
           </table>
          </form>
        </td>
      </tr>
        <tr>
        <td colspan='4'><b>TOTAL CON ENVÍO</b></td>
        <td class='precio'><?php
        $totalConEnvio= $total + $params['envio'];
        echo number_format($totalConEnvio,2); ?>€
      </td>
      </tr>
</table>
<form class='right' action='index.php?ctl=confirmarDatosEnvio' method='post'>
  <input type='hidden' name='tiendaSeleccionada' value='<?=$params['tiendaSeleccionada'] ?>'>
  <input type='hidden' name='disponibilidad' value='<?=$params['disponibilidad'] ?>'>
  <input type='hidden' name='envio' value='<?=$params['envio'] ?>'>
  <input type='submit' name='confirmar' value='Confirmar carrito'>
</form>
<a href='index.php?ctl=inicio'>Seguir comprando</a>
<?php
} else{ ?>
  <h2>Tu carrito está vacío</h2>

<?php }
 $contenido = ob_get_clean();

include __DIR__ . '/../layout/base.php';
