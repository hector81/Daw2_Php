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
      $contador=1;
      foreach ($listaProductos as  $a):?>

      <tr>
            <?php foreach ($a as  $b): ?>
                <td><?php echo $b; ?></td>
            <?php endforeach; //http://www.anerbarrena.com/php-array-tipos-ejemplos-3876/ ?>
      </tr>
      <tr>
        <td>
          <form action="index.php?ctl=verResenas" method='post'>
              <input type='hidden' name='id' value='<?php $contador ?>'><br>
              <input type="submit" value="VER RESEÑA" name="id"><br>
          </form>
        </td>
        <td>
          <form action="index.php?ctl=nuevaFoto" method='post'>
              <input type='hidden' name='id' value='<?php $contador ?>'><br>
              <input type="submit" value="ACTUALIZAR FOTO" name="id"><br>
          </form>
        </td>
        <td>
          <form action="index.php?ctl=comprarProductoUsuario" method='post'>
              <input type='hidden' name='idProducto' value='<?php echo $contador ?>'><br>
              <input type="submit" value="COMPRAR PRODUCTO"><br>
          </form>
        </td>
      </tr>
      <?php $contador++; endforeach; ?>







      </table>
      </div>
  </fieldset>
</form>

<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>
