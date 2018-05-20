<?php ob_start(); include './app/config/nl2br2.php'; ?>


<?php
echo '<h1>LIBROS SubCategoria</h1>';
foreach ($libros as $key => $libroIndividual) {

  echo '<div class="slag" style="width: 33.333333333333333333%;float: left;display:block;height:641px;margin-bottom:2em;margin-top:3em;">';
      echo '<div class="thumbnail">';
         echo '<a href="index.php?ctl=verLibrosIndividualAdministrador&idLibro='.$libroIndividual['IdLibro'].'&nombreCategoria='.$libroIndividual['NombreCategoria'].'">
         <img src="'.$libroIndividual['Portada'].'" alt="'.$libroIndividual['Titulo'].'"></a>';
         echo '<div class="caption">';
            echo '<h4 class="pull-right">24.99 €</h4>';
            echo '<h4><a href="index.php?ctl=verLibrosIndividualAdministrador&idLibro='.$libroIndividual['IdLibro'].'&nombreCategoria='.$libroIndividual['NombreCategoria'].'">
            '.$libroIndividual['Titulo'].'</a>';
            echo '</h4>';
            echo '<p>Sed lectus quam, imperdiet vitae nunc ut, tincidunt suscipit sapien. Donec sed turpis non dolor porta ullamcorper.</p>';
         echo '</div>';
         echo '<div class="ratings">';

            echo '<div class="caption">';
               echo '<a href="#">';
               echo '<span class="glyphicon glyphicon-pencil"></span>';
               echo '</a>&nbsp;&nbsp;&nbsp;';
               echo '<a href="#">';
               echo '<span class="glyphicon glyphicon-remove"></span>';
               echo '</a>&nbsp;&nbsp;&nbsp;';
               echo '<a href="index.php?ctl=verLibrosIndividualAdministrador&idLibro='.$libroIndividual['IdLibro'].'&nombreCategoria='.$libroIndividual['NombreCategoria'].'">';
               echo '<span class="glyphicon glyphicon-eye-open"></span>';
               echo '</a>&nbsp;&nbsp;&nbsp;';
            echo '</div>';
         echo '</div>';
      echo '</div>';
   echo '</div>';
}//fin del foreach

?>



<?php $contenido = ob_get_clean() ?>
<?php include 'baseAdministrador.php' ?>
