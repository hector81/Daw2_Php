
  <fieldset>
  <legend>Datos Personales</legend>
  <div class="form-group row">
    <div class="col-xs-4">
      <label for='nombre'>Nombre:</label>
      <input class='form-control' type='text' name='nombre' id='nombre' placeholder='Nombre' pattern='^[A-ZÑÁÉÍÓÚ\s ].*' title='El nombre debe comenzar por mayúscula' required='required' maxlength="50" value="<?= isset($params['datosUsuario']['nombre'])?$params['datosUsuario']['nombre']: null; ?>">
      <?php if(isset($params['errors']['nombre']) && $params['errors']['nombre'] == true) : ?>
      <span class="help-inline">El nombre debe comenzar por mayúsculas.</span>
    <?php endif ?>
    </div>
    <div class="col-xs-4">
      <label for='apellidos'>Apellidos:</label>
      <input class='form-control'  type='text' name='apellidos' id='apellidos' placeholder='Apellidos' pattern='^[A-ZÑÁÉÍÓÚ\s ].*' title='Los apellidos deben comenzar por mayúscula' required='required' maxlength="150" value="<?= isset($params['datosUsuario']['apellidos'])?$params['datosUsuario']['apellidos']: null; ?>">
      <?php if(isset($params['errors']['apellidos']) && $params['errors']['apellidos'] == true) : ?>
      <span class="help-inline">Los apellidos deben comenzar por mayúscula.</span>
    <?php endif ?>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-xs-4">
    <label for='direccion'>Dirección:</label>
    <input class='form-control'  type='text' name='direccion' id='direccion' placeholder='Dirección' pattern='^[A-ZÑÁÉÍÓÚ\s ].*' title='La dirección debe incluir la calle y el número y/o piso.' required='required' maxlength="150" value="<?= isset($params['datosUsuario']['direccion'])?$params['datosUsuario']['direccion']: null; ?>">
    <?php if(isset($params['errors']['direccion']) && $params['errors']['direccion'] == true) : ?>
    <span class="help-inline">La dirección debe incluir la calle y el número y/o piso.</span>
  <?php endif ?>
  </div>
  <div class="col-xs-4">
  <label for='ciudad'>Ciudad:</label>
  <input class='form-control'  type='text' name='ciudad' id='ciudad' placeholder='Ciudad' pattern='^[A-ZÑÁÉÍÓÚ\s ].*' title='Ciudad debe comenzar por mayúscula y no puede tener dobles guiones.' required='required' maxlength="50" value="<?= isset($params['datosUsuario']['ciudad'])?$params['datosUsuario']['ciudad']: null; ?>">
  <?php if(isset($params['errors']['ciudad']) && $params['errors']['ciudad'] == true) : ?>
  <span class="help-inline">Ciudad debe comenzar por mayúscula y no puede tener dobles guiones.</span>
<?php endif ?>
</div>
</div>
<div class="form-group row">
  <div class="col-xs-2">
    <label for='provincia'>Provincia:</label>
    <input class='form-control'  type='text' name='provincia' id='provincia' placeholder='Provincia' pattern='^[A-ZÑÁÉÍÓÚ\s ].-?.*' title='Provincia debe comenzar por mayúscula no puede tener dobles guiones.' required='required' maxlength="50" value="<?= isset($params['datosUsuario']['provincia'])?$params['datosUsuario']['provincia']: null; ?>">
    <?php if(isset($params['errors']['provincia']) && $params['errors']['provincia'] == true) : ?>
    <span class="help-inline">Provincia debe comenzar por mayúscula no puede tener dobles guiones.</span>
  <?php endif ?>
  </div>
    <div class="col-xs-2">
    <label for='codigoPostal'>Código Postal:</label>
    <input class='form-control' type='text' name='codigoPostal' id='codigoPostal' placeholder='Código postal' pattern='[0-9]{5}' title='El código postal sólo puede tener un máximo de 5 dígitos.' required='required' maxlength="50" value="<?= isset($params['datosUsuario']['codigoPostal'])?$params['datosUsuario']['codigoPostal']: null; ?>">
    <?php if(isset($params['errors']['codPostal']) && $params['errors']['codPostal'] == true) : ?>
    <span class="help-inline">El código postal sólo puede tener un máximo de 5 dígitos.</span>
  <?php endif ?>
  </div>
  <div class="col-xs-2">
    <label for='pais'>Pais:</label>
    <input class='form-control' type='text' name='pais' id='pais' placeholder='País' pattern='^[A-ZñÑáéíóúÁÉÍÓÚ\s ].*' title='Debe comenzar por mayúscula' required='required' maxlength="50" value="<?= isset($params['datosUsuario']['pais'])?$params['datosUsuario']['pais']: null; ?>">
    <?php if(isset($params['errors']['pais']) && $params['errors']['pais'] == true) : ?>
    <span class="help-inline">Debe comenzar por mayúscula</span>
    <?php endif ?>
  </div>
  </div>
  <div class="form-group row">
    <div class="col-xs-4">
      <label for='telefono'>Teléfono:</label>
      <input class='form-control' type='text' name='telefono' id='telefono' placeholder='Teléfono' pattern='[0-9]*{20}' title='El teléfono debe comenzar por un número con un máximo de 20 dígitos.' required='required' maxlength="50" value="<?= isset($params['datosUsuario']['telefono'])?$params['datosUsuario']['telefono']: null; ?>">
      <?php if(isset($params['errors']['telefono']) && $params['errors']['telefono'] == true) : ?>
      <span class="help-inline">El teléfono debe comenzar por un número con un máximo de 20 dígitos.</span>
      <?php endif ?>
    </div>
    <div class="col-xs-4">
      <label for='email'>E-mail:</label>
      <input class='form-control'  type='email' name='email' id='email' placeholder='e-mail' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$' title='El e-mail debe contener un @ y un .' required='required' maxlength="50" value="<?= isset($params['datosUsuario']['email'])?$params['datosUsuario']['email']: null; ?>">
      <?php if(isset($params['errors']['email']) && $params['errors']['email'] == true) : ?>
      <span class="help-inline">El e-mail debe contener un @ y un .</span>
    <?php endif;?>
    </div>
  </div>
</fieldset>
