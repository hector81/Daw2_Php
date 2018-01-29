<?php ob_start(); include_once 'nl2br2.php' ?>

<h1 id="present">Bienvenido <?php echo $_SESSION['usuario'].' perteneciente al grupo de: '.$_SESSION['grupo'] ;?></h1>

<?php $contenido = ob_get_clean() ?>

<?php include_once 'base.php' ?>
