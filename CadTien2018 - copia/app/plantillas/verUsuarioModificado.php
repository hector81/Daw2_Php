<?php ob_start(); include 'nl2br2.php'; ?>
<h1>Bienvenido <?php echo $_SESSION['userNombre'].' perteneciente al grupo de: '.$_SESSION['grupoUser'] ;?></h1><br><br>
<div><span class="avisoError" ><?= isset($error)?$error: null; ?></span></div><br><br>
<div class='USUARIOnUEVO'></div>
<?php echo '<table class="categorias">';
    foreach ($usuarioModificadoEnseñar as $key => $value): ?>
  <?php

          echo '<tr>';
            echo '<td>';echo $key;
            echo '</td>';
              echo '<td>';echo $value;
              echo '</td>';
          echo '</tr>';

  ?>

<?php endforeach;echo '<table>'; ?>




<?php  $contenido = ob_get_clean() ?>

 <?php include 'baseAdministrador.php' ?>
