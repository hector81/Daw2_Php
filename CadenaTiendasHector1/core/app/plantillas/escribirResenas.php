<?php ob_start(); include_once 'nl2br2.php' ?>
<h1 id="present">Bienvenido <?php echo $_SESSION['usuario'].' perteneciente al grupo de: '.$_SESSION['grupo'] ;?></h1>
    <form name="formBusqueda" action="index.php?ctl=escribirResenas" method="POST">
      <fieldset>
        <legend>ESCRIBE UNA RESEÑA DEL PRODUCTO: </legend>
        <div><span ><?= isset($error)?$error: null; ?></span></div>
        <div>
          <label for='nombreArticulo'>Nombre articulo:</label><br/>
          <input type='text' name='nombreArticulo' id='nombreArticulo' maxlength="50"><br>
        </div>
        <div>
          <label for='email'>Email:</label><br>
          <input type='text' name='email' id='email' maxlength="50"><br>
        </div>
        <div>
          <label for='puntuacion'>Puntuación:</label><br>
          <input type='number' name='puntuacion' id='puntuacion' maxlength="50"><br>
        </div>
        <div>
          <label for='comentarios'>Comentarios:</label><br>
          <input type='text' name='comentarios' id='comentarios' maxlength="150"><br>
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
