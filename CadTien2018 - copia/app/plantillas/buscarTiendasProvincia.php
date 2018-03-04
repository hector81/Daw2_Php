<?php ob_start(); include 'nl2br2.php'; ?>
<h1>Bienvenido visitante</h1>
<h2>CADENA TIENDAS MEDIA</h2>
<div class='tienda'></div>
    <table>
        <form id="formularioProvinciasTiendas" class="formularioProvinciasTiendas" name="formularioProvinciasTiendas"
        method="POST" action="index.php?ctl=verTiendasProvincia">
            <select id="provinciasTiendas" name="provinciasTiendas" class="provinciasTiendas">
                <?php
                      foreach ($tiendas as $key1 => $value1) {
                            echo "<option value='".$value1."'>".$value1."</option>";
                      }
                      echo "<input type='submit' name='enviarProvincia' value='Enviar provincia busqueda'>";
                      echo "<input type='hidden' name='nombreProvincia' value='".$value1."'>";
                 ?>


            </select>
        </form>
    </table>

 <?php $contenido = ob_get_clean() ?>

 <?php include 'base.php' ?>
