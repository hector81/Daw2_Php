<?php ob_start(); include 'nl2br2.php' ?>

<form action="index.php?ctl=inicioSesion" method='post'>
  <fieldset>
    <legend>PON SESION USUARIO Y PASS</legend>
    <div><span ><?= isset($error)?$error: null; ?></span></div>
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

<form action="index.php?ctl=altaUsuario" class="formR">
  <input type='submit' name='registrar' value='No estoy registrado'>
</form>


<?php $contenido = ob_get_clean() ?>

<?php include 'inicioBase.php' ?>
