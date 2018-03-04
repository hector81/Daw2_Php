<?php ob_start(); include 'nl2br2.php'; ?>
<h1>Bienvenido <?php echo $_SESSION['userNombre'].' perteneciente al grupo de: '.$_SESSION['grupoUser'] ;?></h1><br><br>
<div><span class="avisoError" ><?= isset($error)?$error: null; ?></span></div><br><br>
<h2>Tiendas</h2>
<div class='tienda'>

  <?php
  
      foreach ($arrayTienda as $key1 => $value1) {
          echo "<table class='tiendasTotales'>";
          echo '<tr>';
            echo '<td>NOMBRE TIENDA</td>';
            echo '<td>'.$value1->getNombre().'</td>';
          echo '</tr>';
          echo '<tr>';
            echo '<td>PROVINCIA TIENDA</td>';
            echo '<td>'.$value1->getProvincia().'</td>';
          echo '</tr>';
          echo '<tr>';
            echo '<td>CIUDAD TIENDA</td>';
            echo '<td>'.$value1->getCiudad().'</td>';
          echo '</tr>';
          echo '<tr>';
            echo '<td>TELEFONO TIENDA</td>';
            echo '<td>'.$value1->getTelefono().'</td>';
          echo '</tr>';
          echo "</table>";
      }
  ?>
</div>
 <?php $contenido = ob_get_clean() ?>

 <?php include 'baseAdministrador.php' ?>
 <!--////////////////////////////////////////-->
