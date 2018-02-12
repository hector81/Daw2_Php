<?php ob_start(); include_once 'nl2br2.php' ?>

<div><span ><?= isset($error)?$error: null; ?></span></div>
<table border='1'>
<?php foreach ($categorias as  $categoria): ?>
  <tr style="background-color:green;text-align:left;">
          <td><?php echo "ID: " ;?></td>
          <td><?php echo "NOMBRE: ";?></td>
          <td><?php echo "DESCRIPCIÓN: " ;?></td>

    </tr>
    <tr>
          <td><?php echo $categoria->getId() ;?></td>
          <td><?php echo $categoria->getNombre() ;?></td>
          <td><?php echo $categoria->getDescripcion() ;?></td>
    </tr>
<?php endforeach; ?>
</table>
<table>
  <form name="formBusqueda" action="index.php?ctl=categorias" method="POST">
    <h4>BUSCA CATEGORIAS</h4>

      <tr>
        <td>Nombre categoria:</td>
        <td><input type="text" name="nombreCategoria"></td>
        <td><input type="submit" value="buscar"></td>
      </tr>
      <tr>
  </form>


</table>

<?php $contenido = ob_get_clean() ?>
<?php include_once 'baseUsuario.php' ?>
