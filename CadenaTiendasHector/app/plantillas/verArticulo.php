<?php ob_start(); include 'nl2br2.php' ?>
<h1 id="present">Bienvenido <?php echo $_SESSION['usuario'].' perteneciente al grupo de: '.$_SESSION['grupo'] ;?></h1>
<form action="index.php?ctl=verArticulo" method='post'>
  <fieldset>
    <legend>ARTICULO</legend>
    <div><span ><?= isset($error)?$error: null; ?></span></div>
    <div>
      <label for='nombre'>NOMBRE ARTICULO:</label><br/>
      <input type='text' name='nombre' id='nombre' maxlength="50"><br>
    </div>
    <div>
      <input type='submit' name='enviar' value='Enviar'>
    </div>
  </fieldset>
</form>

<?php $contenido = ob_get_clean() ?>
<?php include 'base.php' ?>
