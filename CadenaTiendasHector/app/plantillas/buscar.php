<?php ob_start() ?>
<h1 id="present">Bienvenido <?php echo $_SESSION['usuario'].' perteneciente al grupo de: '.$_SESSION['grupo'] ;?></h1>
<form action="index.php?ctl=buscar" method='post'>
  <fieldset>
    <legend>BUSCAR</legend>
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
</form>

<?php $contenido = ob_get_clean() ?>

<?php include_once 'base.php' ?>
