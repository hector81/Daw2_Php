<?php ob_start(); ?>
 <h1>Inicio</h1>
 <h3> Fecha: <?php echo $params['fecha'] ?> </h3>
 <h4><?php echo $params['mensaje'];?></h4>

 <?php if(isset($_SESSION['message'])) { ?>
   <div class="msj"><?php echo $_SESSION["message"] ?></div>
 <?php
 } ?>

 <?php unset($_SESSION['message']); $contenido = ob_get_clean() ?>

 <?php include 'base.php' ?>
