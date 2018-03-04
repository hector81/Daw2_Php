<?php ob_start(); include 'nl2br2.php'; ?>
<h1>Bienvenido visitante</h1><br><br>
<div><span class="avisoError" ><?= isset($error)?$error: null; ?></span></div><br><br>
<div class='USUARIOnUEVO'>
<h1>Area restringida. Gracias por registrarse. Estos son tus datos de usuario: </h1>
<?php echo '<table class="categorias">';
    foreach ($usuarioNuevoEnseñar as $key => $value): ?>
  <?php

          echo '<tr>';
            echo '<td>';echo $key;
            echo '</td>';
              echo '<td>';echo $value;
              echo '</td>';
          echo '</tr>';

  ?>

<?php endforeach;echo '<table>'; ?>

</div>


<?php  $contenido = ob_get_clean() ?>

 <?php include 'base.php' ?>
