<?php ob_start(); include 'nl2br2.php'; ?>
<h1>Bienvenido <?php echo $_SESSION['contraseniaUser'] .'   '.  $_SESSION['userNombre'].' perteneciente al grupo de: '.$_SESSION['grupoUser'] ;?></h1>
<?php

if($boolFoto){
    echo '<div><span class="avisoError" >La foto ha sido enviada</span></div>';
}else{
    echo '<div><span class="avisoError" >La foto no ha sido enviada</span></div>';
}
 ?>




 <?php $contenido = ob_get_clean() ?>

 <?php include 'baseAdministrador.php' ?>
