<?php ob_start(); include './app/config/nl2br2.php'; ?>


<?php

echo '<h3>SubCategorias</h3>';
$NUMERO_LIBROS = 0;$IdSubCategorias= 0;$NombreSubCategorias = '';$Descripcion = '';
foreach ($subCategorias as $key1 => $value1) {
    foreach ($value1 as $key2 => $value2) {
        if($key2 == 'NUMERO_LIBROS'){
            $NUMERO_LIBROS = $value2;
        }
        if($key2 == 'IdSubCategoria'){
            $IdSubCategorias = $value2;
        }
        if($key2 == 'NombreSubCategoria'){
            $NombreSubCategorias = $value2;
        }
        if($key2 == 'Descripcion'){
            $Descripcion = $value2;
        }
    }
    echo '<form name="verLibrosPorSubCategoria" class="verLibrosPorSubCategoria" method="POST" action="index.php?ctl=verLibrosPorSubCategoriaAdministrador">';
    echo '<ul>';
        echo '<li class="list-group-item">';
        echo '<a href="#" class="list-group-item" style="text-align:left">'.$NombreSubCategorias.'<span class="badge">';
        echo 'Libros disponibles : '.$NUMERO_LIBROS.'</span>';
             echo '</br><p class="list-group-item-text">Descripción:'.$Descripcion;
              echo '</p></a>';
        echo '<button type="submit" class="btn btn-default" name="verLibrosPorSubCategoria">Ver libros por subcategorias</button>';
        echo '<input type="hidden" name="IdSubCategoria" value="'.$IdSubCategorias.'">';
        echo '</li>';
    echo '</ul>';
    echo '</form>';
}


?>



<?php $contenido = ob_get_clean() ?>
<?php include 'baseAdministrador.php' ?>
