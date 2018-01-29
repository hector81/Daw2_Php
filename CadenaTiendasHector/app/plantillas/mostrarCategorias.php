<?php ob_start(); include_once 'nl2br2.php' ?>


<table border='1'>
<?php foreach ($categorias as  $categoriasPlural): ?>
    <tr>
      <?php foreach ($categoriasPlural as  $categoriasSingular): ?>
          <td><?php echo $categoriasSingular ?></td>
      <?php endforeach; ?>
    </tr>
<?php endforeach; ?>
</table>

<?php $contenido = ob_get_clean() ?>
<?php include_once 'base.php' ?>
