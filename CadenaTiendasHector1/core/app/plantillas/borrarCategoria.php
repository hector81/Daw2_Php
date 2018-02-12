<?php ob_start(); include_once 'nl2br2.php' ?>

<h1 id="present">Bienvenido <?php echo $_SESSION['usuario'].' perteneciente al grupo de: '.$_SESSION['grupo'] ;?></h1>
<form name="formBusqueda" action="index.php?ctl=borrarCategoria" method="POST">
  <fieldset>
    <legend>PARA DAR DE BAJA LAS CATEGORIAS</legend>
    <div><span ><?= isset($error)?$error: null; ?></span></div>
    <div>
      <label for='nombre'>Nombre:</label><br/>
      <input type='text' name='nombre' id='nombre' maxlength="50"><br>
    </div>
    <div>
      <input type='submit' name='enviar' value='Enviar'>
    </div>
  </fieldset>
</form>
<?php $contenido = ob_get_clean() ?>

<?php include_once 'baseAdministrador.php' ?>
