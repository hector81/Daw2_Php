<?php ob_start(); include './app/config/nl2br2.php'; ?>


<?php
echo '<h1>LIBROS SubCategoria</h1>';
foreach ($libros as $key => $libroIndividual) {

  echo '<div class="slag" style="width: 33.333333333333333333%;float: left;display:block;height:641px;margin-bottom:2em;margin-top:3em;">';
      echo '<div class="thumbnail">';
         echo '<a href="index.php?ctl=verLibrosIndividualUsuario&idLibro='.$libroIndividual['IdLibro'].'&nombreCategoria='.$libroIndividual['NombreCategoria'].'">
         <img src="'.$libroIndividual['Portada'].'" alt="'.$libroIndividual['Titulo'].'"></a>';
         echo '<div class="caption">';
            echo '<h4 class="pull-right">24.99 €</h4>';
            echo '<h4><a href="index.php?ctl=verLibrosIndividualUsuario&idLibro='.$libroIndividual['IdLibro'].'&nombreCategoria='.$libroIndividual['NombreCategoria'].'">
            '.$libroIndividual['Titulo'].'</a>';
            echo '</h4>';
            echo '<p>Sed lectus quam, imperdiet vitae nunc ut, tincidunt suscipit sapien. Donec sed turpis non dolor porta ullamcorper.</p>';
         echo '</div>';
         echo '<div class="ratings">';
            echo '<p class="text-center">';
               echo '<span class="glyphicon glyphicon-star"></span>';
               echo '<span class="glyphicon glyphicon-star"></span>';
               echo '<span class="glyphicon glyphicon-star"></span>';
               echo '<span class="glyphicon glyphicon-star"></span>';
               echo '<span class="glyphicon glyphicon-star-empty"></span>';
            echo '</p>';
            echo '<p class="text-center">8 opiniones</p>';
            echo '<p class="lead text-center"><button class="btn btn-default btn_buy_carousel"><i class="fa fa-amazon" aria-hidden="true">
            </i> Comprar en Amazon</button></p>';
            echo '<form class="formBusqueda" name="formBusquedaLibro" method="POST" action="index.php?ctl=verLibrosIndividualUsuario">';
                echo '<button type="submit" class="btn btn-default" name="verLibrosIndividual">Ver Libro</button>';
                echo '<input type="hidden" name="idLibro" value="'.$libroIndividual['IdLibro'].'">';
                echo '<input type="hidden" name="nombreCategoria" value="'.$libroIndividual['NombreCategoria'].'">';
            echo '</form>';
         echo '</div>';
      echo '</div>';
   echo '</div>';

}//fin del foreach

?>



<?php $contenido = ob_get_clean() ?>
<?php include 'baseUsuario.php' ?>
