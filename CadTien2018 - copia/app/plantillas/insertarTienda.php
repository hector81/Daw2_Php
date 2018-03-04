<?php ob_start(); include 'nl2br2.php'; ?>
<h1>Bienvenido <?php echo $_SESSION['userNombre'].' perteneciente al grupo de: '.$_SESSION['grupoUser'] ;?></h1>


    <form name="formularioUsuario" class="formularioUsuario" action="index.php?ctl=verTiendaInsertada" method="POST">
        <legend>Datos de la tienda a introducir</h1><br><br><br>

        <label for="nombreTienda">Nombre de la tienda</label>
        <input type="text" value="" name="nombreTienda" id="nombreTienda"><br><br>
        <label for="nombreProvincia">Provincia de la tienda</label>
        <input type="text" value="" name="nombreProvincia" id="nombreProvincia"><br><br>
        <label for="nombreCiudad">Ciudad de la tienda</label>
        <input type="text" value="" name="nombreCiudad" id="nombreCiudad"><br><br>
        <label for="telefonoTienda">Teléfono de la tienda</label>
        <input type="text" value="" name="telefonoTienda" id="telefonoTienda"><br><br>

        <input type="submit" value="Enviar tienda" name="boton" ><br><br>
    </form>

 <?php $contenido = ob_get_clean() ?>

 <?php include 'baseAdministrador.php' ?>
