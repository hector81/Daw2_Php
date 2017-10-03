<?php ob_start();  ?>

<h2>Identifícate</h2>

<?php if(isset($_SESSION['message'])) { ?>
  <div class="msj-err"><?= $_SESSION["message"] ?></div>
<?php } ?>
<form action="index.php?ctl=login" method='post'>
  <fieldset>
    <legend>Introduce tus datos de acceso</legend>
    <div>
      <label for='usuario'>Nombre de usuario:</label><br/>
      <input type='text' name='usuario' id='usuario' maxlength="50" placeholder="jleon"><br>
    </div>
    <div>
      <label for='password'>Contraseña:</label><br>
      <input type='password' name='password' id='password' maxlength="50"  placeholder="julia"><br>
    </div>
  </fieldset>
  <div class="end-btn">
    <input type='submit' name='enviar' value='Enviar'>
  </div>
</form>
<hr>
<div class="cntr">
  <h4>¿Aun no eres miembro?</h4>
  <a class="btn-registrar" href="index.php?ctl=signIn">Regístrate</a>
</div>
<script type="text/javascript">
  document.getElementById('usuario').value = "<?= isset($_POST['usuario']) ? $_POST['usuario'] : '';?>";
</script>

<?php unset($_SESSION['message']); $contenido = ob_get_clean(); ?>
<?php include 'base.php' ?>
