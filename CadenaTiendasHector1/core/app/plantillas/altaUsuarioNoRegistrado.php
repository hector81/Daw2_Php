<?php ob_start() ?>
<h1 id="present">Bienvenido </h1>
<form action="index.php?ctl=altaUsuarioNoRegistrado" method='post'>
  <fieldset>
    <legend>DATE DE ALTA SI NO ESTAS REGISTRADO</legend>
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

<?php $contenido = ob_get_clean() ?>
<?php include_once 'baseInicio.php' ?>
