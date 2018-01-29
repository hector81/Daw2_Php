<?php ob_start(); include_once 'nl2br2.php' ?>


<table border='1'>
<?php foreach($articulos as $a): ?>
    <tr>
      <?php foreach($a as $b): ?>
          <td><?php echo $b ?></td>
      <?php endforeach; ?>
    </tr>
<?php endforeach; ?>

</table>

<?php $contenido = ob_get_clean() ?>
<?php include_once 'base.php' ?>
