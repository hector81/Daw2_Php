<?php ob_start(); include 'nl2br2.php'; ?>
<h1>Bienvenido visitante</h1><br><br>
<div><span class="avisoError" ><?= isset($error)?$error: null; ?></span></div><br><br>
<div class='articulos'>
<?php ///html5
    foreach ($articuloTienda as $key => $value) {
      ?>
      <table class="articulosIzquierda">
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
          <td>Imagen </td><tr><br><td>
            <?php $ruta = "web/Imagenes/Imagenes/";
                  echo '<img class="imagenDerecha" src="'.$ruta.$value->getImagen().'" id="imagenProducto" class="imagenProducto">';
            ?></td>
          </tr>
          <tr>
              <td>
                <form id="formularioImagen" enctype="multipart/form-data" name="formularioImagen" action="index.php?ctl=actualizarFoto" method="POST">
                    Subir imagen: <input type="file" name="archivo" />
                    <input type="submit" name="actualizarFoto" value="Actualizar imagen articulo">
                    <input type="hidden" name="idArticulo" value="<?php echo $value->getId(); ?>">
                </form>
              </td>
          </tr>
          <tr>
              <td>
                <form id="formularioBorrarArticulo" name="formularioBorrarArticulo" action="index.php?ctl=borrarArticuloTienda" method="POST">
                    <input type="submit" name="borra" value="Borrar articulo tienda">
                    <input type="hidden" name="idArticulo" value="<?php echo $value->getId(); ?>">
                    <input type="hidden" name="tiendaNombre" value="<?php echo $tiendaNombre; ?>">
                </form>
              </td>
          </tr>
      </table>
    <?php
    }
    ?>

</div>
 <?php $contenido = ob_get_clean() ?>

 <?php include 'baseAdministrador.php' ?>
