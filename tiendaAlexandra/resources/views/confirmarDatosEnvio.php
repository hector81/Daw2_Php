
<?php ob_start();?>
<h2>Confirma los datos de envío y la fecha de entrega para finalizar la compra:</h2>
<form action='index.php?ctl=confirmarCompra' method='post'>
<?php include __DIR__. '/../partials/form.php' ?>
<!-- Los datos de la tarjeta los valido con html pero no los valido con php ya que no los guardo en ninguna tabla o variable. -->
<div class="form-group row">
  <div class="col-xs-2">
    <label for='numTarjeta'>Número tarjeta</label>
    <input type='text' name='numTarjeta' pattern='[1-9]{4}/[0-9]{4}/[0-9]{4}/[0-9]{4}' placeholder='xxxx/xxxx/xxxx/xxxx' title='El número de tarjeta deben ser 12 dígitos separados por barras cada 4 números.' required='required'>
    <?php if(isset($params['errors']['tarjeta']) && $params['errors']['tarjeta'] == true) : ?>
      <span class='help-inline'>El número de tarjeta deben ser 12 dígitos separados por barras cada 4 números.</span>
    <?php endif; ?>
  </div>
  <div class="col-xs-2">
    <label for='fCaducidad'>Fecha caducidad</label>
    <input type='text' name='fCaducidad' pattern='(0[1-9]|1[012])/(1[789]|2[0-9])' placeholder='mm/aa' title='La fecha de caducidad debe representarse en dígitos y el año los dos últimos dígitos.' required='required'>
    <?php if(isset($params['errors']['fCaducidad']) && $params['errors']['fCaducidad'] == true) : ?>
      <span class='help-inline'>La fecha de caducidad debe representarse en dígitos y el año los dos últimos dígitos hasta 29.</span>
    <?php endif; ?>
  </div>
  <div class="col-xs-2">
    <label for='cvc'>Número Cvc</label>
    <input type='text' name='cvc' pattern='[0-9]{3}' placeholder='3 dígitos en el reverso.' title='El cvc se encuentra en el reverso de la tarjeta son 3 números.' required='required'>
    <?php if(isset($params['errors']['cvc']) && $params['errors']['cvc'] == true) : ?>
      <span class='help-inline'>El cvc se encuentra en el reverso de la tarjeta son 3 números.</span>
    <?php endif; ?>
  </div>
</div>
<div class="form-group row">
  <div class="col-xs-4">
    <input type='hidden' name='fechaCompra' value='<?= date('Y-m-d') ?>'>
  </div>
</div>
<?php if($params['envio']=='5.99'): ?>
  <div class="form-group row">
    <div class="col-xs-4">
      <label for='fechaEntregaOnline'>Fecha Entrega compra online:</label>
      <input type='date' name='fechaEntregaOnline' value='<?= date('Y-m-d', strtotime("+2 days")) ?>' min='<?= date('Y-m-d', strtotime("+2 days")); ?>' max='<?= date('Y-m-d', strtotime("+15 days")); ?>' step='1'>
      <?php if(isset($params['errors']['$fEntregaOnline']) && $params['errors']['$fEntregaOnline'] == true) : ?>
        <span class='help-inline'>La fecha de entrega debe tener un margen de 48 hrs para su envío.</span>
      <?php endif; ?>
    </div>
      <span>La fecha mínima de entrega es 2 días después del pedido.</span>
  </div>
<?php else:?>
  <div class="form-group row">
      <div class="col-xs-12">
          <b>Recogida en tienda:</b> puedes pasar a recoger tu compra en la tienda:
    <span class='cursiva'>"<?= $params['infoTienda'][0]['nombre']?>", <?=$params['infoTienda'][0]['ciudad']?> , <?= $params['infoTienda'][0]['provincia']?> , telefono: <?= $params['infoTienda'][0]['tlfno']; ?></span>
    <h5>  <?php if($params['disponibilidad'] == 1){
        ?> Disponibilidad inmediata.
      <?php }else if($params['disponibilidad'] == 0){?> Disponible en dos días. <?php }?></h5>
    <?php endif;?>
      </div>
      </div>
  <div class="form-group row">
      <div class="col-xs-4">
        <input type='hidden' name='tiendaSeleccionada' value='<?=$params['tiendaSeleccionada'] ?>'>
        <input type='hidden' name='disponibilidad' value='<?=$params['disponibilidad'] ?>'>
        <input type='hidden' name='envio' value='<?=$params['envio'] ?>'>
        <input class='form-control btn btn-grey' type='submit' name='confirmarCompra' value='Confirmar Compra'>
      </div>
    </div>
  </form>

<?php $contenido = ob_get_clean();

include __DIR__ . '/../layout/base.php';
