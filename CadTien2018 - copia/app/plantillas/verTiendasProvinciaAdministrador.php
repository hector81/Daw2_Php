<?php ob_start(); include 'nl2br2.php'; ?>
<h1>Bienvenido <?php echo $_SESSION['userNombre'].' perteneciente al grupo de: '.$_SESSION['grupoUser'] ;?></h1><br><br>
<div><span class="avisoError" ><?= isset($error)?$error: null; ?></span></div><br><br>
<h2>CADENA TIENDAS MEDIA</h2>
<div class='tienda'></div>
    <?php
        foreach ($tiendasProvincia as $key1 => $value1) {
            echo "<table class='provincias'>";
            echo '<tr>';
              echo '<td>ID TIENDA</td>';
              echo '<td>'.$value1->getId().'</td>';
            echo '</tr>';
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
            echo '<tr>';
              echo '<td>';
              echo '<form id="elegirProdCat" class="elegirProdCat" action="index.php?ctl=verArticulosPorTiendaAdministrador" method="POST">';
              echo '<input type="hidden" name="nombreTienda" value="'.$value1->getNombre().'">';
              echo '<input type="submit" name="nombreTiendaB" value="Buscar Articulos por esta tienda">';
              echo '</form>';
              echo '</td>';
            echo '</tr>';
            echo '<tr>';
              echo '<td>';
              echo '<form id="modificarTienda" class="modificarTienda" action="index.php?ctl=modificarTienda" method="POST">';
              echo '<input type="hidden" name="nombreTienda" value="'.$value1->getNombre().'">';
              echo '<input type="hidden" name="provinciaTienda" value="'.$value1->getProvincia().'">';
              echo '<input type="hidden" name="ciudadTienda" value="'.$value1->getCiudad().'">';
              echo '<input type="hidden" name="telefonoTienda" value="'.$value1->getTelefono().'">';
              echo '<input type="submit" name="nombreTiendaB" value="Modificar tienda">';
              echo '</form>';
              echo '</td>';
            echo '</tr>';
            echo '<tr>';
              echo '<td>';
              echo '<form id="borrarTienda" class="borrarTienda" action="index.php?ctl=borrarTienda" method="POST">';
              echo '<input type="hidden" name="idTienda" value="'.$value1->getId().'">';
              echo '<input type="hidden" name="provinciasTiendas" value="'.$value1->getProvincia().'">';
              echo '<input type="submit" name="nombreTiendaB" value="Borrar tienda">';
              echo '</form>';
              echo '</td>';
            echo '</tr>';
            echo "</table>";
        }
    ?>
  </table>

 <?php $contenido = ob_get_clean() ?>

 <?php include 'baseAdministrador.php' ?>
