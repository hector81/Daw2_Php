<?php ob_start(); ?>
<div>
  <h2>Carrito</h2>
  <hr>
  <div class="msj"><?= $_SESSION['grupo'] === 'cliente' ? '' : 'Estas navegando como invitado. Debes iniciar sesion o registrarte para finalizar tu compra' ; ?></div>

  <table class="carrito">
  <?php $total=0;
  if (isset($_SESSION['carrito']) && count($_SESSION['carrito'])>0){ ?>
    <tr>
      <th>Artículo</th>
      <th>Precio</th>
      <th>Cantidad</th>
      <th>Total</th>
    </tr>
    <?php foreach ($_SESSION['carrito'] as $id => $infoArticulo){
      $uds = $infoArticulo['uds'];
      $pvp = number_format($infoArticulo['articulo']->getPvp(), 2);
      $totU= $uds * $pvp;
      $total += $totU; ?>
      <tr>
        <td> <?= $infoArticulo['articulo']->getNombre(); ?> </td>
        <td> <?= $pvp .'€' ?> </td>
        <td> <?= $uds ?> </td>
        <td> <?= $totU .'€' ?> </td>
      </tr>
    <?php }
    $_SESSION['total']= $total; ?>
    <tr>
      <th></th>
      <th></th>
      <th>Total Final</th>
      <td> <?= $total . '€' ?></td>
    </tr>
    <?php }else{ ?>
      <tr>
        <td>Tu carrito está vacío</td>
      </tr>
    <?php } ?>
  </table>
  <hr>
  <div class="">
    <?php $disabled=""; if ($_SESSION['grupo'] !== 'cliente' || count($_SESSION['carrito'])<1) $disabled='-disabled' ?>
    <a class="btn-form<?= $disabled ?>" href=<?= (count($_SESSION['carrito'])>0)? 'index.php?ctl=verifyPurchase' : 'index.php?ctl=showCart' ?>> Finalizar compra </a>

    <?php if (count($_SESSION['carrito'])>0){?>
    <a class="btn-form" href="index.php?ctl=clearCart">Vaciar carrito</a>
    <?php }  ?>
  </div>
</div>
<?php $contenido = ob_get_clean() ?>
<?php include 'base.php' ?>
