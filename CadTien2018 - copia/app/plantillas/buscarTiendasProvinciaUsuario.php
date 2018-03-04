<?php ob_start(); include 'nl2br2.php'; ?>
<h1>Bienvenido <?php echo $_SESSION['userNombre'].' perteneciente al grupo de: '.$_SESSION['grupoUser'] ;?></h1>
<h2>CADENA TIENDAS MEDIA</h2>
<div class='tienda'></div>
    <table>
        <form id="formularioProvinciasTiendas" class="formularioProvinciasTiendas" name="formularioProvinciasTiendas"
        method="POST" action="index.php?ctl=verTiendasProvinciaUsuario">
            <select id="provinciasTiendas" name="provinciasTiendas" class="provinciasTiendas">
                <?php
                      foreach ($tiendas as $key1 => $value1) {
                            echo "<option value='".$value1."'>".$value1."</option>";
                      }
                      echo "<input type='submit' name='enviarProvincia' value='Enviar provincia busqueda'>";
                 ?>


            </select>
        </form>
    </table>

 <?php $contenido = ob_get_clean() ?>

 <?php include 'baseUsuario.php' ?>
