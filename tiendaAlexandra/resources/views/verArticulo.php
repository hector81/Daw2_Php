<?php ob_start() ?>

<h1><?= $params['nombre'] ?></h1>
<table class="table table-striped table-hover">
  <tr>
    <td rowspan='3'><img class="img-responsive" src='foto.php?productId=<?= $params['id'] ?>' height='150' ></td>
    <?php if(isset($_SESSION['grupo']) && $_SESSION['grupo'] === 'admins') { ?>
    <td colspan='7'><a href="index.php?ctl=nuevaFoto&id=<?= $params['id'] ?>&nombre=<?= $params['nombre'] ?>">Subir nueva foto</a></td>
    <?php } ?>
  </tr>
  <tr>
    <td class='precio'><?= number_format ( $params['PVP'], 2) ?> €</td>
    <?php $stockTotal=0;
    foreach ($params['stock'] as $key => $unidades) {
          foreach($unidades as $stockUnitario){
            $stockTotal += $stockUnitario;
          }

    }
      if($stockTotal<=0){?>
        <td class='red'>No disponible.</td>
      <?php }else{?>
    <td class='blue cursiva'>Quedan <?= $stockTotal?> unidades</td><?php }?>
    <td><form action='index.php?ctl=anadirCarrito' method='post'>
      <input type='hidden' name='id' value='<?= $params['id'] ?>'>
      <input id='cantidad' type='number' name='cantidad' value='1' min='1' max='10' step='1'>
      <input type='submit' name='añadir' value='Añadir al carrito'>
    </form>
    </td>
  </tr>
  <tr>
    <td colspan="7"><?= nl2br(stripcslashes($params['descripcion'])) ?></td>
  </tr>

</table>
<a href="<?=$_SERVER['HTTP_REFERER']?>">Volver</a>
<?php $contenido = ob_get_clean() ?>
<?php include __DIR__ . '/../layout/base.php'; ?>
