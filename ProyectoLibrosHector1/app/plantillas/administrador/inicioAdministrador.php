<?php
ob_start();
include './app/config/nl2br2.php';
?>
<?php
foreach ($librosPaginaPrincipal as $key1 => $arrayLibro) {
    echo '<form class="formBusqueda" name="formBusquedaLibro" method="POST" action="index.php?ctl=verLibrosIndividualUsuario">';
    echo '<div class="row">';
    echo '<div class="col-xs-12 col-md-12 col-lg-12 content_home">';
    echo '<h2>' . $arrayLibro['Titulo'] . '</h2>';
    echo '<a href="detalle_articulo.html"><img class="pull-left book_home_r" src="' . $arrayLibro['Portada'] . '"
            "height="230px" width="300px" alt="Imagen de artículo" title="Imagen de artículo"></a>'; //230x300//160x120
    echo '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate.
               Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero. Aenean sit amet felis
               dolor, in sagittis nisi. Sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan.
               Aliquam in felis sit amet augue.
            </p>';
    echo '<p class="lead"><button class="btn btn-default"><i class="fa fa-amazon" aria-hidden="true"></i> Comprar en Amazon</button></p>';
    echo '<p class="pull-right"><span class="label label-default">categoría</span> <span class="label label-default">estilo</span> <span class="label label-default">editorial</span></p>';
    echo '<ul class="list-inline">';
    echo '<li><a href="#">Año publicación : ' . $arrayLibro['YearPublicacion'] . '</a></li>';
    echo '<li><a href="#"><i class="glyphicon glyphicon-comment"></i> 2 Comentarios</a></li>';
    echo '<li><a href="#"><i class="glyphicon glyphicon-share"></i> 14 Shares</a></li>';
    echo '<li><a href="#">Autor : ' . $arrayLibro['nombre_autor'] . '</a></li>';
    echo '<li><a href="#">Precio :' . $arrayLibro['PVP'] . '</a></li>';
    echo '</ul>';
    echo '<button type="submit" class="btn btn-default" name="verLibrosIndividualUsuario">Ver Libro</button>';
    echo '<input type="hidden" name="nombreCategoria" value="' . $arrayLibro['NombreCategoria'] . '">';
    echo '<input type="hidden" name="idLibro" value="' . $arrayLibro['IdLibro'] . '">';

    echo '</div>';

    echo '</div>';
    echo '</form>';
    echo '<hr>';
}

?>
<?php
$contenido = ob_get_clean()?>
<?php
include 'baseAdministrador.php';
?>
