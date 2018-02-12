<?php ob_start(); include_once 'nl2br2.php';require_once 'fuente/Modelo/articulo.php'; ?>
<h1 id="present">Bienvenido <?php echo $_SESSION['usuario'].' perteneciente al grupo de: '.$_SESSION['grupo'] ;?></h1>
<fieldset>
  <legend>MOSTRAR ARTICULOS</legend>
  <div><span ><?= isset($error)?$error: null; ?></span></div>
  <table border='1'>
  <?php foreach($articulos as $articulo): ?>
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
  <?php endforeach;?>
  </table>
  <form action="index.php?ctl=verArticulo" method='post'>
    <fieldset>
      <legend>ARTICULO</legend>
      <div><span ><?= isset($error)?$error: null; ?></span></div>
      <div>
        <label for='nombre'>NOMBRE ARTICULO:</label><br/>
        <input type='text' name='nombre' id='nombre' maxlength="50"><br>
      </div>
      <div>
        <input type='submit' name='enviar' value='Enviar'>
      </div>
    </fieldset>
  </form>
</fieldset>


<?php $contenido = ob_get_clean() ?>
<?php include_once 'baseUsuario.php' ?>
