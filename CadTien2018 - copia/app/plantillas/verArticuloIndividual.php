<?php ob_start(); include 'nl2br2.php'; ?>
<h1>Bienvenido visitante</h1>
<div class='articulos'>
<?php ///html5
    foreach ($articuloIndividual as $key => $value) {
      ?>
      <table class="articulosIzquierda">
          <tr>
              <td>Id</td>
              <td><?php echo $value->getId(); ?></td>
          </tr>
          <tr>
              <td>Nombre </td>
              <td><?php echo $value->getNombre(); ?></td>
          </tr>
          <tr>
              <td>Nombre corto</td>
              <td><?php echo $value->getNombreCorto(); ?></td>
          </tr>
          <tr>
              <td>Descripcion</td>
              <td><?php echo $value->getDescripcion(); ?></td>
          </tr>
          <tr>
              <td>PVP</td>
              <td><?php echo $value->getPVP(); ?></td>
          </tr>
          <tr>
              <td>Id Familia</td>
              <td><?php echo $value->getIdFamilia(); ?></td>
          </tr>
          <tr>
              <td>Agotado</td>
              <td><?php if($value->getAgotado() == false){echo 'NO';}else{echo 'SI';}  ?></td>
          </tr>
          <tr>
              <td>Pocas unidades</td>
              <td><?php if($value->getPocasUnidades() == false){echo 'NO';}else{echo 'SI';}  ?></td>
          </tr>
        </table>
        <table class="articulosDerecha">
          <tr>
          <td>Imagen </td><br><td>
            <?php $ruta = "web/Imagenes/Imagenes/";
                  echo '<img src="'.$ruta.$value->getImagen().'" id="imagenProducto" class="imagenProducto">';
            ?></td>
          </tr>
      </table>
    <?php
    }
    ?>

</div>
 <?php $contenido = ob_get_clean() ?>

 <?php include 'base.php' ?>
