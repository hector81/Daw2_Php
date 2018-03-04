<?php ob_start(); include 'nl2br2.php'; ?><br><br>
<h1>Bienvenido <?php echo $_SESSION['userNombre'].' perteneciente al grupo de: '.$_SESSION['grupoUser'] ;?></h1>
<div><span class="avisoError" ><?= isset($error)?$error: null; ?></span></div><br><br>
<br><br>
<div><span class="avisoError" >RESULTADOS ARTICULO: <?= isset($errorA)?$errorA: null; ?></span></div><br><br>
<?php if($errorA != 'NO HAY RESULTADOS EN ARTÍCULOS'){
      foreach ($listaArticulo as $key1 => $arrayArticulo) {
          echo '<table class="categorias">';
          foreach ($arrayArticulo as $key2 => $value2) {
              echo '<tr>';
                  echo '<td>';echo $key2;
                  echo '</td>';
                  echo '<td>';echo $value2;
                  echo '</td>';
              echo '</tr>';
          }
          echo '</table>';
      }
}

?>
<br><br>
<div><span class="avisoError" >RESULTADOS TIENDAS: <?= isset($errorT)?$errorT: null; ?></span></div><br><br>
<?php if($errorT != 'NO HAY RESULTADOS EN TIENDAS'){
      foreach ($listaTienda as $key1 => $arrayTienda) {
          echo '<table class="categorias">';
          foreach ($arrayTienda as $key2 => $value2) {
              echo '<tr>';
                  echo '<td>';echo $key2;
                  echo '</td>';
                  echo '<td>';echo $value2;
                  echo '</td>';
              echo '</tr>';
          }
          echo '</table>';
      }
}

?>
<br><br>
<div><span class="avisoError" >RESULTADOS CATEGORIAS: <?= isset($errorF)?$errorF: null; ?></span></div><br><br>
<?php if($errorF != 'NO HAY RESULTADOS EN CATEGORIAS'){
      foreach ($listaFamilia as $key1 => $arrayFamilia) {
          echo '<table class="categorias">';
          foreach ($arrayFamilia as $key2 => $value2) {
              echo '<tr>';
                  echo '<td>';echo $key2;
                  echo '</td>';
                  echo '<td>';echo $value2;
                  echo '</td>';
              echo '</tr>';
          }
          echo '</table>';
      }
}

?>

<?php $contenido = ob_get_clean() ?>

<?php include 'baseAdministrador.php' ?>
