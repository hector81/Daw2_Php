<?php ob_start(); include 'nl2br2.php'; ?>
<h1>Bienvenido <?php echo $_SESSION['userNombre'].' perteneciente al grupo de: '.$_SESSION['grupoUser'] ;?></h1><br><br>
<div><span class="avisoError" ><?= isset($error)?$error: null; ?></span></div><br><br>
<h2>CADENA TIENDAS MEDIA</h2>
<div class='COOMPRA'></div>
    <?php
        foreach ($compras as $key1 => $value1) {
            foreach ($value1 as $key2 => $value2) {
              echo "<table class='provincias'>";
                foreach ($value2 as $key3 => $value3) {

                    echo '<tr>';
                      echo '<td>'.$key3.'</td>';
                      echo '<td>'.$value3.'</td>';
                    echo '</tr>';

                }
                echo "</table>";
            }
        }
    ?>
  </table>

 <?php $contenido = ob_get_clean() ?>

 <?php include 'baseUsuario.php' ?>
