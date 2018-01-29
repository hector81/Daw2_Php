<?php ob_start(); include_once 'nl2br2.php' ?>


<table border='1'>
<?php foreach ($tiendasCiudad as  $tiendasCiudadPlural): ?>
    <tr>
      <?php foreach ($tiendasCiudadPlural as  $tiendasCiudadSingular): ?>
          <td><?php echo $tiendasCiudadSingular ?></td>
      <?php endforeach; ?>
    </tr>
<?php endforeach; ?>
</table>

<?php $contenido = ob_get_clean() ?>
<?php include_once 'base.php' ?>
