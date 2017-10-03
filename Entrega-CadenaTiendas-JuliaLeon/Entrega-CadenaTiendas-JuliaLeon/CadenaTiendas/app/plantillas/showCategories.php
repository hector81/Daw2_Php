<?php ob_start() ?>
<div class="cat-container">
  <?php
  if(count($categorias['cat'])>0){
    foreach ($categorias['cat'] as $categoria) { ?>
      <a href="index.php?ctl=artByCategory&id=<?= $categoria->getId() ?>">
        <div class="ver-cat">
          <h2><?= $categoria->getNombre() ?></h2>
          <p><?= $categoria->getDescripcion() ?></p>
        </div>
      </a>
  <?php }} ?>
</div>

<?php $contenido = ob_get_clean() ?>
<?php include 'base.php' ?>
