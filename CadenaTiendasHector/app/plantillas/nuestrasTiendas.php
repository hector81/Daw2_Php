<?php ob_start(); include_once 'nl2br2.php' ?>
<h1 id="present">Bienvenido <?php echo $_SESSION['usuario'].' perteneciente al grupo de: '.$_SESSION['grupo'] ;?></h1>
<form action="index.php?ctl=nuestrasTiendas" method='POST'>
  <fieldset>
    <legend>NUESTRAS TIENDAS</legend>
      <p>Tenemos tiendas en Barcelona, Madrid, Valencia y Vallalodid. Elige la provincia</p>
        <table>
          <tr>
          <td><input type="text" name="nombreCiudad"></td>
          </tr>
          </tr>
            <td><br><input type="submit" value="Enviar provincia"><br></td>
          </tr>
        </table>
  </fieldset>
</form>

<?php $contenido = ob_get_clean() ?>

<?php include_once 'base.php' ?>
