<?php ob_start(); include "nl2br2.php";?>

  <form name="formBusqueda" action="index.php?ctl=actualizaImagenes" method="POST">
    <h4>Introduzca términos de búsqueda de artículos</h4>
    <table>
      <tr>
        <td>Nombre articulo:</td>
        <td><input type="text" name="nombre" value="<?php echo $params['nombre']?>"></td>
        <td><input type="submit" value="buscar"></td>
      </tr>
    </table>
  </form>
<?php if(count($params['art'])>0): ?>
  <table>
    <tr>
      <th>Nombre</th>
      <th>Descripción</th>
      <th>Pvp</th>
    </tr>
    <?php foreach ($params['art'] as $articulo) : ?>
      <tr>
        <td><a href="index.php?ctl=verArticulo&id=<?= $articulo->getId()?>">
              <?= $articulo->getNombre(); ?></a></td>
              <?php $art = nl2br2($articulo->getDescripcion())  ?>
        <td><?= $art  ?></td>
        <td><?= number_format($articulo->getPvp(), 2, ',', '.').'€'  ?></td>
      </tr>
  <?php endforeach; ?>

  </table>
<?php endif; ?>

<?php $contenido = ob_get_clean() ?>

<?php if($_SESSION['grupo']=='admins'){
  include_once 'baseAdministrador.php';
}elseif($_SESSION['grupo']=='clientes'){
  include_once 'baseUsuario.php';
} ?>
