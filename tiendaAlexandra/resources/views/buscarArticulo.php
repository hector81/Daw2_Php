<?php ob_start() ?>

  <?php if(count($params['art'])>0): ?>
  <table class="table table-striped table-hover">
    <tr>
      <th>Nombre</th>
      <th>Descripción</th>
      <th>Pvp</th>
    </tr>

    <?php foreach ($params['art'] as $articulo) : ?>
      <tr>
        <td><a href="index.php?ctl=verArticulo&id=<?= $articulo->getId() ?>">
              <?= $articulo->getNombre(); ?></a></td>
        <td><?= nl2br(stripcslashes(substr($articulo->getDescripcion(),0,150))) ?>
          <a href="index.php?ctl=verArticulo&id=<?=$articulo->getId() ?>">...ver más</a></td>
        <td><?= number_format ( $articulo->getPvp(), 2) ?>€ </td>

      </tr>
    <?php endforeach; ?>

  </table>
  <?php
else:?>
<h2>No hay productos que contengan "<?=$params['nombre']?>" en el nombre.</h2>

<?php
endif;
$contenido = ob_get_clean();

include __DIR__ . '/../layout/base.php'; ?>
