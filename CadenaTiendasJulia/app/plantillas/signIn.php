<?php ob_start(); ?>

<form action="index.php?ctl=signIn" method='post'>
  <h2>Registro de una nueva cuenta</h2>
  <hr>

  <?php if(isset($_SESSION['message'])) { isset($type)? : $reg='-err'?>
    <div class="msj<?= $reg ?>"><?= $_SESSION["message"] ?></div>
  <?php } ?>

  <div class="reg-sect">
    <fieldset>
      <legend>Datos de la cuenta</legend>
      <div>
        <label for='usuario'>Nombre de usuario:</label><br/>
        <input type='text' name='usuario' id='usuario' maxlength="50"><br>
      </div>
      <div>
        <label for='password'>Contraseña:</label><br>
        <input type='password' name='password' id='password' maxlength="50"><br>
      </div>
    </fieldset>
  </div>
  <div class="reg-sect">
    <fieldset>
      <legend>Datos de facturación</legend>
      <div>
        <label >Nombre y apellidos:</label><br/>
        <input type='text' name='nombre' id='nombre' placeholder="John">
        <input type='text' name='apellidos' id='apellidos' placeholder="Doe Doe">
      </div>
      <div>
        <label >Dirección y Cod. Postal:</label><br/>
        <input type='text' name='direccion' id='direccion' size="50" placeholder="Calle Luis Jorge Castaños, 12, 3º Dcha">
        <input type='text' name='cod-post' id='cod-post' size="4" maxlength="5" placeholder="12345">
      </div>
      <div>
        <label>Ciudad, provincia y país:</label><br/>
        <input type='text' name='ciudad' id='ciudad' placeholder="Logroño">
        <input type='text' name='provincia' id='provincia' placeholder="La Rioja">
        <input type='text' name='pais' id='pais' placeholder="España">
      </div>
    </fieldset>
  </div>
  <div class="reg-sect">
    <fieldset>
      <legend>Otros datos</legend>
      <div>
        <label >Teléfono:</label><br/>
        <input type='number' name='tlfn' id='tlfn' placeholder="666555444">
      </div>
      <div>
        <label >E-mail:</label><br/>
        <input type='text' name='email' id='email' placeholder="johndoe@doe.com">
      </div>
    </fieldset>
  </div>
  <div class="end-btn">
    <input type='submit' name='enviar' value='Enviar'>
  </div>
</form>
<script type="text/javascript">
  document.getElementById('usuario').value = "<?= isset($_POST['usuario']) ? $_POST['usuario'] : '';?>";
  document.getElementById('password').value = "<?= isset($_POST['password']) ? $_POST['password'] : '';?>";
  document.getElementById('nombre').value = "<?= isset($_POST['nombre']) ? $_POST['nombre'] : '';?>";
  document.getElementById('apellidos').value = "<?= isset($_POST['apellidos']) ? $_POST['apellidos'] : '';?>";
  document.getElementById('direccion').value = "<?= isset($_POST['direccion']) ? $_POST['direccion'] : '';?>";
  document.getElementById('cod-post').value = "<?= isset($_POST['cod-post']) ? $_POST['cod-post'] : '';?>";
  document.getElementById('ciudad').value = "<?= isset($_POST['ciudad']) ? $_POST['ciudad'] : '';?>";
  document.getElementById('provincia').value = "<?= isset($_POST['provincia']) ? $_POST['provincia'] : '';?>";
  document.getElementById('pais').value = "<?= isset($_POST['pais']) ? $_POST['pais'] : '';?>";
  document.getElementById('tlfn').value = "<?= isset($_POST['tlfn']) ? $_POST['tlfn'] : '';?>";
  document.getElementById('email').value = "<?= isset($_POST['email']) ? $_POST['email'] : '';?>";
</script>

<?php unset($_SESSION['message']); $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>
