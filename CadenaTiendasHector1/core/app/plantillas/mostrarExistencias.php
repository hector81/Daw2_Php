<?php ob_start(); include_once 'nl2br2.php' ?>

    <h1 id="present">Bienvenido <?php echo $_SESSION['usuario'].' perteneciente al grupo de: '.$_SESSION['grupo'] ;?></h1>
    <form action='index.php?ctl=mostrarExistencias' method='post'>
      <fieldset>
        <legend>MOSTRAR PRODUCTO EXISTENCIAS</legend>
        <div><span ><?= isset($error)?$error: null; ?></span></div>
        <div>
          <label for='nombreProducto'>Nombre a producto a examinar:</label><br/>
          <input type='text' name='nombreProducto' id='nombreProducto' maxlength="50"><br>
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
