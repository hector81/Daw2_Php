<?php ob_start() ?>
<h1 id="present">Bienvenido <?php echo $_SESSION['usuario'].' perteneciente al grupo de: '.$_SESSION['grupo'] ;?></h1>

  <fieldset>
    <legend>QUIERES COMPRAR PRODUCTO</legend>
    <div><span ><?= isset($error)?$error: null; ?></span></div>
    <?php foreach($resultado as $articulo): ?>
      <tr style="background-color:green;text-align:left;">
            <td><?php echo "ID: " ;?></td>
            <td><?php echo "NOMBRE CORTO: " ;?></td>
            <td><?php echo "NOMBRE: ";?></td>
            <td><?php echo "DESCRIPCIÓN: " ;?></td>
            <td><?php echo "PVP: " ;?></td>
            <td><?php echo "ID FAMILIA: " ;?></td>
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

    <form action="index.php?ctl=confirmacionComprarProducto" method='post'>
        Pon la provincia donde quieres comprarlo: <input type='text' name='ciudad'><br>
        Pon la CANTIDAD que quieres comprar: <input type='text' name='cantidad'><br>
        El id del producto que quieres comprar:<input type='text' name='idProducto' value='<?php echo $articulo->getId() ?>'><br>
        Tu nombre de usuario: <input type='text' name='nombreCliente' value='<?php echo $_SESSION['usuario']  ?>'><br>
        <input type="submit" value="COMPRAR PRODUCTO <?php echo $_SESSION['usuario']  ?>"><br>
    </form>
  </fieldset>


<?php $contenido = ob_get_clean() ?>

<?php include 'baseUsuario.php' ?>
