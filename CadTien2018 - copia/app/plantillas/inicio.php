<?php
/* Ejemplo de plantilla que se mostrará dentro de la plantilla principal
  ob_start() activa el almacenamiento en buffer de la página. Mientras se
             almacena en el buffer no se produce salida alguna hacia el
             navegador del cliente
  luego viene el código html y/o php que especifica lo que debe aparecer en
     el cliente web
  ob_get_clean() obtiene el contenido del buffer (que se pasa a la variable
             $contenido) y elimina el contenido del buffer
  Por último se incluye la página que muestra la imagen común de la aplicación
    (en este caso base.php) la cual contiene una referencia a la variable
    $contenido que provocará que se muestre la salida del buffer dentro dicha
    página "base.php"



*/
 ?>

<?php ob_start(); include 'nl2br2.php'; ?>
<h1>Bienvenido visitante</h1>
 <h1>Inicio</h1>
 <h3> Fecha: <?php echo $params['fecha'] ?> </h3>
 <?php echo $params['mensaje'] ?>
 <h1>Gracias por tu visita. Por favor, inicia sesión si ya estas registrado</h1>
 <a href="index.php?ctl=introducirUsuarioNuevo">Si no estas registrado</a>



           <?php

$date1 = date("Y-m-d H:i:s");

echo $date1;

$date=date_create("2013-03-15");
$date= date_format($date,"Y/m/d H:i:s");
echo '   ' .$date;
 ?>


 <?php $contenido = ob_get_clean() ?>

 <?php include 'base.php' ?>
