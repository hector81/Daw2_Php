<?php ob_start();   ?>

<h1 id="present">Bienvenido <?php echo $_SESSION['usuario'].' perteneciente al grupo de: '.$_SESSION['grupo'] ;?></h1>
<fieldset>
  <legend>TODAS LAS RESEÑAS</legend>
  <div><span ><?= isset($error)?$error: null; ?></span></div>
  <table>
    <form name="formBusqueda" action="index.php?ctl=vertodasResenas">
        <?php
          foreach ($listaResultados as  $resena): ?>

          <tr style="background-color:green;text-align:left;">
                  <td><?php echo "RESENA ID: " ;?></td>
                  <td><?php echo "ARTICULO ID: ";?></td>
                  <td><?php echo "NOMBRE ARTICULO: " ;?></td>
                  <td><?php echo "FECHA RESENA: " ;?></td>
                  <td><?php echo "EMAIL RESENA: ";?></td>
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

    </form>
  </table>

<?php $contenido = ob_get_clean(); ?>

<?php
if($_SESSION['grupo']=='admins'){
  include 'baseAdministrador.php';
}elseif($_SESSION['grupo']=='clientes'){
  include 'baseUsuario.php';
}
?>
