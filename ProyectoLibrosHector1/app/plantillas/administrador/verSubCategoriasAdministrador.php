<?php ob_start(); include './app/config/nl2br2.php'; ?>

<?php
  echo '<table class="table table-condensed">';
  foreach ($subCategorias as $key => $value) {

    echo '<thead>';
      echo '<tr>';
        echo '<th>ID</th>';
        echo '<th>NOMBRE</th>';
        echo '<th>DESCRIPCIÓN</th>';
        echo '<th>ACCIONES</th>';
      echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
      echo '<thead>';
        echo '<tr>';
          echo '<td style="word-break: break-all;">'.$value->getIdSubCategoria().'</td>';
          echo '<td style="word-break: break-all;">'.$value->getNombreSubCategoria().'</td>';//'.$value['Email'].'
          echo '<td style="word-break: break-all;">'.$value->getDescripcion().'</td>';
          echo '<td style="word-break: break-all;">
          <a href="index.php?ctl=modificarSubCategoriaAdministrador&idSubCategoria='.$value->getIdSubCategoria().'">
          <span class="glyphicon glyphicon-pencil"></span>
          </a>
          <a href="index.php?ctl=borrarSubCategoriaAdministrador&idSubCategoria='.$value->getIdSubCategoria().'">
          <span class="glyphicon glyphicon-remove"></span>
          </a>
          </td>';
        echo '</tr>';
      echo '</thead>';
    echo '</tbody>';

 }
    echo '</table>';
 ?>

<?php $contenido = ob_get_clean() ?>
<?php include 'baseAdministrador.php' ?>
