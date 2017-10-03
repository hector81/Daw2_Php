<?php ob_start() ?>

<form class="form-horizontal" action="index.php?ctl=registrarUsuario" method='post'>
  <h2>Registrarse</h2>
  <fieldset>
    <div><span ><?= isset($params['errors']['error'])?$params['errors']['error']: null; ?></span></div>
    <div class="form-group row">
      <div class="col-xs-4">
      <label for='usuario'>Usuario:</label><br/>
      <input class='form-control' type='text' name='usuario' id='usuario' placeholder='Introduce tu usuario' pattern='[a-z]*[0-9]*' title='El usuario debe tener una longitud de al menos 5 digitos alfanuméricos.' required='required' maxlength="50">
      <?php if(isset($params['errors']['usuario']) && $params['errors']['usuario'] == true) : ?>
      <span class="help-inline">El usuario debe tener una longitud de al menos 5 digitos alfanuméricos.</span>
      <?php endif ?>
    </div>
    <div class="col-xs-4">
      <label for='password'>Contraseña:</label>
      <input class='form-control' type='password' name='password' id='password' placeholder='Introduce tu contraseña' pattern='(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$' title='La contraseña debe tener al menos una letra mayúscula, una letra minúscula, un número o caracter especial y una longitud de mínimo 8 caracteres.' required='required' maxlength="50">
      <?php if(isset($params['errors']['contrasenia']) && $params['errors']['contrasenia'] == true) : ?>
      <span class="help-inline">La contraseña debe tener al menos una letra mayúscula, una letra minúscula, un número o caracter especial y una longitud de mínimo 8 caracteres.</span>
      <?php endif ?>
    </div>

  <?php if(isset($_SESSION['grupo']) && $_SESSION['grupo'] === 'admins') { ?>
    <div class="form-group">
      <div class="col-xs-4">
        <label for='grupo'>Grupo:</label>
      <select class='form-control' name='grupo'>
        <option value='admins'>Admin</option>
      </select>
    </div>
  </div>
        <?php }else{ ?>
          <input type='hidden' name='grupo' value='clientes'>
        <?php } ?>
      </fieldset>
<?php include __DIR__. '/../partials/form.php' ?>
<div class="form-group row">
    <div class="col-xs-4">
  <input class='form-control btn btn-grey' type='submit' name='enviar' value='Enviar'>
  </div>
</div>
</form>

<?php $contenido = ob_get_clean() ?>

<?php include __DIR__ . '/../layout/base.php' ?>
