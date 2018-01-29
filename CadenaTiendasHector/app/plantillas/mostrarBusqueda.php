<?php ob_start(); include_once 'nl2br2.php' ?>


<table border='1'>
<?php foreach ($listaBusqueda as  $lista): ?>
      <tr>
        <?php foreach ($lista as  $a): ?>
            <td><?php echo $a ?></td>
        <?php endforeach; ?>
      </tr>
  <?php endforeach; ?>

</table>

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
<?php include_once 'base.php' ?>
