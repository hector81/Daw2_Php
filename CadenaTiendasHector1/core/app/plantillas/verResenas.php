<?php ob_start() ?>
<h1 id="present">Bienvenido <?php echo $_SESSION['usuario'].' perteneciente al grupo de: '.$_SESSION['grupo'] ;?></h1>

  <fieldset>
    <legend>RESEÑAS DE PRODUCTOS</legend>
    <div><span ><?= isset($error)?$error: null; ?></span></div>
    <div id="contenedor">
      <h1 align='center'>Reseñas deL producto</h1>
      <table border='1'>
        <?php
        $listaResenas;
        if($listaResenas ==null){
            echo "BUSCA OTRA VEZ " ;
        }else{

        ?>
        <?php foreach ($listaResenas as  $resena):?>
            <tr style="background-color:green;text-align:left;">
                  <td><?php echo "ID  RESENA: " ;?></td>
                  <td><?php echo "ID ARTICULO: " ;?></td>
                  <td><?php echo "NOMBRE ARTICULO: ";?></td>
                  <td><?php echo "FECHA RESENIA: " ;?></td>
                  <td><?php echo "EMAIL RESEÑA: " ;?></td>
                  <td><?php echo "PUNTUACION: " ;?></td>
                  <td><?php echo "COMENTARIOS: " ;?></td>
                  <td><?php echo "MODIFIED DATE: " ;?></td>
            </tr>
            <tr>
                  <td><?php echo $resena->getIdResenia() ;?></td>
                  <td><?php echo $resena->getIdArticulo() ;?></td>
                  <td><?php echo $resena->getNombreArticulo() ;?></td>
                  <td><?php echo $resena->getFechaResenia() ;?></td>
                  <td><?php echo $resena->getEmailResenia() ;?></td>
                  <td><?php echo $resena->getPuntuacion() ;?></td>
                  <td><?php echo $resena->getComentarios() ;?></td>
                  <td><?php echo $resena->getModifiedDate() ;?></td>
            </tr>
        <?php endforeach; ?>
        <?php } ?>

      </table>
      <table>
        <form name="formBusqueda" action="index.php?ctl=verResenas" method="POST">
          <h4>PARA BUSCAR RESEÑAS POR ID DE PRODUCTO</h4>
          <div><span ><?= isset($error)?$error: null; ?></span></div>
            <tr>
              <td>ID DE PRODUCTO:</td>
              <td><input type="text" name="idResena"></td>
              <td><input type="submit" value="buscar"></td>
            </tr>
        </form>


      </table>
      </div>
  </fieldset>


<?php $contenido = ob_get_clean() ?>

<?php include_once 'baseUsuario.php' ?>
