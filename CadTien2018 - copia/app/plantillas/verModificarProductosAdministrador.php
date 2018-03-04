<?php ob_start(); include 'nl2br2.php'; ?>
<h1>Bienvenido administrador</h1><br><br>
<div><span class="avisoError" ><?= isset($error)?$error: null; ?></span></div><br><br>

    <form name="formularioUsuario" enctype="multipart/form-data" class="formularioUsuario" action="index.php?ctl=articuloModificadoAdministrador" method="POST">
        <legend>Datos del producto a modificar</h1><br><br><br>
        <label for="nombreCortoArticulo">Nombre corto</label>
        <input type="text" value="<?php echo $nombreCortoArticulo; ?>" name="nombreCortoArticulo" id="nombreCortoArticulo"><br><br>
        <label for="nombreArticulo">Nombre</label>
        <input type="text" value="<?php echo $nombreArticulo; ?>" name="nombreArticulo" id="nombreArticulo"><br><br>
        <label for="descripcionArticulo">Descripción</label>
        <input type="text" value="<?php echo $descripcionArticulo; ?>" name="descripcionArticulo" id="descripcionArticulo"><br><br>
        <label for="pvpArticulo">PVP</label>
        <input type="text" value="<?php echo $pvpArticulo; ?>" name="pvpArticulo" id="pvpArticulo"><br><br>
        <label for="nombreFamilia">Nombre familia</label>
        <select id="nombreFamilia" name="nombreFamilia" class="nombreFamilia">$idFamiliaArticulo
            <?php
                foreach ($familias as $key => $value) {
                    echo '<option value="'.$value.'">'.$value.'</option>';
                }

             ?>
        </select><br><br>
        <label for="archivo">Subir imagen: </label>
        <input type="file" value="<?php echo $imagenArticulo; ?>" name="archivo" id="archivo"><br><br>

        <input type="hidden" value="<?php echo $idArticulo; ?>" name="idArticulo" id="idArticulo"><br><br>
        <input type="submit" value="Modificar artículo" name="boton" ><br><br>
    </form>

 <?php $contenido = ob_get_clean() ?>

 <?php include 'baseAdministrador.php' ?>
