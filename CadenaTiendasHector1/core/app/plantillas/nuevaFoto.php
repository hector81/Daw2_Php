<?php ob_start() ?>

<form action='index.php?ctl=nuevaFoto'
          enctype='multipart/form-data' method='POST'>
          <fieldset>
            <legend>SUBIR FOTO</legend>
            <div><span ><?= isset($error)?$error: null; ?></span></div>
            <table>
            <tr>
              <td>
                <label for='nombreArticulo'>NOMBRE ARTICULO:</label><br/>
                <input type='text' name='nombreArticulo' id='nombreArticulo' maxlength="100"><br>
              </td>
            </tr>
            <tr>
              <td>
                <input type='hidden' name='nombreArch' value='<?= $id ?>'>
                <input id='nombreArch' type='file' name='file'>
              </td>
            </tr>
            <tr>
              <td>
                <input type='submit' name='subeFoto' value='Subir foto'>
              </td>
            </tr>
          </table>
        </fieldset>
</form>

<?php $contenido = ob_get_clean() ?>

<?php if($_SESSION['grupo']=='admins'){
  include_once 'baseAdministrador.php';
}elseif($_SESSION['grupo']=='clientes'){
  include_once 'baseUsuario.php';
} ?>
