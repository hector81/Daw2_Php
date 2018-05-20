<?php ob_start(); include './app/config/nl2br2.php'; ?>


<?php
echo '<div class="col-xs-12 col-md-12 col-lg-12 content_home">';
    echo '<div class="row">';
         echo '<div class="col-xs-12 col-md-12 col-lg-12">';
               echo '<h2>'.$libroIndividual['Titulo'].'</h2>';
               echo '<img class="pull-left book_home_r" src="'.$libroIndividual['Portada'].'" alt="imagen de artículo" title="imagen de artículo">';
               echo '<p><strong>Año de edición:</strong> '.$libroIndividual['YearPublicacion'].'</p>';
               echo '<p><strong>Nombre autor :</strong> '.$libroIndividual['nombre_autor'].'</p>';
               echo '<p><strong>Categoria :</strong> '.$libroIndividual['Nombre_Categoria'].'</p>';
               echo '<p><strong>Nombre SubCategoria :</strong> '.$libroIndividual['Nombre_SubCategoria'].'</p>';
               echo '<p><strong>Idioma:</strong> '.$libroIndividual['Idioma'].'</p>';
               echo '<p><strong>Precio: </strong> '.$libroIndividual['PVP'].' euros</p>';
               echo '<p><strong>Páginas:</strong> '.$libroIndividual['Paginas'].'</p>';
               echo '<p><strong>Encuadernacion :</strong> '.$libroIndividual['Encuadernacion'].'</p>';
               echo '<p><strong>Numero Edicion:</strong> '.$libroIndividual['Numero_Edicion'].'</p>';
               echo '<p><strong>Formato :</strong> '.$libroIndividual['Formato'].'</p>';
               echo '<p><strong>ISBN :</strong> '.$libroIndividual['ISBN'].'</p>';
               /////   IdLibro,IdSubCategoria,FechaDisponibilidad
               echo '<div class="ratings">';
                  echo '<p class="">';
                     echo '<strong>Calidad literaria:</strong>';
                     echo '<span class="glyphicon glyphicon-star mg_star_quality"></span>';
                     echo '<span class="glyphicon glyphicon-star"></span>';
                     echo '<span class="glyphicon glyphicon-star"></span>';
                     echo '<span class="glyphicon glyphicon-star"></span>';
                     echo '<span class="glyphicon glyphicon-star-empty"></span>';
                  echo '</p>';
               echo '</div>';
               echo '<div class="row">';
                  echo '<div class="col-xs-12 col-md-12 col-lg-12">';
                     echo '<h4><strong>Reseña</strong></h4>';
                     echo '<p>'.$libroIndividual['Descripcion'].'';
                     echo '</p>';
                  echo '</div>';
               echo '</div>';
               echo '<p class="pull-right">
                  <a href="index.php?ctl=verSubcategorias_de_CategoriasUsuario&IdCategoria='.$idCategoria.'" style="background:grey;color:white;">
                  categoría</a>
                  <a style="background:grey;color:white;">estilo</a>
                  <a style="background:grey;color:white;">editorial</a>
                  </p>';
               // echo '<ul class="list-inline">';
               //    echo '<li><a href="#">'.$libroIndividual['YearPublicacion'].'</a></li>';
               //    //echo '<li><a href="#"><i class="glyphicon glyphicon-comment"></i> 2 Comentarios</a></li>';
               //    //echo '<li><a href="#"><i class="glyphicon glyphicon-share"></i> 14 Shares</a></li>';
               // echo '</ul>';
               echo '<h4>Elige tienda de compra</h4>';
               echo '<select id="selectIdTienda" name="selectIdTienda" class="selectIdTienda">';
                     foreach ($tiendas as $key1 => $value1) {
                           echo "<option value='".$value1->getIdTienda()."'>".$value1->getNombre()."</option>";
                     }
               echo '</select>';
               echo '<form>';

               echo '<p class="lead">';
               echo '<form class="formBusqueda" name="formBusquedaLibro" method="POST" action="index.php?ctl=comprarLibroUsuarioReserva">';
                   echo '<button type="submit" class="btn btn-default btn_comprar_detalle" name="comprarLibroBoton">
                   <i class="fa fa-amazon" aria-hidden="true"></i> Comprar</button>';
                   echo '<input type="hidden" name="idLibro" value="'.$libroIndividual['IdLibro'].'">';
                   echo '<input type="hidden" name="IdEjemplar" value="'.$libroIndividual['IdEjemplar'].'">';
               echo '</form>';
               echo '</p>';


               echo '</form>';
           echo '</div>';
       echo '</div>';
   echo '</div>';



?>




<?php $contenido = ob_get_clean() ?>
<?php include 'baseUsuario.php' ?>
