<?php ob_start(); include 'nl2br2.php'; ?>
<h1>Bienvenido visitante</h1>
<h2>Tiendas</h2>
<div class='tienda'></div>

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
</table>
 <?php $contenido = ob_get_clean() ?>

 <?php include 'baseAdministrador.php' ?>
