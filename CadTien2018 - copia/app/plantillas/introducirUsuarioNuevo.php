<?php ob_start(); include 'nl2br2.php'; ?>
<h1>Bienvenido visitante. Aqúi puedes registrarte para poder comprar productos.</h1><br><br>

<div><span class="avisoError" ><?= isset($error)?$error: null; ?></span></div><br><br>


    <form name="formularioUsuario" class="formularioUsuario" action="index.php?ctl=verUsuarioNuevoIntroducido" method="POST">
        <legend>Datos del usuario a introducir</h1><br><br><br>
        <label for="nickUsuario">Nick usuario</label>
        <input type="text" value="" name="nickUsuario" id="nickUsuario"><br><br>
        <label for="passwordUsuario">Contraseña</label>
        <input type="password" value="" name="passwordUsuario" id="passwordUsuario"><br><br>
        <input type="hidden" value="usuarios" name="grupo" id="grupo">
        <label for="nombreUsuario">Nombre del usuario</label>
        <input type="text" value="" name="nombreUsuario" id="nombreUsuario"><br><br>
        <label for="apellidosUsuario">Apellidos del usuario</label>
        <input type="text" value="" name="apellidosUsuario" id="apellidosUsuario"><br><br>
        <label for="calleUsuario">Calle del usuario</label>
        <input type="text" value="" name="calleUsuario" id="calleUsuario"><br><br>
        <label for="ciudadUsuario">Ciudad del usuario</label>
        <input type="text" value="" name="ciudadUsuario" id="ciudadUsuario"><br><br>
        <label for="cpUsuario">Código postal del usuario</label>
        <input type="text" value="" name="cpUsuario" id="cpUsuario"><br><br>
        <label for="provinciaUsuario">Provincia del usuario</label>
        <input type="text" value="" name="provinciaUsuario" id="provinciaUsuario"><br><br>
        <label for="tlfnoUsuario">Teléfono del usuario</label>
        <input type="text" value="" name="tlfnoUsuario" id="tlfnoUsuario"><br><br>
        <label for="eCorreoUsuario">Email del usuario</label>
        <input type="text" value="" name="eCorreoUsuario" id="eCorreoUsuario"><br><br>
        <input type="submit" value="Enviar Usuario" name="boton" ><br><br>
    </form>

 <?php $contenido = ob_get_clean() ?>

 <?php include 'base.php' ?>
