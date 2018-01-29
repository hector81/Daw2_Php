<?php ob_start(); require_once "herramientas.php";?>
<div class="art-container">
<?php if(count($params['art'])>0){
  foreach ($params['art'] as $articulo){ ?>
    <section>
      <a href="index.php?ctl=showArticle&id=<?= $articulo->getId()?>">
      <div class="art-img">
        <img src='/cadenatiendas/app/plantillas/recuperaFoto.php?id=<?= $articulo->getId() ?>' width='150' >
      </div>
      <div class="art-info">
        <h4> <?= $articulo->getNombreMostrar(); ?> </h4>
        <p><?= number_format($articulo->getPvp(), 2, ',', '.').'€'  ?></p>
      </div>
      </a>
    </section>
<?php }
}else{?> <p>No se han encontrado artículos</p><?php } ?>
</div>

<?php $contenido = ob_get_clean() ?>
<?php include 'base.php' ?>
