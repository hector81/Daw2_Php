<?php ob_start() ?>

<h3>Subir foto</h3>
<h4 ><?= $nombre ?></h4>
<form action='index.php?ctl=nuevaFoto'
          enctype='multipart/form-data' method='POST'>
  <table>
    <tr>
      <td>
        <input type='hidden' name='id' value='<?= $id ?>'>
        <input id='nombreArch' type='file' name='file'>
      </td>
    </tr>
    <tr>
      <td>
        <input type='submit' name='subeFoto' value='Subir foto'>
      </td>
    </tr>
  </table>
</form>

<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>
