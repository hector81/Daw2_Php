<?php ob_start() ?>
<h1 id="present">Bienvenido <?php echo $_SESSION['usuario'].' perteneciente al grupo de: '.$_SESSION['grupo'] ;?></h1>

  <fieldset>
    <legend>QUIERES COMPRAR PRODUCTO</legend>
    <?php echo $idPrueba ?>
  </fieldset>


<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>
