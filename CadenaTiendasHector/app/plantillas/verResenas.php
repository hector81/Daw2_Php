<?php ob_start() ?>
<h1 id="present">Bienvenido <?php echo $_SESSION['usuario'].' perteneciente al grupo de: '.$_SESSION['grupo'] ;?></h1>

  <fieldset>
    <legend>TODOS LOS PRODUCTOS</legend>
    <div id="contenedor">
      <h1 align='center'>Reseñas de Productos cadenaTienda</h1>
      <table border='1'>
      <?php
        $Nuevalista= null;
        $Nuevalista= $listaResenas;
        if($Nuevalista == null){
          echo "<h4 align='center'>No hay reseñas para este producto.</h4>";

        }else{
          for($i=0;$i<count($Nuevalista);$i++){ ?>
             <tr>
               <?php for($j=0;$j<count($Nuevalista[$i]);$j++){ ?>
                   <td><?php echo $Nuevalista[$i][$j]; ?></td>
               <?php } ?>

             </tr>
         <?php } ?>

        <?php } ?>


      </table>
      </div>
  </fieldset>


<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>
