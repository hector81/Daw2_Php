<?php ob_start(); include_once 'nl2br2.php' ?>
<h1 id="present">Bienvenido <?php echo $_SESSION['usuario'].' perteneciente al grupo de: '.$_SESSION['grupo'] ;?></h1>
<form action="index.php?ctl=verTiendas" method='POST'>
  <fieldset>
    <legend>NUESTRAS TIENDAS</legend>
      <div><span ><?= isset($error)?$error: null; ?></span></div>
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
</form>

<?php $contenido = ob_get_clean() ?>

<?php
if($_SESSION['grupo']=='admins'){
  include_once 'baseAdministrador.php';
}elseif($_SESSION['grupo']=='clientes'){
  include_once 'baseUsuario.php';
}
?>
