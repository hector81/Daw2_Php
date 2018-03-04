<?php ob_start(); include 'nl2br2.php' ?>

    <h1>Bienvenido <?php echo $_SESSION['userNombre'].' perteneciente al grupo de: '.$_SESSION['grupoUser'] ;?></h1>
    <div><span ><?= isset($error)?$error: null; ?></span></div>
    <?php ///html5
        $ruta = "web/Imagenes/Imagenes/";

        foreach ($articulo as $key => $value) {
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
                ?></td></tr>
                <td>
                    <form id="formartiIndi" class="formartiIndi" name="formartiIndi" action="index.php?ctl=anadirCompraCarritoArticuloReservado" method="POST">
                        <input type="submit" value="Confirmar reserva" name="botonIndividual">
                        <input type="hidden" value="<?php echo $value->getId(); ?>" name="idArticuloIndividual">
                        <input type="hidden" value="<?php echo $value->getPVP(); ?>" name="pc">
                        <input type="hidden" value="<?php echo $numeroArticulos; ?>" name="numeroArticulos">
                        <input type="hidden" value="<?php echo $idTienda; ?>" name="idTienda">
                    </form>
                </td>
              </tr>
          </table>


<?php } ?>
<?php $contenido = ob_get_clean() ?>

<?php
include_once 'baseUsuario.php';
?>
