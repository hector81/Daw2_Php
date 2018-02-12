<?php ob_start() ?>
<h1 id="present">Bienvenido <?php echo $_SESSION['usuario'].' perteneciente al grupo de: '.$_SESSION['grupo'] ;?></h1>
<form action="index.php?ctl=todosLosProductos" method='post'>
  <fieldset>
    <legend>TODOS LOS PRODUCTOS</legend>
    <div id="contenedor">
      <h1 align='center'>Reseñas de Productos cadenaTienda</h1>
      <table border='1'>
      <?php
      $listaProductos;
      foreach ($listaProductos as  $articulo):?>
          <tr style="background-color:green;text-align:left;">
                <td><?php echo "ID: " ;?></td>
                <td><?php echo "NOMBRE CORTO: " ;?></td>
                <td><?php echo "NOMBRE: ";?></td>
                <td><?php echo "DESCRIPCIÓN: " ;?></td>
                <td><?php echo "PVP: " ;?></td>
                <td><?php echo "ID FAMILIA: " ;?></td>
                <td><?php echo "FOTO: " ;?></td>
          </tr>
          <tr>
                <td><?php echo $articulo->getId() ;?></td>
                <td><?php echo $articulo->getNombreCorto() ;?></td>
                <td><?php echo $articulo->getNombre() ;?></td>
                <td><?php echo $articulo->getDescripcion() ;?></td>
                <td><?php echo $articulo->getPvp() ;?></td>
                <td><?php echo $articulo->getIdFamilia() ;?></td>
                <td><?php echo $articulo->getFoto() ;?></td>
          </tr>

      <?php endforeach; ?>

      </table>
      </div>
  </fieldset>
</form>

<?php $contenido = ob_get_clean() ?>

<?php
if($_SESSION['grupo']=='admins'){
  include 'baseAdministrador.php';
}elseif($_SESSION['grupo']=='clientes'){
  include 'baseUsuario.php';
}
?>
