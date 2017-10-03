<?php ob_start();?>

<form class="form-horizontal" action="index.php?ctl=actualizarUsuario" method='post'>
  <h2>Bienvenid@ <?= ucfirst($params['datosUsuario']['usuario'])?></h2><hr>

<?php include __DIR__. '/../partials/form.php' ?>
<div class="form-group row">
  <div class="col-xs-4">
  <input class='form-control btn btn-grey' type='submit' name='actualizar' value='Actualizar datos'>
  <?php if(isset($_GET['modificado'])){ ?>
    <h4 class='red'>¡Datos modificados correctamente!</h4>
  <?php }?>
  </div>
</div>
</form>

<?php $contenido = ob_get_clean() ?>

<?php include __DIR__ . '/../layout/base.php' ?>
