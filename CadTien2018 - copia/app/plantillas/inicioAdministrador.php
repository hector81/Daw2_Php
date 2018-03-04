<?php ob_start(); include_once 'nl2br2.php' ?>
<div><span ><?= isset($error)?$error: null; ?></span></div>
<h1>Bienvenido <?php echo $_SESSION['userNombre'].' perteneciente al grupo de: '.$_SESSION['grupoUser'] ;?></h1>


<?php $contenido = ob_get_clean() ?>

<?php
include_once 'baseAdministrador.php';
?>
