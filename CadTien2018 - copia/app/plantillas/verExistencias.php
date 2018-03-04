<?php ob_start(); include_once 'nl2br2.php' ?>
<h1>Bienvenido <?php echo $_SESSION['userNombre'].' perteneciente al grupo de: '.$_SESSION['grupoUser'] ;?></h1>
<?php ///html5
//var_dump($articulosExistencias);
    foreach ($articulosExistencias as $key => $value) {
        echo '<table class="articulosIzquierda">';
        foreach ($value as $key1 => $value1) {
          if($key1 != 'IMAGEN' && $key1 != 'idArticulo' && $key1 != 'idTienda'){
              echo '<tr>';
                echo '<td>'.$key1.'</td>';
                echo '<td>'.$value1.'</td>';
              echo '</tr>';
          }
        }
        //esto es para la imagen y para sacar el id de articulo y de tienda
        $idArticulo = 0;
        $idTienda = 0;
        foreach ($value as $key1 => $value1) {
          if($key1 == 'idArticulo'){
              $idArticulo = $value1;
          }
          if($key1 == 'idTienda'){
              $idTienda = $value1;
          }
        }
        echo '</table>';$ruta = "web/Imagenes/Imagenes/";
        echo '<table class="articulosDerecha">';
        foreach ($value as $key1 => $value1) {
          if($key1 == 'IMAGEN'){
              echo '<tr>';
                echo '<td>'.'<img src="'.$ruta.$value1.'" id="imagenProducto" class="imagenProducto">'.'</td>';
              echo '</tr>';
          }
        }
        echo '</table>';
      }

      ?>


<?php $contenido = ob_get_clean() ?>

<?php
include_once 'baseAdministrador.php';
?>
