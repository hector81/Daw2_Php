<?php ob_start(); include_once 'nl2br2.php' ?>

<fieldset>
  <legend>RESULTADOS DE LA BUSQUEDA</legend>
    <div id="contenedor">
    <div><span ><?= isset($error)?$error: null; ?></span></div>
    <br>
    <h1>CATEGORIAS<h1>
      <div><span ><?= isset($errorF)?$errorF: null; ?></span></div>
      <table border='1'>
        <?php
          foreach ($listaFamilia as  $categoria): ?>
          <tr style="background-color:green;text-align:left; font-size: 1em;">
                  <td><?php echo "ID: " ;?></td>
                  <td><?php echo "NOMBRE: ";?></td>
                  <td><?php echo "DESCRIPCIÓN: " ;?></td>

            </tr>
            <tr>
                  <td><?php echo $categoria->getId() ;?></td>
                  <td><?php echo $categoria->getNombre() ;?></td>
                  <td><?php echo $categoria->getDescripcion() ;?></td>
            </tr>
        <?php endforeach;  ?>

      </table>
    <br>
    <h1>ARTÍCULOS<h1>
      <div><span ><?= isset($errorA)?$errorA: null; ?></span></div>
      <table border='1'>
        <?php foreach($listaArticulo as $articulo): ?>
            <tr style="background-color:green;text-align:left; font-size: 1em;">
                  <td><?php echo "ID: " ;?></td>
                  <td><?php echo "NOMBRE CORTO: " ;?></td>
                  <td><?php echo "NOMBRE: ";?></td>
                  <td><?php echo "DESCRIPCIÓN: " ;?></td>
                  <td><?php echo "PVP: " ;?></td>
                  <td><?php echo "ID FAMILIA: " ;?></td>
                  <td><?php echo "FOTO: " ;?></td>
            </tr>
            <tr>
                  <td><?php echo $articulo->getId() ;?></td>
                  <td><?php echo $articulo->getNombreCorto() ;?></td>
                  <td><?php echo $articulo->getNombre() ;?></td>
                  <td><?php echo $articulo->getDescripcion() ;?></td>
                  <td><?php echo $articulo->getPvp() ;?></td>
                  <td><?php echo $articulo->getIdFamilia() ;?></td>
                  <td><?php echo $articulo->getFoto() ;?></td>
            </tr>
        <?php endforeach;?>

      </table>
    <br>
    <h1>TIENDAS<h1>
      <div><span ><?= isset($errorT)?$errorT: null; ?></span></div>
      <table border='1'>
        <?php

        foreach($listaTienda as $tienda): ?>
            <tr style="background-color:green;text-align:left; font-size: 1em;">
                  <td><?php echo "ID: " ;?></td>
                  <td><?php echo "NOMBRE: " ;?></td>
                  <td><?php echo "PROVINCIA: ";?></td>
                  <td><?php echo "CIUDAD: " ;?></td>
                  <td><?php echo "TELEFONO: " ;?></td>
            </tr>
            <tr>
                  <td><?php echo $tienda->getId() ;?></td>
                  <td><?php echo $tienda->getNombre() ;?></td>
                  <td><?php echo $tienda->getProvincia() ;?></td>
                  <td><?php echo $tienda->getCiudad() ;?></td>
                  <td><?php echo $tienda->getTlfno() ;?></td>
            </tr>
        <?php endforeach;?>

      </table>
      </div>
</fieldset>

<fieldset>
  <legend> VOLVER A BUSCAR</legend>
  <form name="formBusqueda" action="index.php?ctl=buscar" method="POST">
    <table>
      <tr>
        <td>Pon palabra a buscar:</td>
        <td><input type="text" name="nombreBuscar"></td>
        <td><input type="submit" value="buscar"></td>
      </tr>
    </table>
  </form>
</fieldset>

<?php $contenido = ob_get_clean() ?>
<?php include_once 'baseUsuario.php' ?>
