<?php
ob_start();
include './app/config/nl2br2.php';
?>
<?php //$librosCategoriasLateral //$librosSubCategoriasLateral
echo '<h3>Categorias</h3>';
$contador=0;$cantidadCategoria = 0;$idCategoria= 0;$nombreCategoria = '';
foreach ($librosCategoriasLateral as $key => $categoria) {
  foreach ($categoria as $key2 => $propiedadCategoria) {
    if($key2 == 'NombreCategoria'){
        $nombreCategoria = $propiedadCategoria;
    }
    if($key2 == 'numero'){
        $cantidadCategoria = $propiedadCategoria;
    }
    if($key2 == 'IdCategoria'){
        $idCategoria = $propiedadCategoria;
    }
  }
        echo '<h2>'.$nombreCategoria.'</h2>';
        echo '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>';
        echo '<p>Libros disponibles de esta categoría : <span class="badge">'.$cantidadCategoria.'</span></p>';
        echo '<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demoCat'.$contador.'"
        name="librosPorSubCategorias"><i class="fa fa-book" style="font-size:24px"></i>Ver subcategorias</button>';
        echo '<div id="demoCat'.$contador.'" class="collapse">';
               echo '<form name="verSubcategoriasCat" class="formSubcategorias" method="POST" action="index.php?ctl=verSubcategorias_de_CategoriasAdministrador">';
               foreach ($librosSubCategoriasLateral as $key3 => $subCategoria) {
                   foreach ($subCategoria as $key4 => $propiedadSubCategoria) {
                       if($key4 == 'IdCategoria'){
                           $bool =false;
                           if($propiedadSubCategoria == $idCategoria){
                               $bool=true;
                           }
                           if($bool){
                                 echo '<p style="color:blue;">
                                 <a href="index.php?ctl=verLibrosPorSubCategoriaAdministrador&IdSubCategoria='.$subCategoria['IdSubCategoria'].'" >
                                 &nbsp;&nbsp;&nbsp;<i class="fa fa-book" style="font-size:12px"></i> '.$subCategoria['NombreSubCategoria'].'</a>  '.
                                 $subCategoria['numero'].'</p>';
                           }
                           $bool =false;
                       }
                   }
               }
               echo '</form>';
        echo '  </div>';
        echo '<input type="hidden" name="IdCategoria" value="'.$idCategoria.'">';
        $contador++;

}
?>



<?php
$contenido = ob_get_clean()?>
<?php
include 'baseAdministrador.php';
?>
