<?php ob_start(); include 'nl2br2.php'; ?>
<h1>Bienvenido <?php echo $_SESSION['userNombre'].' perteneciente al grupo de: '.$_SESSION['grupoUser'] ;?></h1>

<h2>Artículos</h2>
<div class='articulos'>
<?php ///html5
    foreach ($articuloFamilias as $key => $value) {
      ?>
      <table class="articulosIzquierda">
          <tr>
              <td>Id ARTICULO</td>
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
              <td>
            <?php $ruta = "web/Imagenes/Imagenes/";
                  echo '<img src="'.$ruta.$value->getImagen().'" id="imagenProducto" class="imagenProducto">';
            ?></td>
          </tr>
          <tr>
              <td>
                <form id="formularioImagen" enctype="multipart/form-data" name="formularioImagen" action="index.php?ctl=actualizarFotoArticuloCategoria" method="POST">
                    Subir imagen: <input type="file" name="archivo" />
                    <input type="submit" name="actualizarFoto" value="Actualizar imagen articulo">
                    <input type="hidden" name="idArticulo" value="<?php echo $value->getId(); ?>">
                </form>
              </td>
          </tr>
          <tr>
              <td>
                <form id="formularioBorrarArticulo" name="formularioBorrarArticulo" action="index.php?ctl=borrarArticuloCategoria" method="POST">
                    <input type="submit" name="borrarArticulo" value="Borrar articulo categoria">
                    <input type="hidden" name="idArticulo" value="<?php echo $value->getId(); ?>">
                </form>
              </td>
          </tr>
      </table>
    <?php
    }
    ?>

</div>
 <?php $contenido = ob_get_clean() ?>

 <?php include_once 'baseAdministrador.php'; ?>
