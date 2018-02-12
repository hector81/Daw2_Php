<?php ob_start(); include_once 'nl2br2.php';require_once 'fuente/Modelo/articulo.php'; ?>
<h1 id="present">Bienvenido <?php echo $_SESSION['usuario'].' perteneciente al grupo de: '.$_SESSION['grupo'] ;?></h1>
<fieldset>
  <legend>MOSTRAR ARTICULOS</legend>
  <div><span ><?= isset($error)?$error: null; ?></span></div>
  <table border='1'>
  <?php foreach($existenciaNumeros as $existencia): ?>
      <tr style="background-color:green;text-align:left;">
            <td><?php echo "PRODUCTO: " ;?></td>
            <td><?php echo "NOMBRE TIENDA: " ;?></td>
            <td><?php echo "NOMBRE CIUDAD: ";?></td>
            <td><?php echo "NOMBRE PROVINCIA: " ;?></td>
            <td><?php echo "STOCK: ";?></td>
      </tr>
      <tr>
            <td><?php echo $existencia->getNombreProducto() ;?></td>
            <td><?php echo $existencia->getNombreTienda() ;?></td>
            <td><?php echo $existencia->getNombreCiudad() ;?></td>
            <td><?php echo $existencia->getNombreProvincia() ;?></td>
            <td><?php echo $existencia->getStock() ;?></td>
      </tr>
  <?php endforeach;?>
  </table>
  <form action='index.php?ctl=mostrarExistencias' method='post'>
    <fieldset>
      <legend>MOSTRAR PRODUCTO EXISTENCIAS</legend>
      <div><span ><?= isset($error)?$error: null; ?></span></div>
      <div>
        <label for='nombreProducto'>Nombre a producto a examinar:</label><br/>
        <input type='text' name='nombreProducto' id='nombreProducto' maxlength="50"><br>
      </div>
      <div>
        <input type='submit' name='enviar' value='Enviar'>
      </div>
    </fieldset>
  </form>


<?php $contenido = ob_get_clean() ?>
<?php
if($_SESSION['grupo']=='admins'){
  include_once 'baseAdministrador.php';
}elseif($_SESSION['grupo']=='clientes'){
  include_once 'baseUsuario.php';
}
?>
