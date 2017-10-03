<?php ob_start() ?>

<h3 class='red center'>Subir foto</h3>
<?php if(isset($_GET['actualizada'])) :?>
  <h3 class='red center'>Foto actualizada</h3>
<?php endif; ?>
<h4 class='center'><?= $params['nombre'] ?></h4>
<form align='center' action='index.php?ctl=nuevaFoto&id=<?= $params['id'] ?>&nombre=<?= $params['nombre'] ?>'
          enctype='multipart/form-data' method='POST'>
  <table align='center'>
    <tr>
      <td align='center'>
        <input id='nombreArch' type='file' name='file'>
      </td>
    </tr>
    <tr>
      <td align='center'>
        <input type='submit' name='subeFoto' value='Subir foto'>
      </td>
    </tr>
  </table>
</form>
<?php $contenido = ob_get_clean() ?>

<?php include __DIR__ . '/../layout/base.php' ?>
