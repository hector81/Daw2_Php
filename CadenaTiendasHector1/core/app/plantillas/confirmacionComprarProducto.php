<?php ob_start() ?>
<h1 id="present">Bienvenido <?php echo $_SESSION['usuario'].' perteneciente al grupo de: '.$_SESSION['grupo'] ;?></h1>

  <fieldset>
    <legend>CONFIRMACION COMPRAR PRODUCTO</legend>
    <div><span ><?= isset($error)?$error: null; ?></span></div>
    
  </fieldset>

<?php $contenido = ob_get_clean() ?>

<?php include 'baseUsuario.php' ?>
