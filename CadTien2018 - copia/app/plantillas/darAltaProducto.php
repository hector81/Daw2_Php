<?php ob_start(); include 'nl2br2.php'; ?>
<h1>Bienvenido visitante</h1><br><br>
<div><span class="avisoError" ><?= isset($error)?$error: null; ?></span></div><br><br>

    <form name="formularioUsuario" enctype="multipart/form-data" class="formularioUsuario" action="index.php?ctl=darAltaProducto" method="POST">
        <legend>Datos del producto a introducir</h1><br><br><br>
        <label for="nombreCorto">Nombre corto</label>
        <input type="text" value="" name="nombreCorto" id="nombreCorto"><br><br>
        <label for="nombre">Nombre</label>
        <input type="text" value="" name="nombre" id="nombre"><br><br>
        <label for="descripcion">Descripción</label>
        <input type="text" value="" name="descripcion" id="descripcion"><br><br>
        <label for="PVP">PVP</label>
        <input type="text" value="" name="PVP" id="PVP"><br><br>
        <label for="nombreFamilia">Nombre familia</label>
        <select id="nombreFamilia" name="nombreFamilia" class="nombreFamilia">
            <?php
                foreach ($familias as $key => $value) {
                    echo '<option value="'.$value.'">'.$value.'</option>';
                }

             ?>
        </select><br><br>
        <label for="imagen">Subir imagen: </label>
        <input type="file" value="Elige foto" name="imagen" id="imagen"><br><br>

        <label for="nombreTienda">Tienda donde lo introduces</label>
        <select id="nombreTienda" name="nombreTienda" class="nombreTienda">
            <?php
                foreach ($tiendas as $key => $value) {
                    echo '<option value="'.$value->getId().'">'.$value->getNombre().'</option>';
                }

             ?>
        </select><br><br>
        <label for="numeroArticulos">Número artículos</label>
        <input type="number" value="" name="numeroArticulos" id="numeroArticulos"><br><br>


        <input type="hidden" value="false" name="agotado" id="agotado"><br><br>
        <input type="hidden" value="false" name="pocasUnidades" id="pocasUnidades"><br><br>
        <input type="submit" value="Añadir artículo" name="boton" ><br><br>
    </form>

 <?php $contenido = ob_get_clean() ?>

 <?php include 'baseAdministrador.php' ?>
