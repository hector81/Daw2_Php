<?php ob_start() ?>
<h1 id="present">Bienvenido <?php echo $_SESSION['usuario'].' perteneciente al grupo de: '.$_SESSION['grupo'] ;?></h1>
<form action="index.php?ctl=altaUsuario" method='post'>
  <fieldset>
    <legend>ALTA USUARIO</legend>
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
      <label for='grupoAlta'>Grupo:  clientes o admins</label><br>
      <input type='text' name='grupoAlta' id='grupoAlta' maxlength="50"><br>
    </div>
    <div>
      <input type='submit' name='enviar' value='Enviar'>
    </div>
  </fieldset>
</form>

<?php $contenido = ob_get_clean() ?>

<?php
if($_SESSION['grupo']=='admins'){
  include 'baseAdministrador.php';
}elseif($_SESSION['grupo']=='clientes'){
  include 'baseUsuario.php';
}
?>
