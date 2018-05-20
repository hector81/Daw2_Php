<?php ob_start();
include './app/config/nl2br2.php'; ?>

<?php foreach ($usuario as $key => $value) {  ?>
<form name="formularioUsuario" class="formularioUsuario" action="index.php?ctl=enviarDatosModificacionUsuario" method="POST" style="text-align:left;">
        <legend>Datos del usuario a introducir</h1><br><br><br>
        <ul class="list-group">
            <li class="list-group-item">
                <label for="nickUsuario">Nick usuario</label>
                <input type="text" value="<?php echo $value->getUsuario(); ?>" name="nickUsuario" id="nickUsuario">
            </li>
            <li class="list-group-item">
                <label for="nombreUsuario">Nombre del usuario</label>
                <input type="text" value="<?php echo $value->getNombre(); ?>" name="nombreUsuario" id="nombreUsuario">
            </li>
            <li class="list-group-item">
                <label for="apellidos1">Primer apellido del usuario</label>
                <input type="text" value="<?php echo $value->getPrimerApellido(); ?>" name="apellidos1" id="apellidos1">
            </li>
            <li class="list-group-item">
                <label for="apellidos2">Segundo apellido del usuario</label>
                <input type="text" value="<?php echo $value->getSegundoApellido(); ?>" name="apellidos2" id="apellidos2">
            </li>
            <li class="list-group-item">
                <label for="direccionUsuario">Dirección del usuario</label>
                <input type="text" value="<?php echo $value->getDireccion(); ?>" name="direccionUsuario" id="direccionUsuario">
            </li>
            <li class="list-group-item">
                <label for="ciudadUsuario">Ciudad del usuario</label>
                <input type="text" value="<?php echo $ciudadUsuario; ?>" name="ciudadUsuario" id="ciudadUsuario">
            </li>
            <li class="list-group-item">
                <label for="tlfnoUsuario">Teléfono del usuario</label>
                <input type="text" value="<?php echo $value->getTelefono(); ?>" name="tlfnoUsuario" id="tlfnoUsuario">
            </li>
            <li class="list-group-item">
                <label for="nifUsuario">Nif del usuario</label>
                <input type="text" value="<?php echo $value->getNif(); ?>" name="nifUsuario" id="nifUsuario">
            </li>
            <li class="list-group-item">
                <label for="eCorreoUsuario">Email del usuario</label>
                <input type="text" value="<?php echo $value->getEmail(); ?>" name="eCorreoUsuario" id="eCorreoUsuario">
            </li>
            <li class="list-group-item">
                <label for="faxUsuario">Fax del usuario</label>
                <input type="text" value="<?php echo $value->getFax(); ?>" name="faxUsuario" id="faxUsuario">
            </li>
            <li class="list-group-item">
                <label for="contraseniaUsuarioNUEVA">Contraseña del usuario en caso de querer modificarla</label>
                <input type="password" value="" name="contraseniaUsuarioNUEVA" id="contraseniaUsuarioNUEVA">
            </li>
        </ul>
        <input type="hidden" value="<?php echo $emailAntiguo; ?>" name="emailAntiguo" id="emailAntiguo"><br><br>
        <input type="submit" value="Enviar datos modificados" name="boton" ><br><br>
  </form>
  <?php } ?>

<?php $contenido = ob_get_clean() ?>
<?php include 'baseAdministrador.php' ?>
