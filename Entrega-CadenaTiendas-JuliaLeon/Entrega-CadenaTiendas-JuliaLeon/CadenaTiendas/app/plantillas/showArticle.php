<?php ob_start(); require_once 'herramientas.php';

if(isset($_SESSION['message'])) { ?>
  <div class="msj"><?php echo $_SESSION["message"] ?></div>
<?php
}  ?>

<section class="ver-art">
  <img src='/cadenatiendas/app/plantillas/recuperaFoto.php?id=<?= $articulo->getId() ?>' height='200' >
</section>
<section class="ver-art">
  <h2><?= $articulo->getNombre() ?></h2>
  <article class="ver-art-info">
    <p>PRECIO : <span> <?= number_format($articulo->getPvp(), 2, ',', '.').'€' ?> </span> </p>
    <?php if(($articulo->getStock())< 1 ){ ?>
      <h3>Agotado</h3>
    <?php }else if(($articulo->getStock())< 5){?>
      <h3>Quedan pocos</h3>
    <?php } ?>
    <p><?= nl2br2($articulo->getDescripcion()) ?></p>
  </article>
  <article>
    <?php if (isset($_SESSION['grupo']) && $_SESSION['grupo'] === 'admin') { ?>
        <a href="index.php?ctl=nuevaFoto&id=<?= $articulo->getId() ?>&nombre=<?= $articulo->getNombre() ?>">Subir nueva foto</a>
    <?php }else{ if(($articulo->getStock())> 0){ ?>
      <form class="" action="index.php?ctl=addToCart" method="post">
        <input type='hidden' name='id' value='<?= $articulo->getId() ?>'>
        <input type='submit' class="btn-buy" value="Comprar">
        <input type='number' name='uds' value='1' min='1'>
      </form>
    <?php  }} ?>
  </article>
</section>

<?php  unset($_SESSION['message']); $contenido = ob_get_clean() ?>
<?php include 'base.php';?>
