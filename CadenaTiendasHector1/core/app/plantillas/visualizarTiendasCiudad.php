<?php ob_start(); include_once 'nl2br2.php' ?>
<fieldset>
  <legend>NUESTRAS TIENDAS</legend>
  <table border='1'>

  <?php foreach($tiendasCiudad as $tienda): ?>
      <tr style="background-color:green;text-align:left;">
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
    <legend>VOLVER A BUSCAR TIENDAS</legend>
      <p>Tenemos tiendas en Barcelona, Madrid, Valencia y Valladolid. Elige la provincia</p>
      <form action="index.php?ctl=verTiendas" method='post'>
        <table>
          <tr>
          <td><input type="text" name="nombreCiudad"></td>
          </tr>
          </tr>
            <td><br><input type="submit" value="Enviar provincia"><br></td>
          </tr>
        </table>
        </form>

  </fieldset>
<?php $contenido = ob_get_clean() ?>
<?php include_once 'baseUsuario.php' ?>
