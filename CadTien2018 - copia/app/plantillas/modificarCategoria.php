<?php ob_start(); include 'nl2br2.php'; ?>
<h1>Bienvenido <?php echo $_SESSION['userNombre'].' perteneciente al grupo de: '.$_SESSION['grupoUser'] ;?></h1>


    <form name="formularioUsuario" class="formularioUsuario" action="index.php?ctl=verCategoriaModificada" method="POST">
        <legend>Datos de la categoria a introducir</h1><br><br><br>

        <label for="nombreCategoria">Nombre de la categoria</label>
        <input type="text" value="<?php echo $nombreCategoria; ?>" name="nombreCategoria" id="nombreCategoria"><br><br>
        <label for="descripcionCategoria">Descripción de la categoria</label>
        <input type="text" value="<?php echo $descripcionCategoria; ?>" name="descripcionCategoria" id="descripcionCategoria"><br><br>
        <input type="hidden" value="<?php echo $articulosCategoriaId; ?>" name="articulosCategoriaId" id="articulosCategoriaId">
        <input type="submit" value="Enviar categoria modificada" name="boton" ><br><br>
    </form>

 <?php $contenido = ob_get_clean() ?>

 <?php include 'baseAdministrador.php' ?>
