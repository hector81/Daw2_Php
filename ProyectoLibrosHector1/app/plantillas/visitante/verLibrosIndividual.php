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
               echo '<p class="pull-right"><span class="label label-default">
               <a href="index.php?ctl=verSubcategorias_de_Categorias&IdCategoria='.$idCategoria.'" style="color:white;">categoría</a></span>
               <span class="label label-default">estilo</span> <span class="label label-default">editorial</span></p>';
               echo '<ul class="list-inline">';
                  echo '<li><a href="#">Hace 2 días</a></li>';
                  echo '<li><a href="#"><i class="glyphicon glyphicon-comment"></i> 2 Comentarios</a></li>';
                  echo '<li><a href="#"><i class="glyphicon glyphicon-share"></i> 14 Shares</a></li>';
               echo '</ul>';
               echo '<form>';

               echo '<p class="lead">
               <button type="button" class="btn btn-default btn_comprar_detalle" data-toggle="modal" data-target="#myModal">
               <i class="fa fa-amazon" aria-hidden="true"></i> Comprar</button>
               <div class="modal fade" id="myModal" role="dialog">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <h4 class="modal-title">Aviso visitante</h4>
                     </div>
                     <div class="modal-body">
                       <p>Para poder comprar debes registrarte. Ve a la pestaña Apuntate y envianos tus datos.</p>
                     </div>
                     <div class="modal-footer">
                       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     </div>
                   </div>

                 </div>
               </div>
               </p>';


               echo '</form>';
           echo '</div>';
       echo '</div>';
   echo '</div>';



?>




<?php $contenido = ob_get_clean() ?>
<?php include 'baseInicio.php' ?>
