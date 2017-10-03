<?php ob_start();
  if(isset($_GET['confirmaCarrito'])){?>
    <H4>Debes iniciar sesión como cliente para confirmar la compra</h4>
  <?php }
  elseif(isset($_GET['registroOk'])){ ?>
    <h4>Registro realizado con éxito. Puedes iniciar sesión aquí.</h4>
  <?php }?>
<form action="index.php?ctl=iniciaSesion" method='post'>
  <fieldset>
    <legend>Login</legend>
    <div><span ><?= isset($params['error'])?$params['error']: null; ?></span></div>
    <div>
      <label for='nombre'>Nombre:</label><br/>
      <input type='text' name='nombre' id='nombre' maxlength="50"><br>
    </div>
    <div>
      <label for='password'>Contraseña:</label><br>
      <input type='password' name='password' id='password' maxlength="50"><br>
    </div>
    <div>
      <input type='submit' name='enviar' value='Enviar'>
    </div>
  </fieldset>
</form>
<?php $contenido = ob_get_clean() ?>

<?php include __DIR__ . '/../layout/base.php' ?>
