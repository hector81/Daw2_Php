<?php ob_start(); include 'nl2br2.php'; ?>


<div><span class="avisoError" ><?= isset($error)?$error: null; ?></span></div><br><br>


    <form name="formularioUsuario" class="formularioUsuario" action="index.php?ctl=verUsuarioModificado" method="POST">
        <legend>Datos del usuario a introducir</h1><br><br><br>
        <label for="nickUsuario">Nick usuario</label>
        <input type="text" value="<?php echo $nickUsuario; ?>" name="nickUsuario" id="nickUsuario"><br><br>
        <label for="passwordUsuario">Contraseña</label>
        <input type="password" value="<?php echo $contraseniaUsuario; ?>" name="passwordUsuario" id="passwordUsuario"><br><br>
        <input type="hidden" value="<?php echo $grupoUsuario; ?>" name="grupo" id="grupo">
        <label for="nombreUsuario">Nombre del usuario</label>
        <input type="text" value="<?php echo $nombreUsuario; ?>" name="nombreUsuario" id="nombreUsuario"><br><br>
        <label for="apellidosUsuario">Apellidos del usuario</label>
        <input type="text" value="<?php echo $apellidoUsuario; ?>" name="apellidosUsuario" id="apellidosUsuario"><br><br>
        <label for="calleUsuario">Calle del usuario</label>
        <input type="text" value="<?php echo $calleUsuario; ?>" name="calleUsuario" id="calleUsuario"><br><br>
        <label for="ciudadUsuario">Ciudad del usuario</label>
        <input type="text" value="<?php echo $ciudadUsuario; ?>" name="ciudadUsuario" id="ciudadUsuario"><br><br>
        <label for="cpUsuario">Código postal del usuario</label>
        <input type="text" value="<?php echo $cpUsuario; ?>" name="cpUsuario" id="cpUsuario"><br><br>
        <label for="provinciaUsuario">Provincia del usuario</label>
        <input type="text" value="<?php echo $provinciaUsuario; ?>" name="provinciaUsuario" id="provinciaUsuario"><br><br>
        <label for="tlfnoUsuario">Teléfono del usuario</label>
        <input type="text" value="<?php echo $tlfnoUsuario; ?>" name="tlfnoUsuario" id="tlfnoUsuario"><br><br>
        <label for="eCorreoUsuario">Email del usuario</label>
        <input type="text" value="<?php echo $emailUsuario; ?>" name="eCorreoUsuario" id="eCorreoUsuario"><br><br>
        <input type="submit" value="Enviar datos modificados Usuario" name="boton" ><br><br>
    </form>

 <?php $contenido = ob_get_clean() ?>

 <?php include 'baseAdministrador.php' ?>
