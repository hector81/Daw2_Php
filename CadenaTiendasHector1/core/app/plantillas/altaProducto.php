<?php ob_start(); include_once 'nl2br2.php' ?>
<h1 id="present">Bienvenido <?php echo $_SESSION['usuario'].' perteneciente al grupo de: '.$_SESSION['grupo'] ;?></h1>
    <form name="formBusqueda" action="index.php?ctl=altaProducto" method="POST">
      <fieldset>
        <legend>PARA DAR ALTA PRODUCTOS</legend>
        <div><span ><?= isset($error)?$error: null; ?></span></div>
        <div>
          <label for='nombre'>Nombre:</label><br/>
          <input type='text' name='nombre' id='nombre' maxlength="50"><br>
        </div>
        <div>
          <label for='nombreCorto'>Nombre corto:</label><br>
          <input type='text' name='nombreCorto' id='nombreCorto' maxlength="50"><br>
        </div>
        <div>
          <label for='descripcion'>Descripción:</label><br>
          <input type='text' name='descripcion' id='descripcion' maxlength="50"><br>
        </div>
        <div>
          <label for='PVP'>PVP:</label><br>
          <input type='text' name='PVP' id='PVP' maxlength="50"><br>
        </div>
        <div>
          <label for='categoria'>Categoria:</label><br>
          <input type='text' name='categoria' id='categoria' maxlength="50"><br>
        </div>
        <div>
          <input type='file' id='file'  name='file'>
        </div>
        <div>
          <input type='submit' name='enviar' value='Enviar'>
        </div>
      </fieldset>
    </form>

<?php $contenido = ob_get_clean() ?>

<?php
if($_SESSION['grupo']=='admins'){
  include_once 'baseAdministrador.php';
}elseif($_SESSION['grupo']=='clientes'){
  include_once 'baseUsuario.php';
}
?>
