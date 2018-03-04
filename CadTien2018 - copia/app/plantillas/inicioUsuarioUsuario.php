<?php ob_start(); include 'nl2br2.php' ?>

    <h1>Bienvenido <?php echo $_SESSION['userNombre'].' perteneciente al grupo de: '.$_SESSION['grupoUser'] ;?></h1>
    <div><span ><?= isset($error)?$error: null; ?></span></div>





<?php $contenido = ob_get_clean() ?>

<?php include 'baseUsuario.php' ?>
