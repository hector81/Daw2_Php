<?php ob_start(); include_once 'nl2br2.php' ; ?>
 <h1>Inicio</h1>
 <h3> Fecha: <?php echo $params['fecha'] ?> </h3>
 <?php echo $params['mensaje'] ?>

 <?php $contenido = ob_get_clean() ?>

 <?php include_once 'baseInicio.php' ?>
