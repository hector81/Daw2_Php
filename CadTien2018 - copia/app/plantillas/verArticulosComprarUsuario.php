<?php ob_start(); include 'nl2br2.php' ?>

    <h1>Bienvenido <?php echo $_SESSION['userNombre'].' perteneciente al grupo de: '.$_SESSION['grupoUser'] ;?></h1>
    <div><span ><?= isset($error)?$error: null; ?></span></div>
    <div class='articulos'>
    <?php ///html5
        foreach ($articulos as $key => $value) {
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
                    <form id="formularioCompra" class="formularioCompra" name="formularioCompra" action="index.php?ctl=anadirReserva" method="POST">
                        Número de este artículo que deseas adquirir: <input type="number" name="numeroArticulos" value="">
                        <input type="submit" name="comprarArticulo" value="Rservar artículo para carrito">
                        <input type="hidden" name="idArticulo" value="<?php echo $value->getId(); ?>">
                        <?php
                            echo '<h3>Elije tienda de compra</h3>';
                            echo '<select name="idTienda" id="idTienda" class="idTienda">';
                            foreach ($tiendas as $key => $value) {
                                $id = 0;
                                $nombre = '';
                                foreach ($value as $key1 => $value1) {
                                    if($key1 == 'id'){
                                        $id = $value1;
                                    }
                                    if($key1 == 'nombre'){
                                        $nombre = $value1;
                                    }
                                }
                                echo '<option value="'.$id.'">'.$id. ' = '.$nombre.'</option>';
                            }
                            echo '</select><br>';
                         ?>
                    </form>
                  </td>
              </tr>
          </table>
        <?php
        }
        ?>

    </div>




<?php $contenido = ob_get_clean() ?>

<?php
include_once 'baseUsuario.php';
?>
