<?php ob_start(); include_once 'nl2br2.php' ?>

    <h1 id="present">Bienvenido <?php echo $_SESSION['usuario'].' perteneciente al grupo de: '.$_SESSION['grupo'] ;?></h1>
    <form name="formBusqueda" action="index.php?ctl=altaCategoria" method="POST">
      <fieldset>
        <legend>PARA DAR ALTA LAS CATEGORIAS</legend>
        <div><span ><?= isset($error)?$error: null; ?></span></div>
        <div>
          <label for='nombre'>Nombre:</label><br/>
          <input type='text' name='nombre' id='nombre' maxlength="50"><br>
        </div>
        <div>
          <label for='descripcion'>Descripción:</label><br>
          <input type='text' name='descripcion' id='descripcion' maxlength="50"><br>
        </div>
        <div>
          <input type='submit' name='enviar' value='Enviar'>
        </div>
      </fieldset>
    </form>

<?php $contenido = ob_get_clean() ?>

<?php include_once 'baseAdministrador.php' ?>
