<?php ob_start(); include './app/config/nl2br2.php'; ?>


<?php
echo '<h3>Categorias</h3>';
$NUMERO_LIBROS = 0;$IdCategoria= 0;$NombreCategoria = '';$Descripcion = '';
foreach ($categorias as $key1 => $value1) {
    foreach ($value1 as $key2 => $value2) {
        if($key2 == 'NUMERO_LIBROS'){
            $NUMERO_LIBROS = $value2;
        }
        if($key2 == 'IdCategoria'){
            $IdCategoria = $value2;
        }
        if($key2 == 'NombreCategoria'){
            $NombreCategoria = $value2;
        }
        if($key2 == 'Descripcion'){
            $Descripcion = $value2;
        }
    }
    echo '<form name="verSubcategoriasCat" class="formSubcategorias" method="POST" action="index.php?ctl=verSubcategorias_de_Categorias">';
    echo '<ul>';
        echo '<li class="list-group-item">';
        echo '<a href="#" class="list-group-item" style="text-align:left">'.$NombreCategoria.'<span class="badge">';
        echo 'Libros disponibles : '.$NUMERO_LIBROS.'</span>';
             echo '</br><p class="list-group-item-text">Descripción:'.$Descripcion;
              echo '</p></a>';

        echo '</br><p class="list-group-item-text"><button type="submit" class="btn btn-default" name="librosPorSubCategorias">
        Ver subcategorias</button></p>';
        echo '<input type="hidden" name="IdCategoria" value="'.$IdCategoria.'">';
        echo '</li>';
    echo '</ul>';
    $NUMERO_LIBROS = 0;$IdCategoria= 0;$NombreCategoria = '';$Descripcion = '';
    echo '</form>';
}


?>



<?php $contenido = ob_get_clean() ?>
<?php include 'baseInicio.php' ?>
