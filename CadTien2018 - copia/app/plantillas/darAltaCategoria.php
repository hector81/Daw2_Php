<?php ob_start(); include 'nl2br2.php'; ?>
<h1>Bienvenido <?php echo $_SESSION['userNombre'].' perteneciente al grupo de: '.$_SESSION['grupoUser'] ;?></h1><br><br>
<div><span class="avisoError" ><?= isset($error)?$error: null; ?></span></div><br><br>

    <form name="formularioAltaCategoria" class="formularioAltaCategoria" id="formularioAltaCategoria" action="index.php?ctl=darAltaCategoria" method="POST">
        <legend>Datos de la categoria o familia a introducir</h1><br><br><br>
        <label for="nombreCategoria">Nombre categoría</label>
        <input type="text" value="" name="nombreCategoria" id="nombreCategoria"><br><br>
        <label for="descripcionCategoria">Descripción categoría</label>
        <input type="text" value="" name="descripcionCategoria" id="descripcionCategoria"><br><br>
        <input type="submit" value="Enviar Categoria" name="botonCategoria" ><br><br>
    </form>

 <?php $contenido = ob_get_clean() ?>

 <?php include 'baseAdministrador.php' ?>
