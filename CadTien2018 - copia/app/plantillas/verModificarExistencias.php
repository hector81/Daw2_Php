<?php ob_start(); include_once 'nl2br2.php' ?>
<h1>Bienvenido <?php echo $_SESSION['userNombre'].' perteneciente al grupo de: '.$_SESSION['grupoUser'] ;?></h1>
<h2>Artículos</h2>
<div class='articulos'>
<?php ///html5
//var_dump($articulosExistencias);
    foreach ($articulosExistencias as $key => $value) {
        echo '<table class="stockIzquierda">';
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
        echo '<table class="stockDerecha">';
        foreach ($value as $key1 => $value1) {
          if($key1 == 'IMAGEN'){
              echo '<tr>';
                echo '<td>'.'<img src="'.$ruta.$value1.'" id="imagenProducto" class="imagenProducto">'.'</td>';
              echo '</tr>';
             echo '<tr>';
                echo '<td>';
                echo '<form id="formularioActualizarStock" name="formularioActualizarStock" action="index.php?ctl=actualizarStock" method="POST">';
                  echo '<h6>Pon la nueva cifra para actualizar stock</h6>';
                  echo '<input type="number" name="numeroNuevoStock" value="0">';
                  echo '<input type="submit" name="actualizarStock" value="Actualizar stock articulo">';
                  echo '<input type="hidden" name="artId" value="'.$idArticulo.'">';
                  echo '<input type="hidden" name="tiendaId" value="'.$idTienda.'">';
                echo '</form>';
                echo '</td>';
              echo '</tr>';
          }
        }

        echo '</table>';
      }

      ?>

</div>



<?php $contenido = ob_get_clean() ?>

<?php
include_once 'baseAdministrador.php';
?>
